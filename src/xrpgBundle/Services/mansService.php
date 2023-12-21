<?php
/**
 * Created by PhpStorm.
 * User: Alberto
 * Date: 20/10/16
 * Time: 23:20
 */

namespace xrpgBundle\Services;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\DependencyInjection\Container;
use xrpgBundle\Entity\mans;

class mansService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getMans($idmis,$idcamp){
        $dql = "select distinct m.id,m.nombre,m.tamano,m.cc_max,m.cc_actual,m.nivel,m.apodo,m.estamina_max,m.estamina_actual,
                IDENTITY(m.idRitmo) as idRitmo,rit.descripcion as ritmo,IDENTITY(m.idTipoCuerpo) as idtc,tc.descripcion as tcuerpo,m.atractivo,
                m.edad,m.estatura, m.resistencia,m.resistencia_o,m.resistencia_m
                from xrpgBundle:relmismanscamp mmc
                inner join xrpgBundle:mans m  WITH  mmc.idMans=m.id
                left join xrpgBundle:relmanprefassets mpa with m.id=mpa.idMans
                left join xrpgBundle:relmanprefcum mpc with m.id=mpc.idMans
                left join xrpgBundle:relmanscaracchar mcch with m.id=mcch.idMans
                left join m.idRitmo rit
                left join m.idTipoCuerpo tc
                where mmc.idCampaigns=:idcamp and mmc.idMisiones=:idmis";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idmis',$idmis);
        $query->setParameter('idcamp',$idcamp);
        $mans = $query->getResult();
        //\Doctrine\Common\Util\Debug::dump($mans);die();  
        return $mans;  
    }

    public function getMansPrefAssets($mans){
        $idmans='';
        foreach($mans as $m){
            $idmans.=$m['id'].',';      
         }
        $dql = "select IDENTITY(mpf.idAssets) as idassets
        from xrpgBundle:relmanprefassets mpf
        where mpf.idMans in (".rtrim($idmans,',').")";
        $query = $this->em->createQuery($dql);
        $mansprefassets = $query->getResult();
        return $mansprefassets;

    }

    public function getMansPrefC($mans){
        $idmans='';
        foreach($mans as $m){
            $idmans.=$m['id'].',';      
         }
        $dql = "select IDENTITY(mpc.idActions) as idc,IDENTITY(mpc.idMans) as idman,mpc.tendencia
        from xrpgBundle:relmanprefcum mpc
        where mpc.idMans in (".rtrim($idmans,',').")";
        $query = $this->em->createQuery($dql);
        $mansprefC = $query->getResult();
        return $mansprefC;

    }
}