<?php
class controllerAdminCategory{
	
	public static function CategoryList(){
		
		$arr=modelAdminCategory::getCategoryList();
		  include_once 'viewAdmin/categoryList.php';		
		}
	
	public static function categoryAddForm(){		
		
		include_once('viewAdmin/categoryAddForm.php');	
	}
	
	public static function categoryAddResult()
	{
		$model = new modelAdminCategory();
		$test = $model->getCategoryAdd();	
		include_once('viewAdmin/categoryAddForm.php');
	}
	
	public static function categoryEditForm($id)
	{		
		
		$model = new modelAdminCategory();
		$detail = $model->getCategoryDetail($id);
		include_once('viewAdmin/categoryEditForm.php');	
	}
	
	public static function categoryEditResult($id)
	{
		$model = new modelAdminCategory();
		$test = $model->getCategoryEdit($id);	
		include_once('viewAdmin/categoryEditForm.php');
	}	
	
	public static function categoryDeleteForm($id)
	{		
		
		$model = new modelAdminCategory();
		$detail = $model->getCategoryDetail($id);
		include_once('viewAdmin/categoryDeleteForm.php');	
	}
	
	public static function categoryDeleteResult($id)
	{
		$model = new modelAdminCategory();
		$test = $model->getCategoryDelete($id);	
		include_once('viewAdmin/categoryDeleteForm.php');
	}	
	
}
?>





























