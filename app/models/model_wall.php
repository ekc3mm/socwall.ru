<?php 
class Model_wall extends Model
{

	public function get_data()
	{
		
		$user = explode('/', $_SERVER['REQUEST_URI']);
		if ( !empty($user[2]) ){
			$user = $user[2];
			$_SESSION[wall] = $user;
		}else {
			header("Location: /login");
		}
		
		$data[posts] = R::find('posts', 'user_id = ? ORDER BY id DESC', [ $user ]);

		$data[user] = R::findOne('users','id = ?' , [ $user ]);
		$data[header] = "Стена";

		$comments = R::find('comments' , 'autor = ?' , [ $user ]);

		foreach ($comments as $comment) {

			$in[$comment[post]][] = $comment;
		}
		
		$data[comments] = $in;

		$subcomments = R::find('subcomments' , 'autor = ?' , [ $user ]);

		foreach ($subcomments as $comment) {

			$in[$comment[sub]][] = $comment;
		}
		
		$users = R::getAll('SELECT * FROM users');
		foreach ($users as $user) {
			$usernames[$user[id]] = $user;
		}
		$data[users] = $usernames;

		$data[subcomments] = $in;
	



		return $data;
	}

	public function addpost(){
		$post = R::dispense('posts');	
		$post->user_id = $_SESSION[id];
		$post->text = $_POST['text'];
		$post->time = date("Y-m-d H:i:s" , time());
		R::store($post);
		header("Location: /wall/$_SESSION[id]");
	}

	public function addcomment(){
		$comment = R::dispense('comments');
		$comment->autor = $_POST['autor'];
		$comment->commentator = $_POST['commentator'];
		$comment->post = $_POST['post'];
		$comment->text = $_POST['text'];
		$comment->time = date("Y-m-d H:i:s" , time());
		R::store($comment);
		header("Location: /wall/$_POST[autor]");
	}
	public function addsubcomment(){
		$comment = R::dispense('subcomments');
		$comment->autor = $_POST['autor'];
		$comment->commentator = $_POST['commentator'];
		$comment->post = $_POST['post'];
		$comment->text = $_POST['text'];
		$comment->time = date("Y-m-d H:i:s" , time());
		$comment->sub = $_POST['subcomment'];
		R::store($comment);
		header("Location: /wall/$_POST[autor]");
	}	
}
 ?>
