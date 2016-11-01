
<?php

	use Mailgun\Mailgun;

	$page = ! isset(($_GET['page'])) ? "home": $_GET['page'];
	// echo $page;




  // if(! isset($_GET['page'])){
  // 		include "templace/home.inc.php";
  // }else{
  // 		include "templace/about.inc.php";
  // }


	switch ($page) {
		case 'home':


			if(isset($_SESSION['moviesuggest'])){
				$moviesuggest=$_SESSION['moviesuggest'];
			}else{
				$moviesuggest=[
						'title' =>"",
						'email' =>"",
						'checkbox' =>"",
						'errors' =>[
								'title' =>"",
								'email' =>"",
								'checkbox' =>"",

						]

				];
			}
			
			$view = new HomeView(compact('moviesuggest'));			
			$view->render();
			break;
		
		case 'about':


			
			$view = new AboutView();
			$view->render();

			break;

		case 'moviesuggest':
			$_SESSION['moviesuggest']= null;

			// moving form information into a moviesuggest variable

			$moviesuggest = [
				'errors'=>[]
			];
			$expectedVariables = ['title','email','checkbox'];


			foreach ($expectedVariables as  $variable) {

				// creating entries for error field	
				$moviesuggest['errors'][$variable]="";

				// move all $_POST values into MovieSuggest array
				if(isset($_POST[$variable])){
					$moviesuggest[$variable] = $_POST[$variable];
				}else{
					$moviesuggest[$variable] = "";
				}
			}


			// var_dump($moviesuggest);
			// die();
			// form vaildation

			$errors = false;

			if(strlen($moviesuggest['title']) === 0){
				$moviesuggest['errors']['title']="Enter a title.";
				$errors = true;
			}


			
			if (! filter_var($moviesuggest['email'], FILTER_VALIDATE_EMAIL)) {
				$moviesuggest['errors']['email']="Enter a vaild email.";
			    $errors = true;
			}

			if ($errors === true){
				
				$_SESSION['moviesuggestError'] = "true";
				$_SESSION['moviesuggest'] = $moviesuggest;
				header("location:./");
			}
			
			$view = new suggestEmailView(compact('moviesuggest'));
			$view->render();

				header("location:./?page=moviesuggestsuccess");

			case 'moviesuggestsuccess':
			
			$view = new MoviesuggestView();
			$view->render();
		
			break;

		default:
			echo "Error 404 ! Page not found !";
			break;
	}
