
<?php

	$page = ! isset(($_GET['page'])) ? "home": $_GET['page'];
	// echo $page;




  // if(! isset($_GET['page'])){
  // 		include "templace/home.inc.php";
  // }else{
  // 		include "templace/about.inc.php";
  // }


	switch ($page) {
		case 'home':
			include "templace/home.inc.php";
			break;
		
		case 'about':
			include "templace/about.inc.php";
			break;
	

		default:
			echo "Error 404 ! Page not found !";
			break;
	}
