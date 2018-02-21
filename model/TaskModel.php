<?php

function getAllTasks($id, $sort, $table) {
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE list_id = :list_id 
	ORDER BY ". $table ." ". $sort;
	$query = $db->prepare($sql);
	$query->execute(array(":list_id" => $id));

	return $query->fetchAll();

	$db = null;

}

function getTask($taskId,$listId) {
	if (!$taskId && $listId) {
		return false;
	}
	$db = openDatabaseConnection();

	$sql = "SELECT * FROM tasks WHERE task_id =:task_id AND list_id = :list_id";
	$query = $db->prepare($sql);
	$query->execute(array(":task_id"=>$taskId,
							":list_id" => $listId
						  ));

	$db = null;

	return $query->fetch();
	return true;

	
}


function createTask() {

	$list_Id = isset($_POST["list_id"]) ? $_POST['list_id'] : null;
	$taskText = isset($_POST["TaskText"]) ? $_POST['TaskText'] : null;
	$taskPriority = isset($_POST["taskPriority"]) ? $_POST['taskPriority'] : null;
	$taskEndDate = isset($_POST["endDate"]) ? $_POST['endDate'] : null;

	if (strlen($taskText) == 0 || strlen($taskEndDate) == 0) {
		return false;	
	}

	$db = openDatabaseConnection();
	$sql = "INSERT INTO tasks(list_Id, todo, priority, end_date) VALUES(:list_Id, :TaskText, :taskPriority, :taskEndDate)";

	$query = $db -> prepare($sql);
	$query -> execute(array(
		':list_Id' => $list_Id,
		':TaskText' => $taskText,
		':taskPriority' => $taskPriority,
		':taskEndDate' => $taskEndDate
	));

	$db = null;
	return true;


}
function editThisTask(){

	$taskText = isset($_POST["taskText"]) ? $_POST['taskText'] : null;
	$taskPriority = isset($_POST["taskProirity"]) ? $_POST['taskProirity'] : null;
	$taskEndDate = isset($_POST["endDate"])? $_POST['endDate'] : null;	
	$task_id = isset($_POST["task_id"])? $_POST['task_id'] : null;	
	$list_id = isset($_POST["list_id"])? $_POST['list_id'] : null;	

	if (strlen($taskText) == 0 || strlen($taskEndDate) == 0) {
		return false;	
	}

	$db = openDatabaseConnection();

	$sql = "UPDATE tasks SET list_id = :list_id, todo = :taskText, priority = :taskPriority, end_date = :taskEndDate WHERE task_id = :task_id";
	
	$stmt = $db->prepare($sql);
	$stmt->execute(array(
					":taskText" => $taskText,
					":taskPriority" => $taskPriority,		
					":taskEndDate" => $taskEndDate,
					":task_id" => $task_id,
					":list_id" => $list_id
				));
	$db = null;
	return true;
}

function delete($taskId) {

	if (!$taskId) {
		return false;
	}
	$db = openDatabaseConnection();
	

	$sql = "DELETE FROM tasks WHERE task_id = :task_id";
	$stmt = $db->prepare($sql);
	$stmt->execute(array(":task_id"=>$taskId));

	$db = null;

	return true;

}

