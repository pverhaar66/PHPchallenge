<?php

function getAllList() {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists";
	$query = $db->prepare($sql);
	$query->execute();
	return $query->fetchAll();

	$db = null;
}

function getList($id) {
	if (!$id) {
		return false;
	}
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM lists
	WHERE list_id =:list_id ";
	$query = $db->prepare($sql);
	$query->execute(array(":list_id" => $id));

	$db = null;
	return $query->fetch();
	return true;
}

function createList() {

	$list_name = isset($_POST["listName"]) ? $_POST['listName'] : null;

	if (strlen($list_name) == 0) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "INSERT INTO lists(list_name)VALUES(:list_name)";
	$query = $db->prepare($sql);
	$query->execute(array(":list_name" => $list_name));

	$db = null;
	return true;
}

function editThisList() {

	$list_name = isset($_POST["listName"]) ? $_POST['listName'] : null;
	$list_id = isset($_POST["listId"]) ? $_POST['listId'] : null;

	if (strlen($list_name) == 0) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "UPDATE lists SET list_name = :list_name
	WHERE list_id = :list_id";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
	    ":list_name" => $list_name,
	    ":list_id" => $list_id
	));

	$db = null;
	return true;
}

function deleteLists($id) {

	if (!$id) {
		return false;
	}
	$db = openDatabaseConnection();
	$sql = "DELETE FROM lists WHERE list_id=:list_id";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(":list_id" => $id));

	$db = null;
	return true;
}
