<?php



Class MoviesuggestView extends View{



	
	public  function render(){
		$page="moviesuggestsuccess";
		$title = " Movie Suggest";
		include "templace/master.mc.php";
	}


	public  function content(){
		include "templace/moviesuggestsuccess.inc.php";
	}




}

?>