<?php

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

class charactersController extends FOSRestController
{

    public function getCharactersAction(){
        $serv_characters = $this->get('xrpg.charactersService');
        $characters = $serv_characters->getCharacters();

        return new response(json_encode($characters));
    }

    // /**
    //  * @return array
    //  *
    //  * View()
    //  * @Get("/character/{id}")
    //  */
    public function getCharacterAction($id){
        $serv_characters = $this->get('xrpg.charactersService');

        $character = $serv_characters->getCharacter($id);
        $characts = $this->getAllCharActs($id);
        $charassets = $this->getCharAssets($id);
        $chartipojuego = $this->getCharTipoJuego($id);

        return new response(json_encode(array('char'=>$character[0],
                                              'acts'=>$characts,
                                              'assets'=>$charassets,
                                              'tipojuego'=>$chartipojuego)));
    }

    /**
     * return array
    */
    private function getAllCharActs($idchar){
        $serv_characters = $this->get('xrpg.charactersService');
        $allcharacacts = $serv_characters->getAllCharActs($idchar);

        return $allcharacacts;

    }

    /**
     * return array
     */
    private function getCharAssets($idchar){
        $serv_characters = $this->get('xrpg.charactersService');
        $charassets = $serv_characters->charAssets($idchar);

        return $charassets;

    }

    /**
     * return array
     */
    private function getCharTipoJuego($idchar){
        $serv_characters = $this->get('xrpg.charactersService');
        $charassets = $serv_characters->charTipoJuego($idchar);

        return $charassets;

    }

    // /**
    //  * @return array
    //  *
    //  * @View()
    //  * @Get("/characterData/{idchar}")
    //  */
    // public function getCharacterDataAction($idchar){
    //     $serv_characters = $this->get('xrpg.charactersService');
    //     $chardata = $serv_characters->getCharacterData($idchar);

    //     return new response(json_encode($chardata));

    // }

    // /**
    //  * @return array
    //  *
    //  * @View()
    //  * @Get("/character/play/{id}")
    //  */
    // public function getCharacterPlayAction($id){
    //     $serv_play = $this->get('xrpg.playService');

    //     $tipojuego = $serv_play->getTipoJuego($id);
    //     var_dump($tipojuego);
    //     $tj_array = $this->build_tj_array($tipojuego);
    //     // $characts = $this->getAllCharActs($id);
    //     // $charassets = $this->getCharAssets($id);

    //     return new response(json_encode(array(/* 'char'=>$character[0],
    //                                           'acts'=>$characts,
    //                                           'assets'=>$charassets, */
    //                                           'tipojuego'=>$tipojuego)));
    // }
}
