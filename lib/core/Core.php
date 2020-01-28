<?php
class Core {

	public function run() {
		 //$url = explode('index.php', $_SERVER['PHP_SELF']);
        //$url = explode('/',$_GET['q']);
        //print_r($_SERVER['PHP_SELF'])."<br>"; 
        //echo "<br>"; 
        //$url = end($url);
        //echo "url ".$url."</br>"; 
        $params = array();
        $url = $_GET['q']; 
		if(!empty($url) && $url != '/') {
			$url = explode('/', $url);
			//array_shift($url);

			$currentController = $url[0].'Controller';
			array_shift($url);

			if(isset($url[0])) {
				$currentAction = $url[0];
				array_shift($url);
			} else {
				$currentAction = 'index';
			}

			if(count($url) > 0) {
				$params = $url;
			}

		} else {
			$currentController = 'todoController';
			$currentAction = 'index';
		}

        $c = new $currentController();
		call_user_func_array(array($c, $currentAction), $params);

	}

}