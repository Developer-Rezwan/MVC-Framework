<?php
include_once 'vendor/autoload.php';
require_once 'config.php';
$db = new App\CrudController();

if(isset($_REQUEST['submit'])){
	 // $email = $_REQUEST['email'];
	 // $mobile = $_REQUEST['mobile'];
	 // $name = $_REQUEST['name'];
     
  //    $data = [
  //       'email' => $email,
  //       'mobile' => $mobile,
  //       'name' => $name
  //    ];
  //    $db->insert('test',$data);
   $data = [
   ];

   $db->select('test',$data);
   $data = $this->run->fetch(\PDO::FETCH_ASSOC);
   echo $data['email'];

}
?>

<form action="" method="post">
	<input type="text" name="name" placeholder="name" value="rezwan">
	<input type="text" name="mobile" placeholder="mobile" value="01100101001">
	<input type="text" name="email" placeholder="rezwanhossainsajeeb@gmail.com" value="rezwanhossainsajeeb@gmail.com">
	<input type="submit" name="submit">
</form>