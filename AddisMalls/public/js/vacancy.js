(function () {
    $addv = angular.module('vacancy',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });

    $addv.controller('maincontroller',function ($scope) {
       $scope.nego = true;
       $scope.fix = true;
       $scope.sala = false;
       $scope.tit = true;
       $scope.salaryFunc = function () {
           $scope.nego = false;
           $scope.fix = false;
           $scope.sala = true;
           $scope.tit = false;
       };
    });



})();