<main>
	<section id="create">
		<form action="<?= URL ?>Task/createSave/<?= $listID ?>" method="post">
			<p>ToDo</p><input type="text" placeholder="test rawesh's ToDo" name="TaskText" class="inputtext">
			<p>priority</p>
			<select name="taskPriority">
				<option value="normal">Normal</option>
				<option value="immediate">immediate</option>
			</select>
			<input type="hidden" value="<?= $listID ?>" name="list_id">
			<p>End Date</p><input type="date" name="endDate">

			<input type="submit" value="submit" id="submitcreate">
		</form>
		<a href="<?= URL ?>Task/index/<?= $listID ?>"><button class="createbutton">Back</button></a> 	
	</section>

</main>