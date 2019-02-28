<?php 

class controladorIndex{
 
         public function __construct(){
 
         }
      
         public function index(){

         	require_once "vista/index.login.php";
         }

         public function indexCalendario(){

         	require_once "vista/calendario.php";
         }

     }

?>