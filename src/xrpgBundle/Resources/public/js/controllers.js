/**
 * Created by Alberto on 24/01/16.
 */

angular.module('xrpgApp.controllers', []).
    controller('charactersController',["$scope","$location","$http","dataChar","charactersAPI","characterAPI",/*"actionsAPI","actionAPI",*/
    function($scope,$location,$http,dataChar,charactersAPI,characterAPI/*,actionsAPI,actionAPI*/){
        $scope.charactersList=[];
        $scope.characterData=dataChar.data;
        $scope.idchar;
        $scope.message="funciona!";

        // $scope.actionsList=[];
        // $scope.actionData=[];
        // $scope.allCharAct=[];

        //$scope.tipojuego = calcplay;

        // $scope.go = function go(idchar) {
        //     $location.path('/character/' + idchar);
        //     characterAPI.getCharacter(idchar).success(function(response){
        //         $scope.characterData=dataChar;                
        //     });
        // };

        // $http.get('/xrpg/web/app_dev.php/characters')
        // .then(function(result) {
        //     console.log('things went well!', result);

        //     $scope.charactersList = result.data.characters;

        // }, function (err) {
        //     console.error('things did not go so well', err);
        // });

        charactersAPI.getCharacters().success(function(response){
            $scope.charactersList=response.characters;
        });

        // $scope.character = function(idchar) {
        //     characterAPI.getCharacter(idchar).success(function(response){
        //         $scope.idchar=idchar;
        //         $scope.characterData=response;
        //     });
        // };

        // $scope.goplay = function goplay(idchar) {
        //     //$scope.idchar=item;
        //     $location.path('/character/' + idchar + '/preplay');            
        // };

        // $scope.goplay = function goplay(item) {
        //     console.log("mecagoento");
        //     $location.path('/character/play/'+item);
        //     playAPI.getPlay(item).success(function(response){
        //         $scope.tipojuego=response;
        //     });
        // };

        // actionsAPI.getActions().success(function(response){
        //     $scope.actionsList=response.actions;
        //     console.log(response);
        // });
        //
        // $scope.action = function(item) {
        //     actionAPI.getAction(item).success(function(response){
        //         $scope.actionData=response;
        //         console.log(response);
        //     });
        // };

        // $scope.insertData=function(){
        //     $http.post(Routing.generate('actions_post_save_char_act'), {
        //         'charac':$scope.listaCharacters,
        //         'action':$scope.listaActions,
        //         'tendencia':$scope.tendencia
        //     }).then(function(response){
        //         alert("Inserted");
        //         console.log("Data Inserted Successfully");
        //     },function(error){
        //         alert("Sorry! Data Couldn't be inserted!");
        //         console.error(error);
        //     });
        // };

        // $scope.getAllCharAct=function(item){
        //     $http.get(Routing.generate('characters_get_all_char_acts')+'/'+item
        //     ).success(function(response){
        //         $scope.allCharAct=response;
        //         console.log(response);
        //     });
        // };
}]).controller('actionsController',["$scope","$location","$http",/*,"actionsAPI","actionAPI",*/
        function($scope,$location,$http/*,actionsAPI,actionAPI*/){
            // $scope.actionsList=[];
            // $scope.actionData=[];
            $scope.allCharAct=[];

            $scope.getAllCharAct=function(item){
                $http.get(Routing.generate('characters_get_all_char_acts')+'/'+item
                ).success(function(response){
                    $scope.allCharAct=response;
                });
            };
        }
 ]).controller('preplayController',["$scope","$location","$stateParams","$http","playAPI",
    function($scope,$location,$stateParams,$http,playAPI){
        $scope.preplay=[];
        $scope.idchar = $stateParams.idchar;

        playAPI.getPlay($stateParams.idchar).success(function(response){
            $scope.preplay=response.campaigns;
        });
    }
]).controller('campaignsController',["$scope","$location","$stateParams","$http","campaignsAPI","misionAPI",
    function($scope,$location,$stateParams,$http,campaignsAPI,misionAPI){
        $scope.campaign={};
        $scope.idchar = $stateParams.idchar;
        $scope.idcamp = $stateParams.idcamp;
        $scope.campaignJoined = false;
        $scope.briefing = {};

        campaignsAPI.getCampaign($scope.idchar,$scope.idcamp).success(function(response){
            $scope.campaign=response.campaign;
        });

        $scope.aplicaClaseBadgeMision = function(idtipomision) {
            switch (idtipomision) {
                case 1:
                    return "badge badge-primary";
                    break;
                case 2:
                    return "badge badge-success";
                    break;
                case 3:
                    return "badge badge-warning";
                    break;
                default:
            }
        }

        $scope.joinCampaign = function(idcamp,idchar){
            campaignsAPI.putCampaignChar(idcamp,idchar).success(function(response){
                console.log(response);
                $scope.campaignJoined=response;                
            });
        }

        /*$scope.goBriefing = function goBriefing(campaign,idmision,idchar) {
            $location.path('/character/' + idchar + '/preplay/campaign/'+campaign+'/briefing/'+idmision);            
        }*/
    }
]).controller('misionController',["$scope","$location","$stateParams","$http","$uibModal","briefingData",/*"partidaData",*/"misionAPI",
    function($scope,$location,$stateParams,$http,$uibModal,briefingData,/*partidaData,*/misionAPI){ 
        //console.log(briefingData.data);       
        $scope.misionData=briefingData.data;
        //$scope.partida=partidaData;
        $scope.objetos={};
        $scope.played={};
        $scope.idchar = $stateParams.idchar;
        $scope.idcamp = $stateParams.idcamp;
        $scope.idmisi = $stateParams.idmision;
        $scope.modalInstance;

        /*misionAPI.briefingMisionCamp($scope.idchar,$scope.idcamp,$scope.idmisi).success(function(response){
            $scope.mision=response;
        });*/

        // $scope.misionCamp = function(misionC){
        //     misionAPI.playMisionCamp(misionC).success(function(response){
        //         console.log(mision);
        //         $scope.played=response;                
        //     });
        // }

        $scope.aplicaClaseBadgeMision = function(idtipomision) {
            switch (idtipomision) {
                case 1:
                    return "badge badge-primary";
                    break;
                case 2:
                    return "badge badge-success";
                    break;
                case 3:
                    return "badge badge-warning";
                    break;
                default:
            }
        }

        $scope.open = function() {
            $scope.modalInstance =  $uibModal.open({
              templateUrl: "../../src/xrpgBundle/Resources/views/Default/objetos.html.twig",
              controller: "objectsController",
              size: '',
            });
        };



    // $scope.jugarMisionCamp = function(campaign,idmision,idchar){
    //     misionAPI.empezarMisionCamp(campaign,idmision,idchar).success(function(response){
    //         console.log(response);
    //         $scope.briefing=response;              
    //     });
    // }
    }
]).controller('playController',["$scope","$location","$stateParams","$http","partidaData","playAPI",
function($scope,$location,$stateParams,$http,partidaData,playAPI){
    console.log(partidaData);
    //setTimeout(update(), 100);
    $scope.played = partidaData;
}
]).controller('mansController',["$scope","$location","$stateParams","$http","mansAPI",
    function($scope,$location,$stateParams,$http,mansAPI){
        $scope.mans = [{}];
        $scope.addMan = function() {
            var newMan = {};
            $scope.mans.push(newMan);
        }
    }
]).controller('objectsController',["$scope","$location","$stateParams","$uibModal","$http","objectsAPI",
    function($scope,$location,$stateParams,$uibModal,$http,objectsAPI){
        $scope.objectsList;
        $scope.idchar = $stateParams.idchar;

        objectsAPI.getObjectsPlay($scope.idchar).success(function(response){
            console.log(response.obj);
            $scope.objectsList=response.obj;
        });

        $scope.close = function () {
            var modalInstance = $uibModal.dismiss();
        };

    }
])
;
