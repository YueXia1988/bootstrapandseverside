<?php



Class AboutView{



	
	public  function render(){
		$page="about";
		$title = " About";
		include "templace/master.mc.php";
	}


	public  function content(){
		include "templace/about.inc.php";
	}




}

?>