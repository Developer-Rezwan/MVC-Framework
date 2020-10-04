<?php

try{
	$pdo = new PDO("mysql:host=localhost;dbname=pdo;","Rezwan","Rez1rez1");

    $query = "INSERT INTO user (Username,Password) VALUES (:name,:pass)";
    $insert = $pdo->prepare($query);
    
    $insert->bindParam(':name',$name);
    $insert->bindParam(':pass',$pass);
    
    $name = "Sajeeb";
    $pass = "1232";

    $insert->execute();
    echo "Data is inserted!";


}
catch(PDOException $ex){
 echo $ex->getMassage();
}
