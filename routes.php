
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
			include "templace/home.inc.php";
			break;
		
		case 'about':
			include "templace/about.inc.php";
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


			// instantiate the SDK with your API credentials and define your domain. 
				$mg = new Mailgun("key-9e81cce556da1284caa6c15f06616163");
				$domain = "sandboxa3fafe8931f348a983e023e9683a45a7.mailgun.org";

				# Now, compose and send your message.
				$mg->sendMessage($domain, array(
					'from'    => 'schlocktoberfest<mailgun@'.$domain .'>', 
				     'to'      => "<". $moviesuggest['email'].">", 
					'subject' => 'Thanks for suggesting the movie '.$moviesuggest['title'], 
					 'text'    => 'Thanks for suggesting the movie '.$moviesuggest['title'].'. It would turn up in website soon!')); 
				header("location:./?page=moviesuggestsuccess");

			case 'moviesuggestsuccess':
			include "templace/moviesuggestsuccess.inc.php";
		
			break;

		default:
			echo "Error 404 ! Page not found !";
			break;
	}
