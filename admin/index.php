<?php
session_start();
require_once('../inc/Database.php');

include_once("modelAdmin/modelAdmin.php");
include_once("modelAdmin/modelAdminProducts.php");
include_once("modelAdmin/modelAdminCategory.php");

include_once("controllerAdmin/controllerAdmin.php");
include_once("controllerAdmin/controllerAdminProducts.php");
include_once("controllerAdmin/controllerAdminCategory.php");

include_once("routeAdmin/routingAdmin.php");
?>