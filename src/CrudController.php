<?php
namespace App;

class CrudController extends Database
{
public $run;
/************************ insert data into database **************************/
public function insert($table , $data = array()){
   $query = "INSERT INTO $table (";
   foreach($data as $key => $value){
      $query .= "$key,";
   }
   $query = substr($query,0,-1);
   $query .= ") VALUES (";
   foreach ($data as $key => $value) {
      $query .= ":$key ," ;
   }
   $query = substr($query,0,-1);
   $query .=" )";
   $run = $this->pdo->prepare($query);
  
  foreach($data as $key => $value){
    $run->bindValue( $key ,$value );  // array er khetre obosshoi 'bindValue' use korte hobe..

  }
   $run->execute();

   if($run->rowCount()){
   	echo "Data is successfully inserted!";
   }
}



// while($data = $run->fetch(\PDO::FETCH_ASSOC)){
//   echo $data['email']."<br/>";
// }

/**
* $data = [

   'select' =>'Username,Email,....',
   'where' => ['name'=> '...'],
   'whereAnd' => ['name'=> '...', 'email' => '....'],
   'whereOr' => ['name'=> '...', 'email' => '....'],
   'orderBy' => 'Id DESC',
   'limit' => '2,10'

];
**/

public function select($table,$data = array()){
  $query = "SELECT ";
  $query .= array_key_exists('select', $data) ? $data['select'] : '*';
  $query .= " FROM $table " ;
  

  /** Now Select the where condition ***/
  if(array_key_exists('where', $data)){
    $query .= " WHERE ";

   foreach ($data['where'] as $key => $value) {
    $query .= "$key = '$value' ";

   } /** End foreach here **/

  } /** End if() here **/ 


  /** Now Select the where-And condition ***/
  if(array_key_exists('whereAnd', $data)){
    $query .= " WHERE ";

   foreach ($data['whereAnd'] as $key => $value) {
    $query .= "$key = '$value' AND ";

   } /** End foreach here **/
   
    $query = substr($query,0,-4);

  } /** End if() here **/ 


  /** Now Select the where-Or condition ***/
  if(array_key_exists('whereOr', $data)){
    $query .= " WHERE ";

   foreach ($data['whereOr'] as $key => $value) {
    $query .= "$key = '$value' OR ";

   } /** End foreach here **/
   
    $query = substr($query,0,-3);

  } /** End if() here **/


 /** ORDER BY Condition **/
   if(array_key_exists('orderBy', $data)){
     $query .= 'ORDER BY '.$data['orderBy'];
   } /** End The if() **/


/** LIMIT SET HERE **/
  if(array_key_exists('limit', $data)){
     $query .= ' LIMIT '.$data['limit'];

  }/** End The if() **/

  $this->run = $this->pdo->prepare($query);
  $this->run->execute();

} /*** End here the function ***/



} /*** End Here The Class ***/