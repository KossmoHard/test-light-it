<?php 

class Home{

	

	//метод для выполненой задачи
	public static function done_task($id){
		$db = Db::getConnection();
		$status = 0;
		$result = " UPDATE tasks SET status = ? WHERE task_id = ? ";
		$statement = $db->prepare($result);
		$statement->bind_param('ii', $status, $id);
		$statement->execute();
		$statement->close();
		echo $id;
		exit();

	}
	//метод редактирование задачи
	public static function update_task($id, $name_task, $priority, $date, $project_id){
		$db = Db::getConnection();
		$date2 = date("Y-m-d",strtotime($date));
		$result = " UPDATE tasks SET name_task = ?, priority = ?, date = ?, project_id = ?, date2 = ? WHERE task_id = ? ";
		$statement = $db->prepare($result);
		$statement->bind_param('sssisi', $name_task, $priority, $date, $project_id, $date2, $id);
		$statement->execute();
		$statement->close();
	}
	//метод удаления задачи
	public static function delete_task($id){
		$db = Db::getConnection();
		$result = " DELETE FROM tasks WHERE task_id = $id ";
		$statement = $db->prepare($result);
		$statement->execute();
		$statement->close();

		echo $id;
		exit();
	}
	//метод добавления задачи
	public static function add_task($name_task, $priority, $date, $status, $project_id){
		$db = Db::getConnection();
		//echo $name_task.$priority. $date.$status.$project;
		$date2 = date("Y-m-d",strtotime($date));


		$result = " INSERT INTO tasks (name_task, priority, date, status, date2, project_id) VALUES(?, ?, ?, ?, ?, ?) ";
		$statement = $db->prepare($result);
		$statement->bind_param('sssisi', $name_task, $priority, $date, $status, $date2, $project_id);
		$statement->execute();
		$statement->close();
	}
	public static function sorted_date_task(){
		$db = Db::getConnection();
		$date_today = date("Y-m-d h:i:s");
		$not_done = 'not_done';
		$result = " UPDATE tasks SET priority = ? WHERE date < ? ";
		$statement = $db->prepare($result);
		$statement->bind_param('ss', $not_done, $date_today);
		$statement->execute();
		$statement->close();
	}

	//метод выборки данных для вывода "задач"
	public static function select_tasks(){
		$db = Db::getConnection();
		
		self::sorted_date_task();
		$date_today = date("Y-m-d");
		$result = " SELECT * FROM tasks, Projects WHERE tasks.date2 = '$date_today' AND tasks.project_id = Projects.id AND tasks.status = 1 ORDER BY FIELD(tasks.priority, 'not_done', 'hight', 'middle', 'low')";

		$result = $db->query($result);
		$i = 0;
		$tasks_list = array();
		
		while($row = $result->fetch_assoc()){
			$tasks_list[$i]['task_id'] = $row['task_id'];
        	$tasks_list[$i]['name_task'] = $row['name_task'];
        	//if($row['date']<$date_today){
        	//	$tasks_list[$i]['priority'] = 'not_done';
        	//}else{
        		$tasks_list[$i]['priority'] = $row['priority'];
        	//}
        	$tasks_list[$i]['date'] = $row['date'];
        	$tasks_list[$i]['status'] = $row['status'];
        	$tasks_list[$i]['project'] = $row['Name'];
        	$tasks_list[$i]['color_project'] = $row['color'];

        	$i++;
		}
		return $tasks_list;
	} 
	//метод редактирования проекта
	public static function edit_projects($id, $name, $color){
		$id = $id;
		$name_project = $name;
		$color = $color;
		$db = Db::getConnection();

		$result = " UPDATE Projects SET name = ?, color = ? WHERE id = ? ";
		$statement = $db->prepare($result);
		$statement->bind_param('ssd', $name_project, $color, $id);
		$statement->execute();
		$statement->close();
	}

	//метод для удаления проекта
	public static function delete_projects($id){
		$id = $_POST['id'];
		//echo $id;
		$status_null = 0;
		$db = Db::getConnection();

		$result = " SELECT SUM(status) FROM tasks WHERE project_id = '$id' ";
		$result = $db->query($result);
		$row = $result->fetch_row();
		//echo 'Test'.$row[0];
		if($row[0] == 0){

			$result = " DELETE Projects, tasks FROM Projects, tasks WHERE tasks.project_id = ? AND Projects.id = ? AND tasks.status = ? ";
			$statement = $db->prepare($result);
			$statement->bind_param('iii', $id, $id, $status_null);
			$statement->execute();
			$statement->close();

		}if($row[0] == ''){
			$result = " DELETE Projects FROM Projects WHERE id = ? ";
			$statement = $db->prepare($result);
			$statement->bind_param('i', $id);
			$statement->execute();
			$statement->close();
		}else{
			echo 'Завершите или удалите все задачи даного проекта!';
		}
		
	}

	//метод для добавления проекта
	public static function add_projects($name, $color){
		$name_project = $name;
		$color = $color;

		$db = Db::getConnection();

		$result = " INSERT INTO Projects (name, color) VALUES(?,?) ";
		$statement = $db->prepare($result);
		$statement->bind_param('ss', $name_project, $color);
		$statement->execute();
		$statement->close();

	}

	//метод выборки данных проекта
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
	//метод вывода задач по одному проекту
	public static function select_one_project($project){
		self::sorted_date_task();
		$db = Db::getConnection();
		//$date_today = date("Y-m-d h:i:s");
		$result = " SELECT * FROM tasks, Projects WHERE Projects.Name = '$project' AND tasks.project_id = Projects.id AND tasks.status = 1 ORDER BY FIELD(tasks.priority, 'not_done', 'hight', 'middle', 'low')";
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
		//var_dump($tasks_list);
		//exit();
	}

	public static function task_next_seven(){
		self::sorted_date_task();
		$db = Db::getConnection();
		//$date = date('Y-m-d H:i:s',time()+(7*86400)); // 7 days ago
		$result = "SELECT * FROM tasks, Projects WHERE tasks.project_id = Projects.id AND tasks.status = 1 
		AND Date BETWEEN NOW() AND (NOW() + INTERVAL 7 DAY) ORDER BY FIELD(tasks.priority, 'not_done', 'hight', 'middle', 'low') ";
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
		//var_dump($tasks_list);
	}

	
}

?>