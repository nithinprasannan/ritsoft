<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'ritsoft';
error_reporting(0);
$con1=mysql_connect("localhost","root","" );
mysql_select_db('ritsoft');

class dboperation
{
	var $con;
	var $result;
	var $r;
	var $id;
	public function Ex_query($query)
	{
		$con=mysqli_connect("localhost","root","","ritsoft");
		$this->result=mysqli_query($con,$query);
	
		if($this->result>0)
		{	
			return 1;
		}
		else
		{
			return 0;
		}
		
		
	}
	function selectdata($query)
	{
		$con=mysqli_connect("localhost","root","","ritsoft");
		if($result=mysqli_query($con,$query))
		{
			return $result;
		}
	
	}
	function fetch($result)
	{
		$r=mysqli_fetch_array($result,MYSQLI_BOTH);
		return $r;
	}
	function fetch_all($query)
	{	$rows= array();
	$con=mysqli_connect("localhost","root","","ritsoft");
		$result=mysqli_query($con,$query);
		 while($row = $result->fetch_assoc())
		 {
             $rows[] = $row;
    	}
    	return $rows;
	
	}
	function getnextId($table_name)
	{
		$con=mysqli_connect("localhost","root","","ritsoft");
		$result_stat = mysqli_query($con,"SHOW TABLE STATUS LIKE '$table_name'");
	
		$row_stat = mysqli_fetch_array($result_stat,MYSQLI_BOTH);
		$id = $row_stat['Auto_increment'];
		return $id; 
	}
	
	
};
?>