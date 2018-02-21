<main>
	<table>

		<tr>
			<td class="top"> List Name</a></td>
			<td class="top" colspan="2">options</td>
		</tr>

		<?php foreach ($lists as $list) { ?>
			<tr>
				<td class="bottom"><a href="<?= URL ?>list/getTaskByListID/<?= $list['list_id']; ?>"><?= $list['list_name']; ?></a></td>
			 
				<td class="bottom"><a href="<?= URL ?>List/editList/<?= $list['list_id']; ?>"><button class="indexbutton">Edit</button></a> </td>
				<td class="bottom"><a href="<?= URL ?>List/deleteList/<?= $list['list_id']; ?>"><button class="indexbutton">Delete</button></a></td>

			</tr>
		<?php } ?>
		<a href='<?= URL ?>List/create'><button class="addbutton">Add list</button></a>

	</table>		
</main>

