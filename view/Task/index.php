<main>
	<h1><?= $list['list_name'] ?></h1>
	<table>
		<a href="<?= URL ?>List/index"><button class="addbutton">Back to List</button></a>
			<tr>
				<td class="top"> <a href="<?= URL ?>List/getTaskByListID/<?= $list['list_id'] ?>?sort=<?= $sort ?>&table=ToDo"> ToDo </a></td>
				<td class="top"><a href="<?= URL ?>List/getTaskByListID/<?= $list['list_id'] ?>?sort=<?= $sort ?>&table=Priority"> Priority </a></td>
				<td class="top"><a href="<?= URL ?>List/getTaskByListID/<?= $list['list_id'] ?>?sort=<?= $sort ?>&table=End Date"> End Date </a></td>
				<td class="top">options</td>
			</tr>
			<?php foreach ($tasks as $task) {  ?>
			<tr>
				<td class="bottom"><a href="<?= URL ?>Task/editTask/<?= $task['task_id'];?>/<?= $list['list_id'] ?>">
					<?= $task['todo'];?></a></td>
			 	<td class="bottom"><?= $task['priority'];?></td>
			 	<td class="bottom"><?= $task['end_date'];?></td>
				<td class="bottom">	<a href="<?= URL ?>Task/deleteTask/<?= $task['task_id'];?>/<?= $list['list_id'] ?>"><button class="indexbutton">Delete</button></a></td>
			</tr>
			<?php } ?>
			 <a href='<?= URL ?>Task/createATask/<?= $list['list_id'] ?>'><button class="addbutton">Add Task</button></a>
	</table>	
</main>