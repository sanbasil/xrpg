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

class campaignsController extends FOSRestController
{
    // public function getCampañasAction(){
    //     $serv_camp = $this->get('xrpg.campaignsService');

    //     $campañas = $serv_camp->getCampañas();       

    //     return new response(json_encode(array('campañas'=>$campañas->campañas)));
    // }

    /**
     * @return array
     *
     * View()
     * @Get("/characters/{idchar}/preplay/campaign/{idcamp}")
     */
    public function getCharacterPreplayCampaignAction($idchar,$idcamp){
        $serv_camp = $this->get('xrpg.campaignsService');

        $campaign = $serv_camp->getCampaña($idchar,$idcamp);       

        return new response(json_encode($campaign));
    }

        /**
     * @return array
     *
     * 
     * @Post("/characters/{idchar}/preplay/campaign/{idcamp}/start")
     */
    public function postCampaignCharAction($idchar,$idcamp){
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->beginTransaction();
        try{
            $serv_camp = $this->get('xrpg.campaignsService');

            $saveCamp = $serv_camp->postCampañaChar($idchar,$idcamp);
            $em->persist($saveCamp);

            //get profesiones necesarias (rel_prof_camp)
            $profs = $serv_camp->getProfs($idcamp);  

            //get mans con esas profesiones (mans)
            $mans = $serv_camp->getMans($profs);

            //insertar mans (rel_mans_camp)
            $saveMansCamp = $serv_camp->postMansCamp($idcamp,$mans);
            //\Doctrine\Common\Util\Debug::dump($saveMansCamp->getMans());die();
            $em->persist($saveMansCamp);

            //relacionar mans con misiones de camp (rel_mis_manscamp)
            /*$saveMansMisCamp = $serv_camp->postMansMisCamp($idcamp,$mans);
            $em->persist($saveMansMisCamp);*/
            $em->flush();
            $em->getConnection()->commit();
        }catch (Exception $e) {
            $em->getConnection()->rollBack();
            throw $e;
        }
    }

    public function newAction(){
        return true;
    }

}