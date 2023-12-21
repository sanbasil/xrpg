<?php
/**
 * Created by PhpStorm.
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

class misionController extends FOSRestController
{
    
    /**
     * @return array
     *
     * View()
     * @Get("/characters/{idchar}/preplay/campaign/{idcamp}/mision/{idmis}")
     */
    public function getCharacterPreplayCampaignMisionAction($idchar,$idcamp,$idmis){
        $serv_mis = $this->get('xrpg.misionService');        
        $serv_mans = $this->get('xrpg.mansService');
        $serv_char = $this->get('xrpg.charactersService');

        $mismanscheck = $serv_mis->checkmismans($idmis,$idcamp);

        if(count($mismanscheck)==0){
            $postmismancamp = $serv_mis->postMisMansCamp($idchar,$idcamp,$idmis);             
        }
        
        $mans = $serv_mans->getMans($idmis,$idcamp); 
        $mans_pref_assets =  $serv_mans->getMansPrefAssets($mans); 
        $mans_pref_c =  $serv_mans->getMansPrefC($mans); 
        $char_main =  $serv_char->getCharacter($idchar);
        $char_assets = $serv_char->charAssets($idchar);
        $char_actions = $serv_char->getAllCharActs($idchar);
        $char_vir = $serv_char->getVirtudes($idchar);
        //$curr_mis = $serv_mis->getCurrMis($idmis);
        $mision = $serv_mis->getMision($idmis);

        //\Doctrine\Common\Util\Debug::dump($char_assets);die();

        return new response(json_encode(array('mis'=>$mision,
                                              'mans'=>$mans,
                                              'mans_pref_assets'=>$mans_pref_assets,
                                              'mans_pref_c'=>$mans_pref_c,
                                              'char_main'=>$char_main,
                                              'char_assets'=>$char_assets,
                                              'char_actions'=>$char_actions,
                                              'char_vir'=>$char_vir,
                                              'idcamp'=>$idcamp)));
    }

    /**
     * @return array
     *
     * View()
     * @Post("/play")
     */
    public function postCharacterPreplayCampaignMisionPlayAction(Request $request){
        $serv_mis = $this->get('xrpg.misionService');
        $data =$request->request->get('playData');

        $userid = $data['char_main'][0]['id'];
        $misid = $data['mis'][0]['id'];
        $mistj = $data['mis'][0]['tipojuego'];
        $prob_tipoactimis = $serv_mis->getMisTipoAct($misid); // Tipo de actos posibles
        $tipoactmis = $this->tipoactmis($prob_tipoactimis); // Tipo de acto(s)

        $mans=$this->reconstruyeMans($data['mans']);

        $array_actions_final=[];
        $tipo_c_final=[];
        $tipo_c_temp=[];
        $array_estado_npc=[];
        $array_estado_charac=[];
        $org=0;

        // constructor array estado de los npc
        $statusnpc=$this->construyeStatusNpc($data['mans']);


        // constructor del array del estado del character
        $statusChar=$this->construyeStatusCharac($data['char_main'],$data['char_vir']); 


        // modifica el status del npc
        $statusnpc = $this->modificaStatusNpc($statusnpc,$data['mans_pref_assets'],$data['char_assets'],$data['char_main'],$data['char_vir'],$data['mans']);

        foreach($tipoactmis as $tam){

            // check DT en función de si hay TP como tipo_c
            //$array_actions_final=$this->checkDt($tipo_c_final,$array_actions_final);   

            switch($tam){//$tam*************************************************
                case "1": //bj
                    // manejo de virtudes del character
                    /*$actions=$this->modificaActionsVir($actions,$data['char_vir'],$data['mans']);
                    $tipo_c=$this->modificaTipocVir($tipo_c,$data['char_vir'],$data['mans']);*/
                    
                    $actions = $serv_mis->getActionsTipoJuego($mistj,$tam);    
                    //var_dump($actions);die;         
                    $tipo_c = $serv_mis->getActionsCTipoJuego($mistj,$tam);
                    //var_dump($tipo_c);die; 
        
                    // añadir tendencia char array actions y tipoc
                    $actions=$this->addTendenciaActionsChar($actions,$data['char_actions']);
                    $tipo_c=$this->addTendenciaTipocChar($tipo_c,$data['char_actions']);
                    $tipo_c=$this->addTendenciaTipocNpc($tipo_c,$data['mans_pref_c']);
        
                    // gestion de virtudes de char
                    $resvir = $this->manageVirtudes($actions,$tipo_c,$data['char_vir'],$statusnpc,$statusChar,$data['mans'],$data['mans_pref_assets']);
                    
                    // selector actions
                    $array_actions_temp=$this->selectorActions($actions);
                    //Si no está BJ, se pone
                    $array_actions_temp=$this->checkBj($array_actions_temp,$data['mans']); 
                    //var_dump($array_actions_temp);die;
                    //to do: guardar tabla rel_plays_obj
                    //to do: restar currencies
                    //to do: premios
                    break;
                case "2": //pe
                    $actions = $serv_mis->getActionsTipoJuego($mistj,$tam);   
                    //var_dump($actions);die;         
                    $tipo_c = $serv_mis->getActionsCTipoJuego($mistj,$tam);
                    //var_dump($tipo_c);die; 
        
                    // añadir tendencia char array actions y tipoc
                    $actions=$this->addTendenciaActionsChar($actions,$data['char_actions']);
                    $tipo_c=$this->addTendenciaTipocChar($tipo_c,$data['char_actions']);
                    $tipo_c=$this->addTendenciaTipocNpc($tipo_c,$data['mans_pref_c']);
        
                    // gestion de virtudes de char
                    $resvir = $this->manageVirtudes($actions,$tipo_c,$data['char_vir'],$statusnpc,$statusChar,$data['mans'],$data['mans_pref_assets']);
                    
                    // selector actions
                    $array_actions_temp=$this->selectorActions($actions);
                    //var_dump($array_actions_temp);die;
                    
                break;
                case "3":
                    var_dump("3");die;
                break;
            }

            if(count($array_actions_temp)>0){
                foreach($array_actions_temp as $at)
                    array_push($array_actions_final,$at);
            }
            if(count($tipo_c)>0){
                foreach($tipo_c as $tc)
                    array_push($tipo_c_temp,$tc);
            }

        
        } 

        /*$this->modStatusVir($data['char_vir'],$data['mans'],$statusnpc,$statusChar);
        var_dump($statusnpc);
var_dump($statusChar);*/
        $duracion_o=$this->calculaDuracionyCC($statusnpc,$data['char_vir'],$tipoactmis,$objects=null);
        if(in_array(2,$tipoactmis) or in_array(3,$tipoactmis) or in_array(4,$tipoactmis) or in_array(6,$tipoactmis)){
            $org = $this->calculaOrg($data['mans'],$data['char_main'],2,$duracion_o,$data['char_vir'],$statusChar);       
        }
        // selector tipo_c
        $tipo_c_final=$this->selectorTipoC($data['mans'],/*$data['mans_pref_c'],*/$tipo_c_temp,$array_actions_final);

       
        $statusnpc = $this->modificaStaminaNpc($statusnpc,$duracion_o);
        $statusChar = $this->modificaStaminaChar($statusChar,$duracion_o);
        $total_puntos = $this->calculaPuntos($tipo_c_final,$array_actions_final);
        // Guardado en BD      
        //$playSaved = $this->guardaPlayBd($userid,$misid,$mistj,$duracion_o,$array_actions_final,$tipo_c_final,$data['mans'],$userid,$total_puntos,$statusnpc,$statusChar);
        
        $duracion_o=  sprintf('%02d:%02d', (int) $duracion_o, round(fmod($duracion_o, 1) * 60));
        return new response(json_encode(array('actions'=>$array_actions_final,
                                              'tipo_c'=>$tipo_c_final,
                                              'mans'=>$mans,    
                                              'duracion'=>$duracion_o,
                                              'puntos'=>$total_puntos,
                                              'actions_temp'=>$actions,
                                              'tipoc_temp'=>$tipo_c,
                                              'statusnpc'=>$statusnpc,
                                              'statuschar'=>$statusChar,
                                              'orgs'=>$org,
                                              'tam'=>$tipoactmis)));
    }

    private function tipoactmis($datos){
        $array_list = [];
        $mistipoact =[];
        foreach($datos as $d){
            for($i=0;$i<$d['prob'];$i++){
                array_push($array_list,$d['idacttipo']);
            }  
            for($j=0;$j<100-$d['prob'];$j++){
                array_push($array_list,0);
            }
            shuffle($array_list);
            $temp = $array_list[array_rand($array_list)];
            if($temp!=0)
                array_push($mistipoact,$temp);
            $array_list = [];
        }

        return $mistipoact;
    }

    private function construyeStatusNpc($datamans){
        foreach($datamans as $key=>$value){
            $array_estado_npc[$key]['id']=$value['id'];
            $array_estado_npc[$key]['resistencia']=$value['resistencia'];
            $array_estado_npc[$key]['resistencia_o']=$value['resistencia_o'];
            $array_estado_npc[$key]['resistencia_m']=$value['resistencia_m'];
            $array_estado_npc[$key]['estamina_max']=$value['estamina_max'];
            $array_estado_npc[$key]['estamina_actual']=$value['estamina_actual'];
            $array_estado_npc[$key]['cc_actual']=$value['cc_max'];
        }
        
        return $array_estado_npc;
    }

    private function modificaStatusNpc($statusnpc,$datamansprefassets,$datacharassets,$char,$charvir,$mans){
        foreach($statusnpc as $key=>$value){
            foreach($datacharassets as $ca){
                $val_temp=($ca['valor']-(100-$ca['valor']));
                $val_temp=mt_rand($val_temp,$ca['valor'])/100;
                $statusnpc[$key]['resistencia']-=$val_temp;
                // modificador de estado de los npc según sus assets preferidos
                foreach($datamansprefassets as $mpf){
                        if($mpf['idassets']==$ca['idassets']){
                            $val_temp=($ca['valor']-(100-$ca['valor']));
                            $val_temp=mt_rand($val_temp,$ca['valor'])/100;
                            $statusnpc[$key]['resistencia']-=$val_temp;
                            break;
                        }                    
                } 
            }  
            foreach($char as $c){
                $val_temp=($c['morbo']-(100-$c['morbo']));
                $val_temp=mt_rand($val_temp,$c['morbo'])/100;
                $statusnpc[$key]['resistencia']-=$val_temp;
            }
        }

        foreach($charvir as $cv){
            foreach($mans as $key=>$value){
                $statusnpc[$key]['resistencia']-=$cv['man_res'];
            }
        }
        
        return $statusnpc;
    }

    private function construyeStatusCharac($datacharmain,$datacharvir){
        foreach($datacharmain as $key=>$value){
            $array_estado_charac[$key]['id']=$value['id'];
            $array_estado_charac[$key]['resistencia_p']=$value['resistencia_p'];
            $array_estado_charac[$key]['estamina_max']=$value['estamina_max'];
            $array_estado_charac[$key]['estamina_actual']=$value['estamina_actual'];
        }
        foreach($datacharvir as $v){                        
            $array_estado_charac[$key]['resistencia_p']=$array_estado_charac[$key]['resistencia_p']-$v['char_res'];
        }
        return $array_estado_charac;
    }

    private function manageVirtudes(&$actions,&$tipoc,$charvir,&$statusnpc,&$statuschar,$mans,$mansprefassets){
        foreach($charvir as $cv){
            if($cv['actions']!=0){        
                foreach($actions as $key=>$value){  
                    if($value['id']==$cv['actions'])
                        $actions[$key]['tend']+=10;        
                        //$this->aumentaTendAction($actions,$cv);
                }
            }
            if($cv['tipo_c']!=0){
                foreach($tipoc as $key=>$value){
                    if($value['id']==$cv['tipo_c'])
                        $tipoc[$key]['tend']+=10;                  
                        //$this->addTipoc($tipoc,$cv);
                }
            }                        
           /* foreach($mans as $key=>$value){
                $statusnpc[$key]['resistencia']-=$cv['man_res'];
            }
            foreach($statuschar as $key=>$value){
                $statuschar[$key]['resistencia_p']-=$cv['char_res'];
            }*/
        }
    }

    private function modStatusVir($charvir,$mans,&$statusnpc,&$statuschar){
        foreach($charvir as $cv){
            foreach($mans as $key=>$value){
                $statusnpc[$key]['resistencia']-=$cv['man_res'];
            }
            /*foreach($statuschar as $key=>$value){
                $statuschar[$key]['resistencia_p']-=$cv['char_res'];
            }*/
        }
    }

    private function addTendenciaActionsChar($actions,$datacharactions){
        foreach($actions as $key=>$value){
            foreach($datacharactions as $ca){
                if($value['id']==$ca['idact']){
                    $actions[$key]['tend']=$ca['tendencia'];
                    break;
                }
            }
        }

        return $actions;
    }

    private function addTendenciaTipocChar($tipo_c,$datacharactions){
        foreach($tipo_c as $key=>$value){
            foreach($datacharactions as $ca){
                if($value['id']==$ca['idact']){
                    $tipo_c[$key]['tend']=$ca['tendencia'];
                    break;
                }
            }
        }

        return $tipo_c;
    }

    private function addTendenciaTipocNpc($tipo_c,$cprefnpc){
        foreach($tipo_c as $key=>$value){
            foreach($cprefnpc as $cpnpc){
                if($value['id']==$cpnpc['idc']){
                    $tipo_c[$key]['tend']+=$cpnpc['tendencia'];
                    break;
                }
            }
        }

        return $tipo_c;
    }

    private function selectorTipoC($mans,/*$mansprefc,*/$tipo_c,$actionsf){
        $array_tipo_c=[];
        $cont=0;
        $estadt=0;

        foreach($actionsf as $a){
            if($a['id']==36)
                $estadt=1;
        }
        foreach($mans as $m){            
            foreach($tipo_c as $tc){
                if($tc['id']!=33 && $tc['id']!=7 || ($tc['id']==38 && $estadt==1)){
                    for($i=0;$i<$tc['tend'];$i++){
                        array_push($array_tipo_c,$tc);
                    }
                }
            }            
            shuffle($array_tipo_c);            
            $array_aux = $array_tipo_c[array_rand($array_tipo_c)];
            $tipo_c_final[$cont]['id'] = $array_aux['id'];
            $tipo_c_final[$cont]['idman'] = $m['id'];
            $tipo_c_final[$cont]['valor'] = $array_aux['valor'];
            $tipo_c_final[$cont]['descripcion'] = $array_aux['descripcion'];

            $cont++;
            foreach($tipo_c_final as $tcfinal){ 
               
                switch($tcfinal['id']){
                    case "6":
                    case "8":
                        $array_tipo_c=[];
                        foreach($tipo_c as $tc){
                            if($tc['id']==7){
                                for($i=0;$i<$tc['tend'];$i++){
                                    array_push($array_tipo_c,$tc['id']);
                                }
                                for($i=0;$i<100-$tc['tend'];$i++){
                                    array_push($array_tipo_c,0);
                                }
                            }
                        }    
                        shuffle($array_tipo_c);
                        $swa = $array_tipo_c[array_rand($array_tipo_c)];
                        if($swa!=0){
                            $tipo_c_final[$cont]['id'] = $swa;
                            $tipo_c_final[$cont]['idman'] = $m['id'];
                            $tipo_c_final[$cont]['descripcion'] = "Swallow";
                            $tipo_c_final[$cont]['valor'] = 9;
                        }
                        break;
                    case "38":
                        $tipo_c_final[$cont]['id'] = 7;
                        $tipo_c_final[$cont]['idman'] = $m['id'];
                        $tipo_c_final[$cont]['descripcion'] = "Swallow";
                        $tipo_c_final[$cont]['valor'] = 9;
                        break;
                    default:
                        break;
                }
            }
            $cont++;
        }     
      
        return $tipo_c_final;
    }

    private function selectorActions($actions){
        $array_temp_action=[];
        $array_actions_final=[];
        $cont=0;
        //var_dump($actions);
        foreach($actions as $a){
            for($i=0;$i<$a['tend'];$i++){
                array_push($array_temp_action,$a['id']);
            }
            for($j=0;$j<100-$a['tend'];$j++){
                array_push($array_temp_action,0);
            }
            shuffle($array_temp_action);
            $action_temp = $array_temp_action[array_rand($array_temp_action)];
            if($action_temp!=0){
                $array_actions_final[$cont]['id']=$a['id'];
                $array_actions_final[$cont]['descripcion']=$a['descripcion'];
                $array_actions_final[$cont]['cantidad']=1;
                $array_actions_final[$cont]['valor']=$a['valor'];
            }
            $action_temp=[];
            $array_temp_action=[];
            $cont++;
        }
        return $array_actions_final;
    }

    private function checkDt($tipo_c_final,$actions){
        foreach($tipo_c_final as $tc){
            //var_dump($tipoc);die();
            //foreach($tipoc as $tc){
                if($tc['id']=="38"){
                    $esta_dt=0;
                    foreach($actions as $a){
                        if($a['id']=="36"){
                            $esta_dt=1;
                        }
                    }
                    if(!$esta_dt) {
                        $actions[]['id']=36;
                        $actions[]['descripcion']="Deepthroat";
                        $actions[]['cantidad']=1;
                        $actions[]['valor']=6;
                    }
                }
            //}
        } 

        return $actions;
    }

    private function checkBj($array_actions_final,$mans){
        $esta_bj=0;  
        foreach($array_actions_final as $a){
            if($a['id']==3){
                $esta_bj=1;
            }
        }
        if(!$esta_bj){
            $array_actions_final[]['id']="3";
            $array_actions_final[]['descripcion']="Blowjob";
            $array_actions_final[]['cantidad']=count($mans); 
            $array_actions_final[]['valor']=4;
        }

        return $array_actions_final;
    }

    private function reconstruyeMans($mans){
        foreach($mans as $key=>$value){
            $mans[$value['id']]=$mans[$key];
            unset($mans[$key]);
        }

        return $mans;
    }

    private function calculaDuracionyCC(&$statusnpc,$charvir,$tipoactmis,$objects){
        foreach($statusnpc as $key=>$value){
            if($value['estamina_actual'] % $value['estamina_max']==0){
                //$duracion_o=sprintf('%02d:%02d', (int) $value['resistencia'], round(fmod($value['resistencia'], 1) * 60));
                $duracion_o=$value['resistencia'];
                $statusnpc[$key]['cc_actual']-=0.3;
            }elseif($value['estamina_actual'] <= $value['estamina_max']*0.30){
                //$duracion_o=sprintf('%02d:%02d', (int) $value['resistencia']+3, round(fmod($value['resistencia']+1, 1) * 60));
                $duracion_o=$value['resistencia']+3;
                $statusnpc[$key]['cc_actual']-=2.4;
            }elseif($value['estamina_actual'] <= $value['estamina_max']*0.60){
                //$duracion_o=sprintf('%02d:%02d', (int) $value['resistencia']+2, round(fmod($value['resistencia']+2, 1) * 60));
                $duracion_o=$value['resistencia']+2;
                $statusnpc[$key]['cc_actual']-=1.2;
            }elseif($value['estamina_actual'] <= $value['estamina_max']*0.95){
                //$duracion_o=sprintf('%02d:%02d', (int) $value['resistencia']+1, round(fmod($value['resistencia']+3, 1) * 60));
                $duracion_o=$value['resistencia']+1;
                $statusnpc[$key]['cc_actual']-=0.6;
            }
        }

        /*$lim_inferior = $duracion_o-5.0;
        $lim_superior= $duracion_o+5.0;

        $duracion_o=mt_rand($lim_inferior,$lim_superior);*/


        /*if(in_array(1,$tipoactmis)){
            foreach($charvir as $cv){
                if($cv['idvirtudes']==3 or $cv['idvirtudes']==4)
                    $duracion_o = $duracion_o/1.25;
            }
        }*/

        //return sprintf('%02d:%02d', (int) $duracion_o, round(fmod($duracion_o, 1) * 60));
        return $duracion_o;
    }

    private function calculaPuntos($tipoc,$actions){
        $puntos_aux=0;
        foreach($tipoc as $tc){
            //var_dump($tc);
            $puntos_aux+=$tc['valor'];
        }
        foreach($actions as $a){
            //var_dump($a);
            $puntos_aux+=$a['valor']*$a['cantidad'];
        }

        return $puntos_aux;
    }

    private function guardaPlayBd($userid,$misid,$mistj,$duracion_o,$actions,$tipo_c_final,$mans,$characs=null,$total_puntos,$statusnpc,$statuschar){
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->beginTransaction();
        try{
            $serv_mis = $this->get('xrpg.misionService');

            $savePlays = $serv_mis->postPlays($userid,$misid,$mistj,$duracion_o,$total_puntos);
            $em->persist($savePlays);
            
            
            $em->flush();

            $saveActionsPlays = $serv_mis->postActionsPlays($savePlays->getId(),$actions,$userid);            
            $saveCumPlays = $serv_mis->postCumPlays($savePlays->getId(),$tipo_c_final,$userid);
            $saveMansPlays = $serv_mis->postMansPlays($savePlays->getId(),$mans);
            $saveCharacPlays = $serv_mis->postCharacPlays($savePlays->getId(),$characs);
            $saveStatusNpc = $serv_mis->postStatusNpc($statusnpc);
            $saveStatusChar = $serv_mis->postStatusChar($statuschar,$total_puntos);
            //\Doctrine\Common\Util\Debug::dump($saveActionsPlays);die();
            //$em->persist($saveActionsPlays);
            $em->flush();
            $em->getConnection()->commit();
        }catch (Exception $e) {
            $em->getConnection()->rollBack();
            throw $e;
        }
    }

    private function calculaOrg($mans,$char,$tp,$duracionnpc,$charvir,$schar){
        $num_orgs=0;
        $sumatam=0;

       /*switch($tp){
            case '2':
                $duracion_o = $char[0]['resistencia_p'];
                break;
        }*/
        $duracion_o = $schar[0]['resistencia_p'];

        foreach($mans as $m){
            $sumatam+=$m['tamano'];            
        }
        $mediatam=$sumatam/count($mans);
        if(10 <= $mediatam and $mediatam <=12){
            $duracion_o+=2;
        }elseif(13 <= $mediatam and $mediatam <=14){
            $duracion_o++;
        }elseif(17 <= $mediatam and $mediatam <=19){
            $duracion_o--;
        }elseif($mediatam>=20){
            $duracion_o-=2;
        }

        switch($mans[0]['idtc']){
            case '2':
                $duracion_o+=2;
                break;
            case '3':
                $duracion_o+=0.5;
                break;
            case '4':
                $duracion_o--;
                break;
            case '6':
                $duracion_o-=1.5;
                break;
            default:
                break;
        }

        switch($mans[0]['idRitmo']){
            case '1':
                $duracion_o++;
                break;
            case '3':
                $duracion_o--;
                break;
            case '4':
                $duracion_o-=2;
                break;
            default:
                break;
        }

        switch($mans[0]['nivel']){
            case '1':
                $duracion_o+=1;
                break;
            case '2':
                $duracion_o+=0.5;
                break;
            case '4':
                $duracion_o-=0.5;
                break;
            case '5':
                $duracion_o--;
                break;
            case '6':
                $duracion_o-=1.5;
                break;
            default:
                break;
        }
        $multi = $this->checkMulti($charvir);
        $auxdura = $duracion_o;

        
        while($duracionnpc>$auxdura){
            $num_orgs++;   
            if($multi)        
                $variable=$auxdura/2;
            else
                $variable=($auxdura+($auxdura/2));
            $auxdura=$duracion_o+$variable;
        }
        return $num_orgs;            
    }

    private function checkMulti($charvir){
        foreach($charvir as $cv){
            if($cv['idvirtudes']==9)
                return true;
        }
        return false;
    }

    private function modificaStaminaNpc($statusnpc,$duracion_o){
        foreach($statusnpc as $key=>$value){
            $statusnpc[$key]['estamina_actual']-=(int)$duracion_o;
        }
        
        return $statusnpc;
    }

    private function modificaStaminaChar($statuschar,$duracion_o){
        foreach($statuschar as $key=>$value){
            $statuschar[$key]['estamina_actual']-=(int)$duracion_o;
        }
        
        return $statuschar;
    }
}