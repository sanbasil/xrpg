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

class objectsService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getObjects($idchar,$inaction){
        $dql = "select co.cantidad,o.nombre,
                GROUP_CONCAT(CONCAT(oe.signo,oe.valor,'% - ',oe.efecto) SEPARATOR '\n') as efecto,
                o.icon
                from xrpgBundle:relcharacobj co
                inner join co.idObjetos o
                inner join o.idTipoobjeto to
                inner join xrpgBundle:objefectos oe with o.id=oe.idObjetos
                where co.idCharacters=:idchar and to.inaction=:inaction
                GROUP BY co.cantidad,o.nombre,o.icon";
        $query = $this->em->createQuery($dql);
        $query->setParameter('idchar',$idchar);
        $query->setParameter('inaction',$inaction);
        $objetos = $query->getResult();
        return $objetos;  
    }

}