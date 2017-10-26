(function () {

    $addsp = angular.module('addsp',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    $addsp.controller('maincontroller',function ($scope) {
        $scope.title = "Details about your services";
        $scope.first = true;
        $scope.second = false;
        $scope.finalbutton = false;
        $scope.toSecond = function () {
            $scope.first = false;
            $scope.second = true;
            $scope.finalbutton = true;
            $scope.title = "contact details of the admin of this service provider";
        };
        $scope.toFirst = function () {
            $scope.first = true;
            $scope.second = false;
            $scope.finalbutton = false;
            $scope.title = "Details about your services";
        };
    });
})();