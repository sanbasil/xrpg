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

class charactersService{

    protected $em;
    private $container;

    public function __construct(EntityManager $entityManager, Container $container)
    {
        $this->em = $entityManager;
        $this->container = $container;
    }

    public function getCharacters(){
        $dql = "select c.id,c.nombre from xrpgBundle:characters c where c.categoria='E'";
        $query = $this->em->createQuery($dql);
        $characters = $query->getResult();
        return array('characters'=>$characters);
    }

    public function getCharacter($id){

        $dql = "select c.id,c.nombre,c.imagen,c.experiencia,n.nivel,n.rango,c.estamina_max,
                c.estamina_actual,c.resistencia_p,c.resistencia_m,c.resistencia_c,c.morbo
                from xrpgBundle:characters c 
                inner join c.idNivel n
                where c.id=".$id;
        $query = $this->em->createQuery($dql);
        $character = $query->getResult();

        return $character;
    }

    public function getAllCharActs($id){
        $dql = "select a.id as idact,c.nombre,a.descripcion,ca.tendencia, a.valor
                from xrpgBundle:RelCharacActions ca
                inner join ca.idCharacters c
                inner join ca.idActions a
                where ca.idCharacters=:char
                order by a.descripcion asc";
        $query = $this->em->createQuery($dql);
        $query->setParameter("char", $id);
        $result = $query->getResult();
        return $result;
    }

    public function charAssets($id){
        $dql = "select IDENTITY(ca.idAssets) as idassets,c.nombre,a.descripcion,ca.valor 
                from xrpgBundle:RelCharacAssets ca
                inner join ca.idCharacters c
                inner join ca.idAssets a
                where ca.idCharacters=:char
                order by a.descripcion asc";
        $query = $this->em->createQuery($dql);
        $query->setParameter("char", $id);
        $result = $query->getResult();
        return $result;
    }

    public function getVirtudes($id){
        $dql = "select IDENTITY(cv.idVirtudes) as idvirtudes,c.nombre,v.descripcion,
                v.mod_resistencia_charac as char_res, v.mod_resistencia_man as man_res,
                v.asset, v.tipo_c, v.actions, a.descripcion as actdesc,a.valor as valoraction,
                tc.descripcion as desctipo_c
                from xrpgBundle:RelCharacVir cv
                inner join cv.idCharacters c
                inner join cv.idVirtudes v
                left join xrpgBundle:actions a WITH v.actions=a.id
                left join xrpgBundle:actions tc WITH v.tipo_c=tc.id
                where cv.idCharacters=:char
                order by v.descripcion asc";
        $query = $this->em->createQuery($dql);
        $query->setParameter("char", $id);
        $result = $query->getResult();
        return $result;
    }

    public function charTipoJuego($id){
        $dql = "select c.nombre,tj.descripcion,ctj.probabilidad from xrpgBundle:RelCharacTipoJuego ctj
                inner join ctj.idCharacters c
                inner join ctj.idTipojuego tj
                where ctj.idCharacters=:char
                order by tj.descripcion asc";
        $query = $this->em->createQuery($dql);
        $query->setParameter("char", $id);
        $result = $query->getResult();
        return $result;
    }

    public function getCharacterData($id){
        $dql = "select c from xrpgBundle:characters c
                where c.id=:char";
        $query = $this->em->createQuery($dql);
        $query->setParameter("char", $id);
        $result = $query->getResult();
        return $result;
    }
}