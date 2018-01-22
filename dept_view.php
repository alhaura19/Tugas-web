<?php
class Dept_view{
	public function ComboBox($listModel,$currentValue){
		echo "
			<select id='dept_name'>
			<option value=''>[pilih department]</option>";
		
		foreach ($listModel as $model) {
			if($model->getDept_name()==$currentValue){
				echo "<option selected value='".$model->getDept_name()."'>".$model->getDept_name()."</option>";
			}
			else{
				echo "<option value='".$model->getDept_name()."'>".$model->getDept_name()."</option>";
			}
		}
		echo "
			</select>
		";
	}
	
}
?>