<?php

namespace xrpgBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints;

class DefaultController extends Controller
{
    /** 
    * @Route("/", name="homepage")
    */
    public function indexAction()
    {
        return $this->render("@xrpg/Default/index.html.twig");
    }
}
