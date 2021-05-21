<?php

include 'dbcon.php';

if(isset($_POST['name']))
{
	$name = $_POST['name'];
	$city = $_POST['city'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$item = $_POST['item'];
	$cn = $_POST['contact'];
	$ac = $_POST['adharnum'];

	$x =   new userdata();
	$y =   $x->insertinfo($name,$email,$cn,$ac,$city,$item,$password);

	print_r($y);
}
if(isset($_POST['status']))
{
   $status = $_POST['status'];
   $id = $_POST['id'];
   $x =   new userdata();
   $y =   $x->insertstatusData($status,$id);

   print_r($y);
}



if(isset($_POST['contacted']))
{
   $status = $_POST['contacted'];
   $id = $_POST['id'];
   $x =   new userdata();
   $y =   $x->insertstatusData($status,$id);

   print_r($y);
}


if(isset($_POST['value']))
{
   $arr = ['form','index'];
   $url = $_POST['value'];
   if(in_array($url,$arr))
   {
   	$content = file_get_contents($url.'.php');
   	print_r($content);
   }
   else
   {
   	echo "page note found";
   }
}

if(isset($_POST['action1'])){
      $case = $_POST['action1'];
      switch ($case) {
         case 'show':
            $x =   new userdata();
            $y =   $x->showData();
            echo($y);
         }
}
  
   



?>