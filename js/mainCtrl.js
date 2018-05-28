var app = angular.module('myApp', ['ngStorage']);
app.controller('loginCtrl', function($scope, $http, $localStorage) {
    
    $scope.login = function(){
        
       if ($scope.username == " " || $scope.username == null){alert('Username field cannot be  empty');}else if
       ($scope.password==" "  || $scope.password == null){alert('Password field cannot be  empty');}else{
       var user_params = $.param({
		       	
                  'username':$scope.username,
                  'password':$scope.password
                  
                 
              });
             
        $http({
          method : "POST",
          url : "../php/login.php",
          data: user_params,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
                if (response.data == 'Clear to Go'){
                $
                 location.replace("home.html");
                
                }else{ alert(response.data);}
          }, function myError(response) {
              
        });    
            
    };
        
    };
});

app.controller('homeCtrl', function($scope, $http, $localStorage) { 
    
$scope.time=[00,01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24];
  
    $scope.submit_m = function(){
        
     $scope.total=$scope.m_end-$scope.m_start;
      var m_params = $.param({
		       	
                  'title':$scope.m_title,
                  'client':$scope.m_client,
                  'employee':$scope.username,
                  'comments':$scope.m_comments,
                  'start':$scope.m_start,
                  'date':$scope.m_date,
                  'total':$scope.total,
                  'end':$scope.m_end
                 
              });
             
        $http({
          method : "POST",
          url : "../php/sheet.php",
          data: m_params,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
          if (response.data == "New record created successfully"){
              alert('Succesfully added');
              $scope.start= "";
              $scope.end = "";
              $scope.comments = "";
          }else{ alert('Something is wrong');}
          }, function myError(response) {
              
        });    
         $scope.getsheet();  
    };


$scope.userGet = function() {   
    $http({
        method : "GET",
        url : "../php/getuser.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.username=response.data['username']
          $scope.first_name=response.data['first_name'];
          $scope.last_name=response.data['last_name'];
          $scope.address=response.data['address'];
        }, function myError(response) {
          
  });
  

}

$scope.getsheet = function() { 
    
    var user_params = $.param({
		       	
                  'username':$scope.username
                
              });
             
        $http({
          method : "POST",
          url : "../php/getsheet.php",
          data: user_params,
          headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
        }).then(function mySuccess(response) {
              $scope.sheets=response.data;
          }, function myError(response) {
              
        });    
            
    };


$scope.getClients = function() {   
    $http({
        method : "GET",
        url : "../php/getclient.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          $scope.clients=response.data;
        
        }, function myError(response) {
          
  });

}

$scope.logout = function() {   
    $http({
        method : "GET",
        url : "../php/logout.php",
        headers: {'Content-Type' : 'application/x-www-form-urlencoded; charset=UTF-8'}
      }).then(function mySuccess(response) {
          location.replace("index.html");
        
        }, function myError(response) {
          
  });

}


$scope.clientsI = function(x) {   
    $scope.c_name=x['client_name'];
    $scope.m_name=x['managers_name'];
    $scope.m_position=x['position'];
    
 

}


setTimeout(myFunction, 2000)
function myFunction() {
    $scope.getsheet();
}
$scope.userGet();
$scope.getClients();

    
});