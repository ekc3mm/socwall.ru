<?php 

class Controller_login extends Controller
{
	function __construct(){
		$this->model = new Model_login();
		$this->view = new View();
	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('login_view.php','template_view.php',$data);
	}

	function action_exit(){
		session_destroy();
    	header('Location: /wall');

	}
}
 ?>