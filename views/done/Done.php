<?php include ROOT . '/views/layouts/header.php'; ?>
		<div class="container">
			<div class = "col-sm-3">
				<div class = "menu-left">
					<div class = "today">
						<ul class="nav">
							<li><a href = "/">Today</a></li>
							<li><a href = "/next_days">Next 7 days</a></li>
						</ul>
					</div>
					<h4>Projects</h4>
				    <ul id = "menu-projects" class="nav">
				    <?php foreach ($projects_list as $key => $project): ?>
					    <li>
					    	<span class = "circle" style = "background: #<?php echo $project['color']; ?>"></span>
					    	<a href= "/project/<?php echo $project['name']; ?>" class = "link-project"><?php echo $project['name']; ?></a>
					    </li>
					<?php endforeach; ?>
					</ul>
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
								      		<li><a href = "#" data-task_id = "<?php echo $task['task_id']; ?>" class = "button-done-task-delete" name = "submit_task_delete">Delete</a></li>
								   		</ul>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		<script src = "../template/js/script.js"></script>
		<script src = "../template/js/jscolor.min.js"></script>
	</body>
</html>
<?php include ROOT . '/views/layouts/footer.php'; ?>