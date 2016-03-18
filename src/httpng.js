var myModule=angular.module("MyModule",[]);
myModule.controller("LoadCtrl",['$scope','$http', function($scope,$http){
$http({
    method:'GET',
    url:'data.json'
}).success(function(data,status,headers,config){
    console.log('success~');
    console.log(data);
    $scope.users=data;
}).error(function(data,status,headers,config){
    console.log('error');
});
}]);