<?php
class Dept_model{
	var $dept_name;
	var $building;
	var $budget;

	public function setDept_name($new_dept_name){
		$this->dept_name = $new_dept_name;
	}
	public function setBuilding($new_building){
		$this->building = $new_building;
	}
	public function setBudget($new_budget){
		$this->budget = $new_budget;
	}

	public function getDept_name(){
		return $this->dept_name;
	}
	public function getBuilding(){
		return $this->building;
	}
	public function getBudget(){
		return $this->budget;
	}
}
?>