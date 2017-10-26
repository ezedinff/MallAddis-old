(function () {
    $editMall = angular.module('editMall',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    $editMall.controller('mainController',function ($scope) {
        $scope.isActiveClasslocation = "";
        $scope.isActiveClassMall = "red-text";
        $scope.detail = true;
        $scope.location = false;
        $scope.tin = true;
        $scope.updateLocation = function () {
            $scope.detail = false;
            $scope.location = true;
            $scope.isActiveClasslocation = "red-text";
            $scope.isActiveClassMall = "";
        };
        $scope.detailMall = function () {
            $scope.detail = true;
            $scope.location = false;
            $scope.isActiveClasslocation = "";
            $scope.isActiveClassMall = "red-text";
        };
    });
})();