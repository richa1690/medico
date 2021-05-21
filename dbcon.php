<?php


class dbcon
{
public $server;
public $username;
public $password;
public $con;
public $dbname;

public function __construct()
{
$this->server = "localhost";
$this->username = "root";
$this->password = "";
$this->dbname = "project_db";
$this->con = new mysqli($this->server,$this->username,$this->password,$this->dbname);
if($this->con)
{
return $this->con;
}
else
{
return "error";
}

}
}


class Userdata extends dbcon
{

	public function insertinfo($name,$email,$cn,$ac,$city,$item,$password)
	{
		$sql2 = "INSERT INTO `tbl_user` (`id`, `name`, `email`, `contact no`, `adharcard no`, `city`, `item`, `password`) VALUES (NULL, '$name', '$email', '$cn', '$ac', '$city', '$item', '$password');";
		$y=$this->con->query($sql2);
		return $y;
	}

	public function showData()
	{
		$sql2 = "SELECT * FROM `tbl_user`";
		$y=$this->con->query($sql2);
	   $arr = array();
                while($row = $y->fetch_assoc())
                {
                    $arr[]=array($row['id'],$row['name'],$row['contact no'],$row['email'],$row['city'],$row['item']);
                  }
	  $arr2 = json_encode($arr);
	  return $arr2;
	}

	public function distinctCity()
	{
				$sql2 = "SELECT DISTINCT city FROM `tbl_user`";
				$y=$this->con->query($sql2);
			    
                while($row = $y->fetch_assoc())
                {
                    $arr[]=$row['city'];
                  }
	  // $arr2 = json_encode($arr);
	  return $arr;
	}

	public function insertstatusData($status,$id)
	{
		$sql2 = "UPDATE `tbl_user` SET `status`='$status' WHERE id='$id'";
		$y=$this->con->query($sql2);
		return $y;
	}


	public function braveusers()
	{
		$sql2 = "SELECT id,name,city FROM `tbl_user` ORDER BY rand() LIMIT 3";
		$y=$this->con->query($sql2);
		  $arr = array();
		  while($row = $y->fetch_assoc())
                {
                      $arr[]=array($row['id'],$row['name'],$row['city']);
                  }
	  
	  return $arr;
	
	}

}








?>