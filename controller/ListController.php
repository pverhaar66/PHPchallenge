<?php
require(ROOT . "Model/ListModel.php");
require(ROOT . "Model/TaskModel.php");

function index() {

	render("List/Index", array("lists" => getAllList()
	));
}

function getTasksByListID($id){

	if (isset($_GET["collum"])) {

	if ($_GET["collum"] == "ToDo"){
		$collum = "todo";
	}
	if($_GET["collum"] == "Priority"){
		$collum = "priority";
	}
	if($_GET["collum"] == "End Date"){
		$collum = "end_date";
	}

	}else{
		$collum = "end_date";
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
							   "tasks" => getAllTasks($id, $sort, $collum),
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