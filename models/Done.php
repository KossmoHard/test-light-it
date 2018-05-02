<?php 

class Done{


	public static function delete_done_task($id){
		$db = Db::getConnection();
		$result = " DELETE FROM tasks WHERE task_id = $id ";
		$statement = $db->prepare($result);
		$statement->execute();
		$statement->close();

		//echo $id;
		//exit();
	}

	public static function select_done_tasks(){
		$db = Db::getConnection();

		$result = " SELECT * FROM tasks, Projects WHERE tasks.status = 0 AND tasks.project_id = Projects.id ";
		$result = $db->query($result);

		$i = 0;
		$tasks_list = array();
			while($row = $result->fetch_assoc()){
				$tasks_list[$i]['task_id'] = $row['task_id'];
	        	$tasks_list[$i]['name_task'] = $row['name_task'];
	        	$tasks_list[$i]['priority'] = $row['priority'];
	        	$tasks_list[$i]['date'] = $row['date'];
	        	$tasks_list[$i]['status'] = $row['status'];
	        	$tasks_list[$i]['project'] = $row['Name'];
	        	$tasks_list[$i]['color_project'] = $row['color'];

	        	$i++;
			}

		return $tasks_list;
	}

	public static function select_projects(){
		
		$db = Db::getConnection();
		

		$result = "Select * FROM Projects";

		$result = $db->query($result);

		//var_dump($projects_result);
		$i = 0;
		$projects_list = array();
		while ($row = $result->fetch_assoc()) {

        $projects_list[$i]['id'] = $row['Id'];
        $projects_list[$i]['name'] = $row['Name'];
        $projects_list[$i]['color'] = $row['color'];

        $i++;
    	}
		return $projects_list;
	}
}