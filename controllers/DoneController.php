<?php 
	
include_once ROOT.'/models/Done.php';

class DoneController{
	
	

	public function actionIndex(){

		$UserId = User::checkLogged();

		//условие удаления выполненой задачи
		if(isset($_POST['submit_task_delete'])){
			$id = $_POST['id'];
			Done::delete_done_task($id);
			//echo 'Test'.$id;
			//exit();
		}

		$projects_list = Done::select_projects();
		$tasks_list = Done::select_done_tasks();
		require_once(ROOT. '/views/done/Done.php');
		return true;
	}


}