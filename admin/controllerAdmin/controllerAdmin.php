<?php
class controllerAdmin{

	
	public static function error404(){
		include_once("viewAdmin/error404.php");
		
	}

	public static function formLoginSite(){
		include_once "viewAdmin/formLogin.php";
	}
	public static function loginAction(){
		$logIn=false;
		$logIn=modelAdmin::userAuth();
		if($logIn){
			include_once "viewAdmin/startAdmin.php";
		}else{
			$_SESSION['errorString']='Vale e-posti aadress või parool';
			include_once "viewAdmin/formLogin.php";
		}
	}
	public static function logoutAction(){
		modelAdmin::userLogout();
		header('Location:./');
	}
	

	public static function profileTable()
	{			
		include_once('viewAdmin/profileTable.php');			
	}

	public static function profileEditResult()
	{	
		$test=modelAdmin::ChangePassword();
		include_once('viewAdmin/profileTable.php');			
	}

	
	
}
?>











