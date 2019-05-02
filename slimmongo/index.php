<?php
require_once '/lib/Slim/Slim/Slim.php';
require_once '/controllers/StudentController.php';

  Slim\Slim::registerAutoloader();
  $app = new Slim\Slim();

  function response($status, $response) {
    $app = \Slim\Slim::getInstance();
    $app->status($status);
    $app->contentType('application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
  }

  $app->get('/hello',['StudentController', 'index']);
  // $app->get('/', ['TestController', 'index']);
  $app->get('/findByName/:name',function ($name){
    StudentController::findByName($name);
  });
  // $app->post('/insert', function() use($app){
  //   TestController::insert($app->request());
  // });
  $app->post('/search', function() use($app){ 
    StudentController::search($app->request()); //name age
   });
   $app->post('/insert', function() use($app){
    StudentController::insert($app->request());
   });  
  // $app->get('/getdata/:age', function ($age) {
  //   TestController::getdata($age);
  // });
  $app->run();
?>
