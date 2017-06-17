<?php 

class Controller_Wall extends Controller
{

	function __construct(){
		$this->model = new Model_wall();
		$this->view = new View();

	}
	function action_index()
	{	
		$data = $this->model->get_data();
		$this->view->generate('wall_view.php','template_view.php',$data);
	}

	function action_noauth()
	{	
		$login  = new Model_login();
		$login_data = $login->get_data();
		$data = $this->model->get_data();
		$data[link] = $login_data[link];
		$this->view->generate('login_view.php','template_view.php',$data,'wall_view.php');
	}

	function action_addpost()
	{	
		$data = $this->model->addpost();
		$this->view->generate('wall_view.php','template_view.php',$data);
	}

		function action_addcomment()
	{	
		$data = $this->model->addcomment();
		$this->view->generate('wall_view.php','template_view.php',$data);
	}

			function action_addsubcomment()
	{	
		$data = $this->model->addsubcomment();
		$this->view->generate('wall_view.php','template_view.php',$data);
	}

}
 ?>