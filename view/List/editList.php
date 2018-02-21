	<main>
		<section id="create">
			<form action="<?= URL ?>list/editSave" method="post">

				<p> list name <input type="text" maxlength="30" value="<?= $List['list_name'] ?>" class="inputtext" name="listName"> </p> 

				<input type="hidden" value="<?= $List['list_id'] ?>" name="listId">

				<input type="submit" value="submit" id="submitedit">
			</form>
			<a href="<?= URL ?>List/index"><button class="createbutton">Back</button></a> 	
		</section>
	</main>
