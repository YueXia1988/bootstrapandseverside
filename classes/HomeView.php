<?php



Class HomeView{


	public $data;



	public function __construct($data){
		$this->data =$data;
	}
	
	public  function render(){
		$page="home";
		$title = " Home";
		include "templace/master.mc.php";
	}


	public  function content(){
		extract($this->data);
		var_dump($moviesuggest);
		include "templace/home.inc.php";
	}




}

?>