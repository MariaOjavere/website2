<?php
class modelAdminCategory{

public static function getCategoryList(){
	$sql = "SELECT * FROM category ORDER BY category.name ASC";
		$db = new Database();
        $rows = $db->getAll($sql);
        return $rows;
	
}	

public function getCategoryDetail($id){
	$sql = "SELECT * FROM `category` WHERE `id`=".$id;
		$db = new Database();
        $row = $db->getOne($sql);
        return $row;	
}	
public function getCategoryAdd(){
	$test=false;
		if(isset($_POST['save'])){				
			if(isset($_POST['name'])  ){
			$category = $_POST['name'];	
			$sql="INSERT INTO `category` (`id`, `name`) VALUES (NULL, '$category')";
			$db = new Database();
			$item = $db->executeRun($sql);	
			if($item) $test=true;
			}
		}		
	return $test;
}

public function getCategoryEdit($id)
{
	$test=false;
		if(isset($_POST['save']))
		{				
			if(isset($_POST['name'])  ){
			$category = $_POST['name'];		
			$sql="UPDATE `category` SET `name` = '$category' WHERE `category`.`id` = ".$id;
			$db = new Database();
			$item = $db->executeRun($sql);				
			if($item) $test=true;
			}
		}	
return $test;		
	
}
public function getCategoryDelete($id)
{
	$test=false;
		if(isset($_POST['save']))
		{					
			$sql="DELETE FROM `category` WHERE `category`.`id` =".$id;
			$db = new Database();
			$item = $db->executeRun($sql);				
			if($item) $test=true;
			
		}	
return $test;		
	
}



}
?>