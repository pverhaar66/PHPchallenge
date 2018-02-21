<?php
require(ROOT . "model/TaskModel.php");

function index($listID)
{
	render("Task/Index", 
		array("tasks" => getAllTasks($listID)));
}

function createATask($listID)
{
	render("Task/CreateTask", 
		array("listID" => $listID));
	
}

function createSave($listID)
{
 	if (!createTask()) {

	 		header("Location:" . URL . "error/index");
	 		exit();
 	}

 		header("Location:" . URL . "List/getTaskByListID/$listID");
}


function deleteTask($taskId, $listId)
{
	if (!delete($taskId)) {
		 		header("Location:" . URL . "error/index");
	 		exit();
 	}

 		header("Location:" . URL . "List/getTaskByListID/$listId");
	
}

function editTask($taskId, $listId)
{
	render("Task/editTask", array('task' => getTask($taskId, $listId)));
}

function editSave($listId) {

	 	if (!editThisTask()) {

	 		header("Location:" . URL . "error/index");
	 		exit();
 	}

 		header("Location:" . URL . "List/getTaskByListID/$listId");
}