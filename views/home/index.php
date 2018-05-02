<?php include ROOT . '/views/layouts/header.php'; ?>
		
		<div class="container">
			<div class = "col-sm-3">
				<div class = "menu-left">
					<div class = "today">
						<ul class="nav">
							<li><a href = "/">Today</a></li>
							<li><a href = "/next_days" class = "next_days">Next 7 days</a></li>
						</ul>
					</div>
					<h4>Projects</h4>
				    <ul id = "menu-projects" class="nav">
				    <?php foreach ($projects_list as $key => $project): ?>
					    <li>
					    	<span class = "circle" style = "background: #<?php echo $project['color']; ?>"></span>
					    	<a href= "/project/<?php echo $project['name']; ?>" class = "link-project"><?php echo $project['name']; ?></a>
						    <div class="btn-group">
								<a href = "" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
							    	<ul class="dropdown-menu">
							      		<li><a href="#" id = "<?php echo $project['id']; ?>" data-name = "<?php echo $project['name']; ?>" data-color = "<?php echo $project['color']; ?>" class = "button-edit">Edit</a></li>
							      		<li><a href = "#" id = "<?php echo $project['id']; ?>" class = "button-delete" name = "submit_delete">Delete</a></li>
							   		</ul>
							</div>
					    </li>
					<?php endforeach; ?>
					</ul>
					<div class = "add_project">
						<a href = "#" id = "add_project">+ Add Project</a>
						<form action = "#" method = "post" class = "add_form">
							<input name="color" type="hidden" id="color_value" value="99cc00">
	        				<button class="button-color jscolor {valueElement: 'color_value'}"></button>
							<input type = "text" name = "name_project" class = "name_value" placeholder="Project name" value = "">
							<input type = "hidden" name = "id" class = "id_project" value = "">
							<input type = "submit" name = "submit" class="btn btn-primary button-form" value = "Add">
							<button type="submit" class="btn btn-link button-cancel">Cancel</button> 

						</form>
					</div>
					<div class = "success-delete-project"></div>

				</div>
			</div>
			<div class = "col-sm-9">
				<div class = "container-right">
					<div id = "list-tasks">	
						<?php foreach ($tasks_list as $key => $task): ?>
						<div class ="task <?php echo $task['priority']; ?>">
							<div class ="col-sm-10">
								<p><i class = "squere"></i><?php echo $task['name_task']; ?></p>
							</div>
							<div class = "col-sm-2">
								<p class = "project-task"><?php echo $task['project']; ?> <i class = "circle circle-right" style = "background: #<?php echo $task['color_project']; ?>"></i></p>
								<div class="btn-group">
									<a href = "" data-toggle="dropdown"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></a>
								    	<ul class="dropdown-menu">
								      		<li><a href="#" data-task_id = "<?php echo $task['task_id']; ?>" data-name_task = "<?php echo $task['name_task']; ?>" data-datetime = "<?php echo $task['date']; ?>" class = "button-task-edit">Edit</a></li>
								      		<li><a href = "#" data-task_id = "<?php echo $task['task_id']; ?>" class = "button-task-delete" name = "submit_task_delete">Delete</a></li>
								      		<li><a href = "#" data-task_id = "<?php echo $task['task_id']; ?>" class = "button-task-done" name = "submit_task_done">Done</a></li>
								   		</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<a href = "#" class = "add_task">+ add task</a>
					<form action="" method="POST" class = "form-add-task">
						<input type = "hidden" name = "id" class = "id_task" value = "">
						<input class="col-sm-9 name_task" type="text" name = "task_name" placeholder="Name task" required>
						<input class="col-sm-3 datetime" type="datetime" id="datetimepicker" name = "date_time" placeholder="Data Time" required>
						<div class = "col-sm-10 no-margin">
							<input type = "submit" name = "add_task" class="btn btn-primary button-add-task" value = "Add">
							<button type="submit" class="btn btn-link button-cancel-task">Cancel</button> 
						</div>
						<div class = "col-sm-2 no-margin">
							<div class = "icon-select-bar">
								<div class="btn-group">
									<a href = "" id = "dropdownProjects" data-toggle="dropdown"><i class="fa fa-plus" aria-hidden="true"></i></a>
									<ul class="dropdown-menu" aria-labelledby="dropdownProjects">
							      		<li>
							      			<?php foreach ($projects_list as $project): ?>
							      			<input type="radio" name="project_id" value="<?php echo $project['id']; ?>"><label> <?php echo $project['name']; ?> </label><br/>
							      			<?php endforeach; ?>
										</li>
								   	</ul>
								</div>
								<div class="btn-group">
									<a href = "" id = "dropdownProjects2" data-toggle="dropdown" ><i class="fa fa-bolt" aria-hidden="true"></i></a>
							    	<ul class="dropdown-menu" aria-labelledby="dropdownProjects2">
							      		<li>
							      			<input type="radio" name="priority" value="hight" checked><label> Hight </label><i class = "squere hight right-position"></i><br/>
											<input type="radio" name="priority" value="middle"><label> Middle </label><i class = "squere middle right-position"></i><br/>
											<input type="radio" name="priority" value="low"><label> Low </label><i class = "squere low right-position"></i><br/>
										</li>
							   		</ul>
							   	</div>
							</div>
						</div>
					</form>
					<?php if (isset($result_error) && is_array($result_error)): ?>
                    <ul>
                        <?php foreach ($result_error as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
				</div>
			</div>
		</div>
<?php include ROOT . '/views/layouts/footer.php'; ?>