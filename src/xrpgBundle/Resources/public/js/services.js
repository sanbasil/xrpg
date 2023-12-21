/**
 * Created by Alberto on 24/01/16.
 */
var app = angular.module('xrpgApp.services',[]);

app.factory('charactersAPI',function($http){
    var charactersAPI={};

    charactersAPI.getCharacters = function(){
        return $http({
            method:'GET',
            url: location.pathname +'characters'
        });
    }

     return charactersAPI;
});
app.factory("dataChar",['$q','$timeout',function($q,$timeout) {
   
    return function (idchar) {
       var defered=$q.defer();
       var promise=defered.promise;
         
       $timeout(function() {
          try{
            return $http({
                method:'GET',
                url: location.pathname+ 'characters/'+idchar
            });
          } catch (e) {
             defered.reject(e);
          }   
       },3000); 

       return promise;
    } 
     
  }]);
app.factory('characterAPI',function($http){
    var characterAPI={};

    characterAPI.getCharacter = function(idchar){
        return $http({
            method:'GET',
            url: location.pathname+ 'characters/'+idchar
        });
    }

    return characterAPI;
});
app.factory('playAPI',function($http){
    var playAPI={};

    playAPI.getPlay = function(idchar){
        return $http({
            method:'GET',
            url: location.pathname+ 'characters/'+idchar+'/preplay'
        });
    }

    return playAPI;
});
app.factory('campaignsAPI',function($http){
    var campaignsAPI={};
    campaignsAPI.getCampaign = function(idchar,idcamp){
        return $http({
            method:'GET',
            url: location.pathname+'characters/'+idchar+'/preplay/campaign/'+idcamp
        })
    }

    campaignsAPI.putCampaignChar = function(idcamp,idchar){
        return $http({
            method:'POST',
            url: location.pathname+'characters/'+idchar+'/preplay/campaign/'+idcamp+'/start'
        })
    }

    return campaignsAPI;
});
app.factory('misionAPI',function($http){
    var misionAPI={};
    misionAPI.briefingMisionCamp = function(idchar,idcamp,idmisi){
        return $http({
            method:'GET',
            url: location.pathname+'characters/'+idchar+'/preplay/campaign/'+idcamp+'/mision/'+idmisi
        })
    }

    misionAPI.playMisionCamp = function(mision){
        return $http({
            method:'GET',
            url: location.pathname+'characters/'+idchar+'/preplay/campaign/'+idcamp+'/mision/'+idmisi+'/play'
        })
    }
    return misionAPI;
});

app.factory('mansAPI',function($http){
    var mansAPI={};

    return mansAPI;
});

app.factory('objectsAPI',function($http){
    var objectsAPI={};
    
    objectsAPI.getObjectsPlay = function(idchar){
        return $http({
            method:'GET',
            url: location.pathname+'characters/'+idchar+'/objects'
        })
    }
    return objectsAPI;
});
// app.factory('actionsAPI',function($http){
//     var actionsAPI={};
//
//     actionsAPI.getActions = function(){
//         return $http({
//             method:'GET',
//             url: Routing.generate('actions_get_acts')
//         });
//     }
//
//     return actionsAPI;
// });
// app.factory('actionAPI',function($http){
//     var actionAPI={};
//
//     actionAPI.getAction = function(item){
//         console.log(item);
//         return $http({
//             method:'GET',
//             url: Routing.generate('actions_get_act')+'/'+item
//         });
//     }
//
//     return actionAPI;
// });