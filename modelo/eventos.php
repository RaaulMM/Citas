
<?php 
  header('Content-Type: application/json');
  $pdo= new PDO("mysql:host=localhost;port=3307;dbname=cita;charset=utf8;","root","") ;
  			
  $db= $pdo->prepare('SELECT * FROM eventos');
  $db->execute();

  $re=$db->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($re);
  		
 ?>