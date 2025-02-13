<?php
include "constants.php";
include BASE_PATH ."bootstrap/config.php";
include BASE_PATH ."vendor/autoload.php";
$dsn = "mysql:host={$database_config['host']};dbname={$database_config['dbname']};charset=utf8";
try{
    $pdo = new PDO($dsn, "root", "");
}catch(PDOException $e){
   diePage('Conection error:'. $e->getMessage());
};
include BASE_PATH ."libs/helpers.php";
include BASE_PATH ."libs/lib-auth.php";
include BASE_PATH ."libs/lib-tasks.php";


