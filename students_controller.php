<!-- Nama:Latifah Alhuara
	 NIM :09021181320022-->
<?php
require_once("koneksi.php");
require_once("students_view.php");
require_once("students_model.php");
//require_once("page.php");

class Students_controller{
	var $koneksi;
	var $view;
	var $model;
	var $keyword;

	public function __construct(){
		$this->koneksi =  new Koneksi();
		$this->view = new Students_view();
		/*$this->model = new Students_model();*/
	}

	public function viewDataRegistrasi(){
		$nama = $_POST['nama'];
		$nim = $_POST['nim'];

		echo $nama . " " . $nim;
	}

	public function getTotalData($keyword){
		$this->koneksi->Sambungkan();
		$query = "SELECT * FROM student 
				   WHERE name like '%".$keyword."%'";
		$result = mysql_query($query);
		$this->koneksi->Putuskan();
		return mysql_num_rows($result);
	}

	public function viewDataList($keyword){
		$total = $this->getTotalData($keyword);
		$last = ($total/10)-1;

		if(!isset($_POST['page'])){
			$page=0;
		}
		else{
			$page = $_POST['page'];
			if($page<0){
				$page=0;
			}
			else if($page>$last){
				$page = $last;
			}
		}
		$limit = 10;
		$start_index = $page*$limit;

		$this->koneksi->Sambungkan();

		$query = "SELECT * FROM student 
				   WHERE name like '%".$keyword."%' 
				   limit " .$start_index. "," .$limit. "";
		$result = mysql_query($query);

		$this->model = array();
		$k=0;

		while($data=mysql_fetch_assoc($result)){
			$this->model[$k] = new Students_model();
			$this->model[$k]->setID($data['ID']);
			$this->model[$k]->setName($data['name']);
			$this->model[$k]->setDept_name($data['dept_name']);
			$this->model[$k]->setTot_cred($data['tot_cred']);
			$k++;
		}

		//$total = $this->getTotalData();
		$this->view->viewHTMLTableData($this->model,$total,$page);
		$this->koneksi->Putuskan();
	}

	public function viewFormData(){
		$this->view->FormData();
	}

	public function simpanData(){
			$id = $_POST['id'];
			$name = $_POST['name'];
			$dept_name = $_POST['dept_name'];
			$tot_cred = $_POST['tot_cred'];

			$this->koneksi->Sambungkan();
			$query = "INSERT INTO student VALUES($id,'$name','$dept_name',$tot_cred)";
			$result = mysql_query($query);

			if($result){
				echo 1;
			}
			else{
				echo 0;
				echo $query;
			}

			$this->koneksi->Putuskan();
		}

	public function Run(){
		//$this->viewDataList($keyword);
		$action = $_GET['action'];
		switch ($action){
			case 'viewList':
				$keyword = $_POST['keyword'];
				$this->viewDataList($keyword);
			break;
			default:
			case 'viewForm':
				$this->viewFormData();
			break;
			case 'simpan':
				$this->simpanData();
			break;
			default:

			break;
		}
		
	}
}
$sc = new Students_controller();
$sc->Run();
?>