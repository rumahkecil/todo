<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type='text/css' href="<?php echo base_url();?>css/ass.css" rel='Stylesheet' />
<title>TODO List</title>

</head>
	<body>
		<div class="container_12">
			<div class="grid_12">
				<h1 class="logo">BUAT!</h1>
			</div>
	
		<ul class="todo_list grid_6">
		<?php foreach($records as $row) : ?>
			<li>
				<!-- <?php echo $row->status; ?> <?php echo $row->id; ?> <?php echo $row->post_date; ?>-->
				<h2 class="<?php 	if($row->status == 1) echo 'finish' ?>"><?php if($row->status == 0) 
										echo anchor("Todo_controller/update_status_finish/$row->id", $row->title); 
					  				else
					  					echo anchor("Todo_controller/update_status_notfinish/$row->id", $row->title); ?>
				</h2>
				
				<p><?php echo $row->desc; ?> <?php echo anchor("Todo_controller/delete/$row->id", 'Delete?', array('class'=>'delete'));  ?></p>
				
			</li>
		<?php endforeach; ?>
		</ul>		
		
		<div class="form_list grid_6">
			<?php echo form_open('todo_controller/insert_list'); ?>
			<p>
				<label for "title">Title:</label>
				<input type="text" name="title" id="title" />
			</p>
			<p>
				<label for "desc">Desc:</label>
				<input type="text" name="desc" id="desc" />
			</p>
			<p>
				<input class="submit" type="submit" value="Add list!" />
			</p>							
			<?php echo form_close(); ?>	
		</div>

		<div class="footer clear grid_12">
			The damn todo list
		</div>

	</div>	
	</body>
</html>