<main>
	<section id="create">
		<form action="<?= URL ?>Task/editSave/<?= $task['list_id'] ?>" method="post">
			<p>ToDo</p><input type="text" value="<?= $task['todo'] ?>" name="taskText" class="inputtext">
			<p>priority</p>
			<select name="taskProirity">
				<option value='Normal'>Normal</option>
				<option value='immediate'>immediate</option>
			</select>
			<p>End Date</p><input type="date" value="<?= $task['end_date'] ?>" name="endDate" class="inputtext">
			<input type="hidden" value="<?= $task['task_id'] ?>" name="task_id">
			<input type="hidden" value="<?= $task['list_id'] ?>" name="list_id">
			<input type="submit" value="submit" id="submitcreate">
		</form>
		<a href="<?= URL ?>Task/index/<?= $task['list_id'] ?>"><button class="createbutton">Back</button></a> 	
	</section>
</main>