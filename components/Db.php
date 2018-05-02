<?php



class Db

{



		public static function getConnection()

		{

			$paramsPath = ROOT . '/config/db_params.php';

			$params = include($paramsPath);

			/* Подключение к серверу MySQL */ 
			$db = new mysqli( 
			            $params['host'],  /* Хост, к которому мы подключаемся */ 
			            $params['user'],       /* Имя пользователя */ 
			            $params['password'],   /* Используемый пароль */ 
			            $params['dbname'] );     /* База данных для запросов по умолчанию */ 

			return $db;

		}

}