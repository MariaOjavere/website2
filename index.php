<?php

session_start();
include 'config.php';
require 'model/Category.php';
require 'model/Products.php';
require 'model/Reviews.php';
require 'model/Register.php';

include_once 'view/products.php';
include_once 'view/reviews.php';



include_once 'controller/Controller.php';
include_once 'route/routing.php';

echo $response;
?>