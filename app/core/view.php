<?php 
	class View {
		function generate($content_view, $template_view, $data = null, $content_view2 = ''){
			include 'app/views/'.$template_view;
		}
	}
 ?>