<?php 
	require_once 'core/model.php';
	require_once 'core/view.php';
	require_once 'core/controller.php';
	require_once 'core/route.php';
	require_once 'include/rb.php';
	R::setup( 'mysql:host=localhost;dbname=socwall', 'root', '' );
	Route::start();
 ?>
