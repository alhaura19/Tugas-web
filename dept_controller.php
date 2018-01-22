<!--Nama	: Latifah Alhaura
Nim			: 09021181320022-->

<?php
require_once("koneksi.php");
require_once("dept_view.php");
require_once("dept_model.php");

class Dept_controller{
	var $koneksi;
	var $view;
	var $model;

	public function __construct(){
		$this->koneksi =  new Koneksi();
		$this->view = new Dept_view();
		/*$this->model = new Students_model();*/
	}


	public function getListModel(){
		$listModel = array();

		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM department";
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		$i=0;

		while($data=mysql_fetch_assoc($result)){
			$listModel[$i] = new Dept_model();
			$listModel[$i]->setDept_name($data['dept_name']);
			$listModel[$i]->setBuilding($data['building']);
			$listModel[$i]->setBudget($data['budget']);
			$i++;
		}

		return $listModel; 	
	}

	public function viewComboBox(){
		$listModel = $this->getListModel();
		$currentValue = "";
		$this->view->ComboBox($listModel,$currentValue);
	}

	public function Run(){
		$action = $_GET['action'];
		switch ($action){
			case 'viewComboBox':
				$this->viewComboBox();
			break;
			default:

			break;
		}
	}
}

$dc = new Dept_controller();
$dc->Run();
?>