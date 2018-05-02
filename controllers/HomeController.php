<?php 

include_once ROOT. '/models/Home.php';



class HomeController{

	public function actionAjax(){
		//принимаем параметры успешного выполнения
		if(isset($_POST['submit_task_done'])){
			$id = $_POST['id'];
			Home::done_task($id);
		}

		//принимаем параметры для редактирования
		if(isset($_POST['submit-edit-task']) ){
			$id = $_POST['id'];
			$name_task = $_POST['task_name'];
			$date = $_POST['date_time'];
			$priority = $_POST['priority'];
			$project_id = $_POST['project_id'];
			
			Home::update_task($id, $name_task, $priority, $date, $project_id);

		}
		//условие удаления задачи
		if(isset($_POST['submit_task_delete'])){
			$id = $_POST['id'];
			Home::delete_task($id);
		}
		//условие добавления задачи
		if(isset($_POST['add_task'])){
			$task_name = $_POST['task_name'];
			$data_time = $_POST['date_time'];
			$priority = $_POST['priority'];
			$project_id = $_POST['project_id'];
			$status = 1;
			//echo $task_name.'<br>'.$data_time;
			Home::add_task($task_name, $priority, $data_time, $status, $project_id);

		}

		//проверка при редактирование проекта
		if(isset($_POST['submit-edit'])){
			$id = $_POST['id'];
			$name_project = $_POST['name_project'];
			$color = $_POST['color'];
			Home::edit_projects($id, $name_project, $color);
		}

		//проверка при удалении проекта
		if(isset($_POST['submit_delete']) && isset($_POST['id'])){

			$id = $_POST['id'];
			$test = Home::delete_projects($id);
			//print_r($test);
			exit();

		}

		//проверка при добавлении 
		if(isset($_POST['submit']) && isset($_POST['name_project']) && $_POST['color']){
			$name_project = $_POST['name_project'];
			$color = $_POST['color'];

			Home::add_projects($name_project, $color);
		}
	}

	public function actionIndex()
	{
		$UserId = User::checkLogged();

		$this->actionAjax();
		
		//вызов объекта класса select_tasks  
		$tasks_list = Home::select_tasks();
		//var_dump($tasks_list);

		//вызов объекта класса select_projects
		$projects_list = Home::select_projects();
		;

		require_once(ROOT. '/views/home/index.php');
		return true;
	}

	public function actionProject($name){

		$UserId = User::checkLogged();

		$this->actionAjax();

		$array_href = explode('/', $name);
		$project = array_pop($array_href);
		$projects_list = Home::select_projects();
		$tasks_list = Home::select_one_project($project);
		require_once(ROOT. '/views/home/index.php');
		return true;
	}

	public function actionNext_days(){
		$UserId = User::checkLogged();

		$this->actionAjax();
		$projects_list = Home::select_projects();
			$tasks_list = Home::task_next_seven();
		
		require_once(ROOT. '/views/home/index.php');
		return true;
	}


}

?>