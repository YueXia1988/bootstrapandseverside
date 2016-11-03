<?php

namespace App\Controller;


use App\Views\SuggestEmailView;
use App\Views\MovieSuggestView;

Class MovieSuggestController

{
	protected $moviesuggest = [
				'errors'=>[]
			];
	public function __construct(){
		$this->moviesuggest =[
		'errors'=>[]
		];
	}
	

	public function resetSessionData(){


		$_SESSION['moviesuggest']= null;
	}
	public function getFormData(){

			// moving form information into a moviesuggest variable

			
			$expectedVariables = ['title','email','checkbox'];


			foreach ($expectedVariables as  $variable) {

				// creating entries for error field	
				$this->moviesuggest['errors'][$variable]="";

				// move all $_POST values into MovieSuggest array
				if(isset($_POST[$variable])){
					$this->moviesuggest[$variable] = $_POST[$variable];
				}else{
					$this->moviesuggest[$variable] = "";
				}
			}


			// var_dump($moviesuggest);
			// die();
	}


	public function isFormVaild(){
		// form vaildation

			$errors = false;

			if(strlen($this->moviesuggest['title']) === 0){
				$this->moviesuggest['errors']['title']="Enter a title.";
				$errors = true;
			}


			
			if (! filter_var($this->moviesuggest['email'], FILTER_VALIDATE_EMAIL)) {
				$this->moviesuggest['errors']['email']="Enter a vaild email.";
			    $errors = true;
			}

			return $errors;
	}
	public function show(){

			$this ->resetSessionData();

			$this -> getFormData();

			

			if ($this->isFormVaild()=== true){
				
				$_SESSION['moviesuggest'] = $this->moviesuggest;
				header("location:./");
				return;
			}
			
			// redirect back to success page
			header("location:./?page=moviesuggestsuccess");


			//send email using Maiogun API
			$view = new suggestEmailView(compact('moviesuggest'));
			$view->render();

			
   }
  	 public function generateSuccessPage(){
   		$view = new MovieSuggestView();
   		$view -> render();
   }
}


?>