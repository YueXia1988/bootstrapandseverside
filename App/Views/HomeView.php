<?php


namespace App\Views;

Class HomeView extends View{



	
	public  function render(){
		$page="home";
		$title = " Home";
		include "templace/master.mc.php";
	}


	public  function content(){
		extract($this->data);
		
		include "templace/home.inc.php";
	}




}

?>