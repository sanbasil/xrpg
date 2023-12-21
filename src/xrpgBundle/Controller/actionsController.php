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

class actionsController extends FOSRestController
{
    /**
     * @return array
     *
     * @View()
     * @Get("/acts")
     */
    public function getActsAction(){
        $em = $this->getDoctrine()->getManager();
        $serv_actions = $this->get('xrpg.actionsService');
        $actions = $serv_actions->getActions();

        return new response(json_encode($actions));
    }

    /**
     * @return array
     *
     * @View()
     * @Get("/act/{id}")
     */
    public function getActAction($id){
        $em = $this->getDoctrine()->getManager();

        $serv_actions = $this->get('xrpg.actionsService');

        $action = $serv_actions->getAction($id);

        return new response(json_encode($action[0]));
    }

    /**
     * @return array
     *
     * @View()
     * @Post("/savecharact")
     */
    public function postSaveCharActAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $data = $request->request->all();
        $char = $data['charac'];
        $action = $data['action'];
        $tendencia = $data['tendencia'];
        $serv_actions = $this->get('xrpg.actionsService');

        $charaction = $serv_actions->saveCharAct($char,$action,$tendencia);

        return new response(json_encode($charaction));
    }
}
