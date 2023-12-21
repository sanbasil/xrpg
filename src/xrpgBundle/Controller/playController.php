<?php
/**
 * Created by PhpStorm.
 * User: ALBERTO
 * Date: 15/12/2018
 * Time: 19:55
 */

namespace xrpgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Put;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class playController extends FOSRestController
{
    public function getCharacterPreplayAction($idchar){
        $serv_camp = $this->get('xrpg.campaignsService');

        $campaigns = $serv_camp->getCampañas();       

        return new response(json_encode($campaigns));
    }

    public function getCharacterPlayAction($idchar){
        $serv_play = $this->get('xrpg.playService');

        $listatipojuego = $serv_play->getListaTiposJuego($idchar);        
        $tipojuego = $this->getTipoJuego($listatipojuego);
        
        $characts = $serv_play->getCharActs($idchar,$tipojuego);
        $charvirt = $serv_play->getCharVirt($idchar);
        $virtacts = $serv_play->getVirtActs($charvirt);
        $charassets = $serv_play->getCharAssets($idchar);

        return new response(json_encode(array(/* 'char'=>$character[0],
                                              'acts'=>$characts,
                                              'assets'=>$charassets, */
                                              'tipojuego'=>$tipojuego)));
    }

    private function getTipoJuego($listatipojuego){
        $arraytj = [];
        
        foreach($listatipojuego as $ltj){
            for($i=0;$i<$ltj['probabilidad'];$i++){
                $arraytj[] = $ltj['id'];
            }
        }
        shuffle($arraytj);
        $tipojuego = array_rand($arraytj);
        return $tipojuego;
    }
    
}