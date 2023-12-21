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
use xrpgBundle\Entity\relmismanscamp;
use xrpgBundle\Entity\relmanscamp;
use xrpgBundle\Entity\relplaysactions;
use xrpgBundle\Entity\relplayscum;
use xrpgBundle\Entity\relplaysmans;
use xrpgBundle\Entity\relplayscharac;
use xrpgBundle\Entity\mans;
use xrpgBundle\Entity\misiones;
use xrpgBundle\Entity\relmisprof;
use xrpgBundle\Entity\plays;
use xrpgBundle\Entity\characters;
use xrpgBundle\Entity\tipojuego;

class misionService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getMision($idmis){
        $dql = "select m.id,m.nombre,m.descripcion,m.nivel,m.currencyVal,m.experiencia,
                tp.descripcion as tmision,m.currencyNec,tp.id as idtipomision, IDENTITY(mtj.idTipojuego) as tipojuego
                from xrpgBundle:misiones m
                inner join m.idTipomision tp
                inner join xrpgBundle:relmistipojuego mtj WITH m.id=mtj.idMision
                where m.id=:idmis";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idmis',$idmis);
        $mision = $query->getResult();
        return $mision;  
    }

    public function checkmismans($idmis,$idcamp){
        $dql = "select mmc from xrpgBundle:relmismanscamp mmc where mmc.idMisiones=:idmis and mmc.idCampaigns=:idcamp";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $query->setParameter('idmis',$idmis);
        $checkmm = $query->getResult();
        return $checkmm;  
    }

    public function getMansMision($idchar,$idcamp,$idmis){
        $dql = "select ma.id
                from xrpgBundle:misiones m
                inner join xrpgBundle:relmiscamp miscam with m.id=miscam.idMisiones
                inner join xrpgBundle:relmanscamp mancam WITH miscam.idCampaigns=mancam.idCampaigns
                inner join xrpgBundle:relmisprof misprof with m.id=misprof.idMisiones
                inner join xrpgBundle:mans ma with mancam.idMans=ma.id                  
                where m.id = :idmis and miscam.idCampaigns= :idcamp and ma.idProfesiones=misprof.idProfesiones";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idcamp',$idcamp);
        $query->setParameter('idmis',$idmis);
        $manmision = $query->getResult();
        return $manmision;    
    }

    public function postMisMansCamp($idchar,$idcamp,$idmis){
        $mansmis = $this->getMansMision($idchar,$idcamp,$idmis);

        $entmismascamp = null;
        foreach($mansmis[0] as $key=>$value){
            $entmismascamp = new relmismanscamp();
            $entman = $this->em->getRepository('xrpgBundle:mans')->find($value);
            $entmis = $this->em->getRepository('xrpgBundle:misiones')->find($idmis);
            $entcamp = $this->em->getRepository('xrpgBundle:campaigns')->find($idcamp);
            $entmismascamp->setIdMans($entman);    
            $entmismascamp->setIdMisiones($entmis);
            $entmismascamp->setIdCampaigns($entcamp);    
            $this->em->persist($entmismascamp);    
        }
        if($entmismascamp)
            $this->em->flush();
        return $mansmis;
    }

    public function getMisTipoAct($idmis){
        $dql = "select IDENTITY(mat.idActtipo) as idacttipo,mat.prob
                from xrpgBundle:relmisacttipo mat             
                where mat.idMisiones = :idmis";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idmis',$idmis);
        $mistipoact = $query->getResult();
        return $mistipoact;
    }

    public function getActionsTipoJuego($idtipojuego,$idtam){
        $dql = "select IDENTITY(at.idActions) as id,a.descripcion,a.valor
        from xrpgBundle:RelActionsTipoJuego atj
        inner join xrpgBundle:relactacttipo at WITH atj.idActions=at.idActions
        inner join at.idActions a             
        where atj.idTipojuego = :idtj and at.idActtipo=:idtam and a.tipo_c=0";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idtj',$idtipojuego);
        $query->setParameter('idtam',$idtam);
        $actions = $query->getResult();
        return $actions;
    }

    public function getActionsCTipoJuego($idtipojuego,$idtam){
        $dql = "select IDENTITY(at.idActions) as id,a.descripcion,a.valor
        from xrpgBundle:RelActionsTipoJuego atj
        inner join xrpgBundle:relactacttipo at WITH atj.idActions=at.idActions
        inner join at.idActions a             
        where atj.idTipojuego = :idtj and at.idActtipo=:idtam and a.tipo_c=1";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idtj',$idtipojuego);
        $query->setParameter('idtam',$idtam);
        $tipoc = $query->getResult();
        return $tipoc;
    }

    public function postplays($userid,$misid,$mistj,$duracion_o,$total_puntos){

        /*$duracion_o = new \Datetime("00:".$duracion_o);
        $duracion_o->format('i:s');*/
        $plays = new plays();
        $entchar = $this->em->getRepository('xrpgBundle:characters')->find($userid);
        $enttj = $this->em->getRepository('xrpgBundle:tipojuego')->find($mistj);
        $entmis= $this->em->getRepository('xrpgBundle:misiones')->find($misid);
        $plays->setidCharacters($entchar);
        $plays->setidTipojuego($enttj);
        $plays->setidMisiones($entmis);
        $plays->setDuracionO($duracion_o);
        $plays->setPuntos($total_puntos);
        $plays->setFecha(new \DateTime);
        
        return $plays;
    }

    public function postActionsPlays($idplay,$actions,$userid){        
        $entchar = $this->em->getRepository('xrpgBundle:characters')->find($userid);
        $entplay = $this->em->getRepository('xrpgBundle:plays')->find($idplay);
        //var_dump($actions);
        foreach($actions as $a){
            $playsactions = new relplaysactions();
            $entact= $this->em->getRepository('xrpgBundle:actions')->find($a['id']);
            $playsactions->setidActions($entact);                    
            $playsactions->setidCharacters($entchar);
            $playsactions->setidPlays($entplay);
            $playsactions->setCantidad(1);
            $this->em->persist($playsactions);
        }

        
        return $playsactions;
    }

    public function postCumPlays($idplay,$tipoc,$userid){        
        $entchar = $this->em->getRepository('xrpgBundle:characters')->find($userid);
        $entplay = $this->em->getRepository('xrpgBundle:plays')->find($idplay);
        foreach($tipoc as $tc){
            //foreach($tc as $c){
                $playscum = new relplayscum();
                $entact= $this->em->getRepository('xrpgBundle:actions')->find($tc['id']);
                $entmans= $this->em->getRepository('xrpgBundle:mans')->find($tc['idman']);
                $playscum->setTipocum($entact);                    
                $playscum->setidCharacters($entchar);
                $playscum->setidPlays($entplay);
                $playscum->setIdMans($entmans);
                $this->em->persist($playscum);
            //}
        }

        
        return $playscum;
    }

    public function postMansPlays($idplay,$mans){
                $entplay = $this->em->getRepository('xrpgBundle:plays')->find($idplay);
        foreach($mans as $m){
            $playsmans = new relplaysmans();
            $entmans= $this->em->getRepository('xrpgBundle:mans')->find($m['id']);
            $playsmans->setidPlays($entplay);
            $playsmans->setIdMans($entmans);
            $this->em->persist($playsmans);
        }

        return $playsmans;
    }

    public function postCharacPlays($idplay,$charac){
        $playscharac = new relplayscharac();
        $entplay = $this->em->getRepository('xrpgBundle:plays')->find($idplay);
        //foreach($mans as $m){
            $entcharac= $this->em->getRepository('xrpgBundle:characters')->find($charac);
            $playscharac->setidPlays($entplay);
            $playscharac->setIdCharacters($entcharac);
            $this->em->persist($playscharac);
        //}
                
        return $playscharac;
    }

    public function postStatusNpc($statusnpc){
        foreach($statusnpc as $snpc){
            $entnpc = $this->em->getRepository('xrpgBundle:mans')->find($snpc['id']);
            $entnpc->setEstaminaActual($snpc['estamina_actual']);
            $entnpc->setCcActual($snpc['cc_actual']);
            $this->em->persist($entnpc);
        }
        return $entnpc;
    }

    public function postStatusChar($statuschar,$puntos){
        foreach($statuschar as $schar){
            $entchar = $this->em->getRepository('xrpgBundle:characters')->find($schar['id']);            
            $exp = $entchar->getExperiencia();
            $exp+=$puntos;
            $nivel = $this->getNivelNuevo($exp);
            if($nivel[0]['nivel'] > $entchar->getIdNivel()){
                $entnivel = $this->em->getRepository('xrpgBundle:nivel')->find($nivel[0]['id']); 
                $entchar->setIdNivel($entnivel);
            }
            $entchar->setEstaminaActual($schar['estamina_actual']);
            $entchar->setExperiencia($exp);
            $this->em->persist($entchar);
        }
        
        return $entchar;
    }

    private function getNivelNuevo($exp){
        $dql = "select MAX(n.nivel) as nivel, n.id
        from xrpgBundle:nivel n           
        where :exp < n.rango
        order by n.id DESC";
        $query = $this->em->createQuery($dql);
        $query->setParameter('exp',$exp);
        $nivel = $query->getResult();

        return $nivel;
    }

}