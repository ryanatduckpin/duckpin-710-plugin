<?php 
  
  //require WP core
  require_once("../../../../wp-load.php");
  
  //server side validation
$form = $_POST['duckpin710-form'];  

$name = $_POST['duckpin710-name'];
$email = $_POST['duckpin710-email'];


if($form == "newsletter"){
  if($name=='' || $email==''){
    echo "empty";
  }else{
    
  }
} else { echo "empty"; }
  
?>