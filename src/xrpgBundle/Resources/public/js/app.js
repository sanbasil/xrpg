/**
 * Created by Alberto on 24/01/16.
 */
var xrpgApp = angular.module('xrpgApp', [
    'xrpgApp.controllers',
    'xrpgApp.services',
    'ui.router',
    'ui.bootstrap'
]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[').endSymbol(']}');
});

xrpgApp.config(function($stateProvider){
    var states = [
        {
            name: 'home',
            url: '/#',
            templateUrl: '../../src/xrpgBundle/Resources/views/Default/index.html.twig',
            controller:'charactersController'
        },
        {
            name: 'character',
            url: '/character/{idchar}',
            // templateUrl: '../../src/xrpgBundle/Resources/views/Default/perfil.html.twig',
            // controller:'charactersController',
            views:{
                'main':{    templateUrl: '../../src/xrpgBundle/Resources/views/Default/perfil.html.twig',
                                controller:'charactersController'
                }
            },
            resolve: {
                dataChar: function ($http,$stateParams) {
                    return $http({
                        method:'GET',
                        url: location.pathname+ 'characters/'+$stateParams.idchar
                    });
                }
            }
            
            // resolve: {
            //     character: function(characterAPI, $stateParams) {
            //         return CharacterAPI.getCharacter($stateParams.id);
            //       }
            // }
        },
        {
            name: 'preplay',
            url: '/character/{idchar}/preplay',
            views:{
                'main':{    templateUrl: '../../src/xrpgBundle/Resources/views/Default/play.html.twig',
                controller:'preplayController'
                }
            },
            
            
        },
        {
            name: 'preplay.campaigns',
            url: '/campaign/{idcamp}',
            // templateUrl: '../../src/xrpgBundle/Resources/views/Default/campaigns.html.twig',
            //     controller:'campaignsController'
            views:{
                'contCol':{    templateUrl: '../../src/xrpgBundle/Resources/views/Default/campaigns.html.twig',
                controller:'campaignsController'
                }
            }
            
        },
        {
            name: 'briefing',
            url: '/character/{idchar}/preplay/campaign/{idcamp}/mision/{idmision}',
            // templateUrl: '../../src/xrpgBundle/Resources/views/Default/briefing.html.twig',
            // controller:'misionController'
            views:{
                'main':{    templateUrl: '../../src/xrpgBundle/Resources/views/Default/briefing.html.twig',
                            controller:'misionController'
                }
            },
            resolve: {
                briefingData: function ($http,$stateParams) {
                    return $http({
                        method:'GET',
                        url: location.pathname+'characters/'+$stateParams.idchar+'/preplay/campaign/'+$stateParams.idcamp+'/mision/'+$stateParams.idmision
                    });
                }
            }
            
        },
        {
            name: 'briefing.playMisionCamp',
            url: '/play',
            params: {playData: null},
            // templateUrl: '../../src/xrpgBundle/Resources/views/Default/briefing.html.twig',
            // controller:'misionController'
            views:{
                'tablero':{    templateUrl: '../../src/xrpgBundle/Resources/views/Default/misionPlay.html.twig',
                            controller:'playController'
                }
            },
           
            resolve: {
                partidaData: function ($http,$stateParams) {
                    return $http({
                        method:'POST',
                        url: location.pathname+'play',
                        /*headers: {
                            'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'
                        },*/
                        data: {playData: $stateParams.playData}
                    });
                }
            }
            
        },
        {
            name: 'crearCampaign',
            url: '/campaign/new',
            templateUrl: '../../src/xrpgBundle/Resources/views/campaigns/new.html.twig',
            controller:'campaignsController'
        },
        {
            name: 'crearMision',
            url: '/mision/new',
            templateUrl: '../../src/xrpgBundle/Resources/views/misiones/new.html.twig',
            controller:'misionController'
        },
        {
            name: 'crearMans',
            url: '/mans/new',
            templateUrl: '../../src/xrpgBundle/Resources/views/mans/new.html.twig',
            controller:'mansController'
        }
    ]

    states.forEach(function(state) {
        $stateProvider.state(state);
    });
});