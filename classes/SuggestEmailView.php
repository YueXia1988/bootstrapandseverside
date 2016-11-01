<?php

use Mailgun\Mailgun;




Class suggestEmailView extends View{


	

	public  function render(){
		extract($this->data);
		$this -> sendEmail("templace/suggesteremail.php");

}
	public  function sendEmail($templaceFile){



			extract($this->data);


			// instantiate the SDK with your API credentials and define your domain. 
				$mg = new Mailgun("key-9e81cce556da1284caa6c15f06616163");
				$domain = "sandboxa3fafe8931f348a983e023e9683a45a7.mailgun.org";


				ob_start();

				include $templaceFile;

				$emailBody = ob_get_clean();


				# Now, compose and send your message.
				$mg->sendMessage($domain, array(
					'from'    => $emailHeader['from'],
				     'to'      => $emailHeader['to'],
					'subject' => $emailHeader['subject'],
					 'text'    => $emailBody



					 )); 
	
	}


}






?>