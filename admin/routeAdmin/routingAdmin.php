<?php
	$host = explode('?', $_SERVER['REQUEST_URI'])[0];
	$num = substr_count($host, '/');
	$path = explode('/', $host)[$num];
	
	if($path=="" OR $path=="index"){
		$response=controllerAdmin::formLoginSite();
		
	}
	
	elseIf($path=='login'){
		$response=controllerAdmin::loginAction();
	}
	
		elseIf($path=='logout'){
		$response=controllerAdmin::logoutAction();
	}

	elseif($path=='productsAdmin'){
		$response=controllerAdminProducts::ProductsList();
		
	} 
		elseif($path=='productsAdd'){
		$response=controllerAdminProducts::productsAddForm();
		
	}
	elseif($path == 'productsAddResult') {		
	$response = controllerAdminProducts::productsAddResult();	
}

		elseif($path=='productsEdit' && isset($_GET['id'])){
		$response=controllerAdminProducts::productsEditForm($_GET['id']);
		
	}
	elseif($path == 'productsEditResult' && isset($_GET['id'])) {		
	$response = controllerAdminProducts::productsEditResult($_GET['id']);	
}

	elseif($path=='productsDel' && isset($_GET['id'])){
		$response=controllerAdminProducts::productsDeleteForm($_GET['id']);
		
	}
	elseif($path == 'productsDelResult' && isset($_GET['id'])) {		
		$response = controllerAdminProducts::productsDeleteResult($_GET['id']);	
	}

	elseif($path=='categoryAdmin'){
		$response=controllerAdminCategory::CategoryList();
		
	}
		elseif($path=='categoryAdd'){
		$response=controllerAdminCategory::categoryAddForm();
		
	}
	elseif($path == 'categoryAddResult') {		
	$response = controllerAdminCategory::categoryAddResult();	
}
		elseif($path=='categoryEdit' && isset($_GET['id'])){
		$response=controllerAdminCategory::categoryEditForm($_GET['id']);
		
	}
	elseif($path == 'categoryEditResult' && isset($_GET['id'])) {		
	$response = controllerAdminCategory::categoryEditResult($_GET['id']);	
}

	elseif($path=='categoryDel' && isset($_GET['id'])){
		$response=controllerAdminCategory::categoryDeleteForm($_GET['id']);
		
	}
	elseif($path == 'categoryDelResult' && isset($_GET['id'])) {		
		$response = controllerAdminCategory::categoryDeleteResult($_GET['id']);	
	}

elseif($path == 'profile') {	
	$response = ControllerAdmin::profileTable();
}

elseif($path == 'profileEdit') {	
	
	$response = ControllerAdmin::profileEditForm();		
	
}
elseif($path == 'profileEditResult') {	
			
	$response = ControllerAdmin::profileEditResult();		
	
}

	else{
		
	$response=controllerAdmin::error404();	
		
	}
	