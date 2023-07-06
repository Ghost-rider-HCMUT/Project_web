<?php
session_start();
//import config db
require 'config.php';
require 'connectDb.php';

// import model
require 'model/Student.php';
require 'model/StudentRepository.php';

require 'model/Subject.php';
require 'model/SubjectRepository.php';

require 'model/Register.php';
require 'model/RegisterRepository.php';
// // router
// c là contronler
$c = !empty($_GET['c']) ? $_GET['c'] : 'student';

// a là action (hàm trong controller)
$a = !empty($_GET['a']) ? $_GET['a'] : 'index';

//Giả sử:
// http://qlsvmvc.com/?c=subject&a=create
//$c có giá trị là subject
//$a có giá trị là create
//Mong muốn gọi hàm create() của SubjectController

$str = ucfirst($c) . 'Controller'; //SubjectController
require "controller/$str.php"; //controller/SubjectController.php
$controller = new $str(); //new SubjectController();
$controller->$a();//$controller->create();