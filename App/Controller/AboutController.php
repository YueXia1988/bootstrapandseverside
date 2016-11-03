<?php

namespace App\Controller;


use App\Views\AboutView;

Class AboutController

{
	public function show(){

		$view = new AboutView();
		$view->render();

   }

}

?>