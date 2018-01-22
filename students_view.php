<?php

class Students_view{

	public function Formdata(){
		echo "
				<table>
					<tr>
						<td>ID</td>
						<td>:</td>
						<td><input type'text' id='id'></td>
						</tr>
					<tr>
						<td>Name</td>
						<td>:</td>
						<td><input type'text' id='name'></td>
					</tr>
					<tr>
						<td>Department</td>
						<td>:</td>
						<td><div id='combobox_dept_name'></div></td>
					</tr>
					<tr>
						<td>Total Credit</td>
						<td>:</td>
						<td><input type'text' id='tot_cred' dir='RTL'></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><button id='btn_simpan'>Simpan</button></td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><div id='msg_simpan'></div></td>
					</tr>
					</table>";

		echo "
		<script>
			$('#combobox_dept_name').load('dept_controller.php?action=viewComboBox');

			$('#btn_simpan').click(function(){
				var id = $('#id').val();
				var name = $('#name').val();
				var dept_name = $('#dept_name').val();
				var tot_cred = $('#tot_cred').val();
				
				$.ajax({
					url: 'students_controller.php?action=simpan',
					method: 'post',
					data: {id: id, name: name, dept_name: dept_name, tot_cred: tot_cred}
				}).done(function(msg){
					$( '#msg_simpan' ).html( msg );
				});
			});
		</script>
		";
	}

	public function viewHTMLTableData($listModel,$total,$page){
		$k = $page*10;

		echo "<table border=1 width=500 cellspacing=0>
		<tr>
			<th>No</th>
			<th>ID</th>
			<th>Student's Name</th>
			<th>Department</th>
			<th>Total Credit</th>
			</tr>
		<tr>";
		foreach($listModel as $data){
			$k++;
			echo "<tr>
			<td>".$k."</td>
			<td>".$data->getID()."</td>
			<td>".$data->getName()."</td>
			<td>".$data->getDept_name()."</td>
			<td>".$data->getTot_cred()."</td>
			</tr>";
		}
		
		echo"</table>";

		echo"
			<table>
				<tr>
					<td>
						<button class='btn_pagination' page='".($page-1)."'>Prev</button>
					</td>
					<td>
						<button class='btn_pagination' page='0'>First</button>
					</td>
					<td>
						<button class='btn_pagination' page='".(($total/10)-1)."'>Last</button>
					</td>
					<td>
						<button class='btn_pagination' page='".($page+1)."'>Next</button>
					</td>
				</tr>
				<tr>
					<td colspan=4>Total Data: ".$total."</td>
				</tr>
			</table>";

		echo "
			<script>
			$('.btn_pagination').click(function(){
				var page = $(this).attr('page');
				var keyword = $('#keyword').val();
				$.ajax({
					url: 'students_controller.php?action=viewList',
					method: 'post',
					data: {keyword: keyword, page: page}
				}).done(function(msg){
					$('#sub_contents').html( msg );
				});
			});
			</script>

		";
	}
}
?>