<?php
require(ROOT . "Model/ListModel.php");
require(ROOT . "Model/TaskModel.php");

function index() {

	render("List/Index", array("lists" => getAllList()
	));
}

function getTaskByListID($id){

	if (isset($_GET["table"])) {

	if ($_GET["table"] == "ToDo"){
		$table = "todo";
	}
	if($_GET["table"] == "Priority"){
		$table = "priority";
	}
	if($_GET["table"] == "End Date"){
		$table = "end_date";
	}

	}else{
		$table = "end_date";
	}



	if (isset($_GET["sort"])) {

	if ($_GET["sort"] == "ASC") {
			$sort = "ASC";
		}else{
			$sort = "DESC";
		}
	}else{
		$sort = "ASC";
	}

	render("Task/Index", array("list" => getList($id),
							   "tasks" => getAllTasks($id, $sort, $table),
							   "sort" => $sort == "ASC" ? "DESC" : "ASC"
								));
}

function create() {
	render("List/createList");
}

function createSave() {


	if (!createList()) {

		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
}

function deleteList($id) {
	if (!deleteLists($id)) {
		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
}

function editList($id) {
	render("List/editList", array('List' => getList($id)));
}

function editSave() {
	if (!editThisList()) {

		header("Location:" . URL . "error/index");
		exit();
	}

	header("Location:" . URL . "List/index");
}