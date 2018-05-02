<?php



class Router

{



	private $routes;



	public function __construct()

	{

		$routesPath = ROOT.'/config/routes.php';

		$this->routes = include($routesPath);

	}



// Return type



	private function getURI()

	{

		if (!empty($_SERVER['REQUEST_URI'])) {

		return trim($_SERVER['REQUEST_URI'], '/');

		}
		if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
		 {
		    // Если запрос послан с xmlhttprequest, то есть это ajax запрос
		    echo 'Определен ajax запрос!';
		    return trim($_SERVER['REQUEST_URI'], '/');
		}

	}




	public function run()

	{
		//Получить строку запроса
		$uri = $this->getURI();
		//echo $uri;

		//Проверить наличие такого запроса в routes.php

		foreach ($this->routes as $uriPattern => $path) {

			//Сравниваем $uriPattern и $uri

			if(preg_match("~$uriPattern~", $uri)) {



/*				echo "<br>Где ищем (запрос, который набрал пользователь): ".$uri;

				echo "<br>Что ищем (совпадение из правила): ".$uriPattern;

				echo "<br>Кто обрабатывает: ".$path; */



				// Получаем внутренний путь из внешнего согласно правилу.



				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);



/*			echo '<br>Нужно сформулировать: '.$internalRoute.'<br>'; */



				$segments = explode('/', $internalRoute);
				//var_dump($segments);



				$controllerName = array_shift($segments).'Controller';

				$controllerName = ucfirst($controllerName);





				$actionName = 'action'.ucfirst(array_shift($segments));

				//echo $actionName;



				$parameters = $segments;





				$controllerFile = ROOT . '/controllers/' .$controllerName. '.php';

				if (file_exists($controllerFile)) {

					include_once($controllerFile);

				}



				$controllerObject = new $controllerName;

				/*$result = $controllerObject->$actionName($parameters); - OLD VERSION */

				/*$result = call_user_func(array($controllerObject, $actionName), $parameters);*/

				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);

				
				if ($result != null) {

					break;

				}

			}



		}

	}


}