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

class actionsService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getActions(){
        $dql = "select a.id,a.descripcion from xrpgBundle:actions a";
        $query = $this->em->createQuery($dql);
        $actions = $query->getResult();
        return array('actions'=>$actions);
    }

    public function getAction($id){
        $dql = "select a.descripcion from xrpgBundle:actions a where a.id=".$id;
        $query = $this->em->createQuery($dql);
        $action = $query->getResult();
        return $action;
    }

    public function saveCharAct($char,$act,$tendencia){
        $charent = $this->em->getRepository('xrpgBundle:characters')->find($char);
        $actent = $this->em->getRepository('xrpgBundle:actions')->find($act);

        $charact = new RelCharacActions();
        $charact->setIdActions($actent);
        $charact->setIdCharacters($charent);
        $charact->setTendencia($tendencia);

        $this->em->persist($charact);
        if(!$this->em->flush())
            return true;
        else
            return false;
    }
}