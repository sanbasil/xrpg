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
use xrpgBundle\Entity\relcharaccamp;
use xrpgBundle\Entity\relmanscamp;
use xrpgBundle\Entity\relmismanscamp;
use xrpgBundle\Entity\mans;

class campaignsService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getCampañas(){
        $dql = "select c.id,c.descripcion,c.numMans,c.precio,c.puntos,c.nivel from xrpgBundle:campaigns c";
        $query = $this->em->createQuery($dql);
        $campaigns = $query->getResult();
        return array('campaigns'=>$campaigns);
    }

    public function getCampaña($idchar,$idcamp){
        $dql = "select c.id,c.descripcion as campaign,c.numMans,c.precio,c.puntos,c.imagen,m.nombre as mision,
                m.descripcion as misiondesc,m.currencyNec,m.nivel,m.currencyVal as recompensa,tp.descripcion as tipomision,
                m.orden,tp.id as idtipomision,mc.iteraciones,cc.id as estado,m.id as idmision
                from xrpgBundle:relmiscamp mc
                inner join mc.idCampaigns c
                inner join mc.idMisiones m
                inner join xrpgBundle:tipomision tp with m.idTipomision=tp.id
                left join xrpgBundle:relcharaccamp cc with cc.idCampaigns=c.id and cc.idCharacters = :idchar
                where c.id=:idcamp
                order by m.orden";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $query->setParameter('idchar',$idchar);
        $campaigns = $query->getResult();
        return array('campaign'=>$campaigns);    
    }

    public function postCampañaChar($idchar,$idcamp){
        $campchar = new relcharaccamp();
        $entchar = $this->em->getRepository('xrpgBundle:characters')->find($idchar);
        $entcamp = $this->em->getRepository('xrpgBundle:campaigns')->find($idcamp);
        $campchar->setidCharacters($entchar);
        $campchar->setidCampaigns($entcamp);
        $campchar->setEstado(1);
        
        return $campchar;
        // $this->em->persist($campchar);
        // if(!$this->em->flush()) 
        //     return true;
        // else
        //     return false;
    }

    public function getProfs($idcamp){
        $dql = "select IDENTITY(pc.idProfesiones) as profesion,pc.cantidad from xrpgBundle:relprofcamp pc
                where pc.idCampaigns = :idcamp";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $profs = $query->getResult();

        return $profs;
    }

    public function getMans($profs){
        //$str_profs = implode(',',$profs);
        $arr_profs=[];
        $arr_temp=[];
        foreach($profs as $p){
            $arr_profs[] = $p['profesion'];
        }

        $dql = "select m.id, IDENTITY(m.idProfesiones) as profesion from xrpgBundle:mans m
                where m.idProfesiones in (:profs) and m.activo=1";
        $query=$this->em->createQuery($dql);
        $query->setParameter('profs',$arr_profs);
        $mans = $query->getResult();
        shuffle($mans);
        
        foreach ($mans as $key=>$value){
            $arr_temp[$value['id']]=$value['profesion'];
        }
        
        return array_unique($arr_temp);
    }

    public function postMansCamp($idcamp,$mans){          
        $entcamp = $this->em->getRepository('xrpgBundle:campaigns')->find($idcamp);
        foreach($mans as $key=>$value){
            $entman = $this->em->getRepository('xrpgBundle:mans')->find($key);
            $entcamp->addMan($entman);            
        }
        //$this->em->persist($entcamp);

        return $entcamp;
    }

    public function postMansMisCamp($idcamp,$mans){
        $dql = "select m.id as mision,IDENTITY(mp.idProfesiones) as profesion from xrpgBundle:relmiscamp mc
                inner join mc.idMisiones m
                inner join xrpgBundle:relmisprof mp with m.id=mp.idMisiones
                where mc.idCampaigns=:idcamp";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $miscamp = $query->getResult();
        //$entmis = $this->em->getRepository('xrpgBundle:relmiscamp')->findBy(array('idCampaigns'=>$idcamp));
        //var_dump($miscamp);die;
        foreach($miscamp as $mis){
            $entmis = $this->em->getRepository('xrpgBundle:misiones')->find($mis['mision']);
            foreach($mans as $key=>$value){
                $entman = $this->em->getRepository('xrpgBundle:mans')->find($mis['mision']);
                $entmis->addMan($entman);
            }
        }
        
        /*$dql = "select IDENTITY(mc.idMisiones) as idmis,c
                from xrpgBundle:relmiscamp mc           
                inner join mc.idCampaigns c                     
                inner join xrpgBundle:mans m with m.idProfesiones=mcp.idProfesiones        
                where mc.idCampaigns=:idcamp";
                //inner join xrpgBundle:relmiscampprof mcp with mc.id=mcp.idRelmiscamp
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $misions = $query->getResult();   
        var_dump($misions);die;
        foreach($misions as $m){
            $mismanscamp = new relmismanscamp;
            $entmis = $this->em->getRepository('xrpgBundle:misiones')->find($m['idmis']);
            $entmanscamp = $this->em->getRepository('xrpgBundle:relmanscamp')->find($m['idmanscamp']);
            $mismanscamp->setidMisiones($entmis);
            $mismanscamp->setidRelmanscamp($entmanscamp);
            $this->em->persist($mismanscamp);
        }*/

        return $entmis;
    }
}