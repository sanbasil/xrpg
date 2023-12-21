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

class objectsController extends FOSRestController
{
    /**
     * @return array
     *
     * View()
     * @Get("/characters/{idchar}/objects")
     */
    public function getCharacterObjectsAction($idchar){
        $serv_obj = $this->get('xrpg.objectsService');

        
        $objetos = $serv_obj->getObjects($idchar,1);    


        //\Doctrine\Common\Util\Debug::dump($char_assets);die();

        return new response(json_encode(array('obj'=>$objetos)));
    }

}