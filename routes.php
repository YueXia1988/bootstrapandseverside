
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
		case 'moviesuggest':
			

			// moving form information into a moviesuggest variable

			$moviesuggest = [];
			$expectedVariables = ['title','email','checkbox'];


			foreach ($expectedVariables as  $variable) {
				if(isset($_POST[$variable])){
					$moviesuggest[$variable] = $_POST[$variable];
				}else{
					$moviesuggest[$variable] = "";
				}
			}

			// form vaildation

			$errors = false;

			if(strlen($moviesuggest['title']) === 0){
				$errors = true;
			}


			
			if (! filter_var($moviesuggest['email'], FILTER_VALIDATE_EMAIL)) {
			    $errors = true;
			}

			if ($errors === true){
				echo "errors has to be fixed!";
				$_SESSION['moviesuggestError'] = "Errors";
			} else {
				echo "Successfully Suggested a movie!";
				$_SESSION['moviesuggestError'] = "No Errors";
			}
			header("location:./");
			break;

		default:
			echo "Error 404 ! Page not found !";
			break;
	}
