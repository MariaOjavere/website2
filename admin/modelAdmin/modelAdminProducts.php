<?php
class modelAdminProducts{
	
	
	    public static function getProductsList() {        
			//echo($_SESSION['email']);
			$query = "SELECT products.*, category.name,users.username from products, category,users WHERE products.category_id=category.id AND products.user_id=users.id ORDER BY `products`.`id` DESC";
        $db = new Database();
        $arr = $db->getAll($query);
        return $arr;
    }
	public static function getProductsAdd(){
		$test=false;
		if(isset($_POST['save']))
		{	if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory']) ){
			
			$title=$_POST['title'];
			$text=$_POST['text'];
			$idCategory=$_POST['idCategory'];			
			$image =addslashes (file_get_contents($_FILES['picture']['tmp_name']));
			$sql="INSERT INTO `products` (`id`, `title`, `text`, `picture`, `category_id`, `user_id`) VALUES (NULL, '$title', '$text', '$image', '$idCategory', '1')";
					$db = new Database();
					$item = $db->executeRun($sql);	
				if($item==true){
                $test=true;
            } 
		}
		}
		return $test;
	}
		public static function getProductsDetail($id) {        
		$query = "SELECT products.*, category.name,users.username from products, category,users WHERE products.category_id=category.id AND products.user_id=users.id and products.id=".$id;
        $db = new Database();
        $arr = $db->getOne($query);
        return $arr;
    }
	public static function getProductsEdit($id){
		$test=false;
		if(isset($_POST['save'])){	
			if(isset($_POST['title']) && isset($_POST['text']) && isset($_POST['idCategory']) ){			
				$title=$_POST['title'];
				$text=$_POST['text'];
				$idCategory=$_POST['idCategory'];
			$image=$_FILES['picture']['name'];
			if($image!=""){
				 $image =addslashes(file_get_contents($_FILES['picture']['tmp_name']));
			}
			if($image==""){				
				$sql="UPDATE `products` SET `title` = '$title', `text` = '$text', `category_id` = '$idCategory' WHERE `products`.`id` = ".$id;
			}
			else{
				$sql="UPDATE `products` SET `title` = '$title', `text` = '$text', `picture`='$image',`category_id` = '$idCategory' WHERE `products`.`id` = ".$id;
			}			
					$db = new Database();
					$item = $db->executeRun($sql);	
				if($item==true){
					$test=true;
				} 
			}
		}
		return $test;
	}
	
	public static function getProductsDelete($id){
		$test=false;
		if(isset($_POST['save']))	{
			$sql="DELETE FROM `products` WHERE `products`.`id` = ".$id;
			$db = new Database();
					$item = $db->executeRun($sql);	
				if($item==true){
                $test=true;
            } 			
		}				
		return $test;
		}
}//class
























