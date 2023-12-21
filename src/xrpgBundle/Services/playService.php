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
use xrpgBundle\Entity\RelCharacActions;

class playService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    // public function getActions()
    // {
    //     $dql = "select a.id,a.descripcion from xrpgBundle:actions a";
    //     $query = $this->em->createQuery($dql);
    //     $actions = $query->getResult();
    //     return array('actions' => $actions);
    // }

    public function getListaTiposJuego($idchar){
        $dql = "select tj.id,ctj.probabilidad,tj.descripcion from xrpgBundle:RelCharacTipoJuego ctj
                inner join ctj.idTipojuego tj
                inner join ctj.idCharacters c
                where ctj.idCharacters=:idchar and tj.nivel=c.idNivel";
        $query = $this->em->createQuery($dql);
        $query->setParameter("idchar", $idchar);
        $result = $query->getResult();

        return $result;
    }

    public function getCharActs($id,$tj){
        $dql = "select a.descripcion,a.id,ca.tendencia from xrpgBundle:RelCharacActions ca
                inner join ca.idCharacters c
                inner join ca.idActions a
                inner join xrpgBundle:RelActionsTipoJuego atj WITH atj.idActions=ca.idActions
                where atj.idTipojuego=:tj and ca.idCharacters=:charac and a.nivel=c.idNivel";
        $query = $this->em->createQuery($dql);
        $query->setParameter('tj',$tj);
        $query->setParameter('charac',$id);
        $result = $query->getResult();

        return $result;
    }

    public function getCharVirt($id){
        $dql = "select IDENTITY(cv.idVirtudes) as idvirtudes from xrpgBundle:RelCharacVir cv 
                where cv.idCharacters=:idchar";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idchar',$id);
        $result = $query->getResult();

        return $result;
    }

    public function getVirtActs($virts){
        $dql = "select IDENTITY(ac.idActions) as idactions, a.descripcion as actdesc,v.descripcion as virdesc
                from xrpgBundle:RelActionsVir ac 
                inner join ac.idActions a
                inner join ac.idVirtudes v
                where ac.idVirtudes in (:virts)";
        $query = $this->em->createQuery($dql);
        $query->setParameter('virts',$virts);
        $result = $query->getResult();

        return $result;
    }

    public function getCharAssets($id){
        $dql = "select a.descripcion,ca.valor from xrpgBundle:RelCharacAssets ca
                inner join ca.idAssets a
                where ca.idCharacters = :idchar";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idchar',$id);
        $result = $query->getResult();

        return $result;
    }
}