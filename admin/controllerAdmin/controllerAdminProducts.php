<?php
class controllerAdminProducts{
	
	public static function ProductsList(){
		
		$arr=modelAdminProducts::getProductsList();
		  include_once 'viewAdmin/productsList.php';		
		}
	public static function productsAddForm()
	{		
		$arr = modelAdminCategory::getCategoryList();	
		include_once('viewAdmin/productsAddForm.php');	
	}
	
	public static function productsAddResult()
	{
		$test = modelAdminProducts::getProductsAdd();	
		include_once('viewAdmin/productsAddForm.php');
	}

	public static function productsEditForm($id)
	{		
		
		$arr = modelAdminCategory::getCategoryList();	
		$detail=modelAdminProducts::getProductsDetail($id);
		include_once('viewAdmin/ProductsEditForm.php');	
	}
	
	public static function productsEditResult($id)
	{
		$test = modelAdminProducts::getProductsEdit($id);	
		include_once('viewAdmin/ProductsEditForm.php');
	}	
	
	public static function ProductsDeleteForm($id)
	{		
		$arr = modelAdminCategory::getCategoryList();	
		$detail=modelAdminProducts::getProductsDetail($id);
		include_once('viewAdmin/ProductsDeleteForm.php');	
	}
	
	public static function productsDeleteResult($id)
	{
		$test = modelAdminProducts::getProductsDelete($id);	
		include_once('viewAdmin/productsDeleteForm.php');
	}	
	
} 
?>





























