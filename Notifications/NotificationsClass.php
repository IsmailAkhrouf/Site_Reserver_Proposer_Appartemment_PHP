<?php
  class InsertClassNotifications {
  public $pdo;

  public function __construct() {
    $this->pdo= new PDO("mysql:host=localhost:3307;dbname=locationline",'root','');
  }
  public function insert_notifications($id,$Sujet,$Objet,$Date,$Email,$Nom) {
	   
	   $stmt=$this->pdo->prepare("insert into notifications Values (:id,:a1,:a2,:a3,:a4,:a5)");
	   return $stmt->execute(array(':id'=>$id,':a1'=>$Sujet,'a2'=>$Objet,'a3'=>$Date,'a4'=>$Email,'a5'=>$Nom));
  }
}
?> 