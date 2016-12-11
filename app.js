var app=angular.module('myapp',[]);


app.controller('doubanMovie', function($scope,$http){
	$http.get("doubanMovie.php").success(function(response){
		$scope.doubanMovies=response.doubanMovies;
	});
});



app.controller('qryMovieLove', function($scope,$http){
	$http.get("love.php").success(function(response){
		$scope.moviesLove=response.moviesLove;
	});
});

app.controller('tuijianForm', function($scope,$http){
	
	$scope.formData={};
    $scope.buttonAbled=false;
    //提交表单
	$scope.processForm = function() {
	$scope.buttonAbled=false;
    $http({
        method  : 'POST',
        url     : 'insertlove.php',
        data    : $.param($scope.formData),  // pass in data as strings
        headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
    })
        .success(function(data) {
            console.log(data);
 
            console.log($scope.formData);
            
            location.reload();
            $scope.buttonAbled=true;
            }
        );
};
})