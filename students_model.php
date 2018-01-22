<?php
class Students_model{
	var $ID;
	var $name;
	var $dept_name;
	var $tot_cred;

	public function setID($new_ID){
		$this->ID = $new_ID;
	}
	public function setName($new_name){
		$this->name = $new_name;
	}
	public function setDept_name($new_dept_name){
		$this->dept_name = $new_dept_name;
	}
	public function setTot_cred($new_tot_cred){
		$this->tot_cred = $new_tot_cred;
	}

	public function getID(){
		return $this->ID;
	}
	public function getName(){
		return $this->name;
	}
	public function getDept_name(){
		return $this->dept_name;
	}
	public function getTot_cred(){
		return $this->tot_cred;
	}
}
?>