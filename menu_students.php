<h3>Manajemen Data Student</h3>
<hr>
<table>
	<tr>
		<td>Cari Berdasarkan Nama</td>
		<td><input type="text" id="keyword"></input></td>
		<td><button id="btn_tampilkan">Tampilkan</button></td>
		<td><button id="btn_tambah">Tambah</button></td>
	</tr>
</table>
<hr>
<div id="sub_contents"></div>
<script>
	$('#btn_tampilkan').click(function(){
		keyword = $ ('#keyword').val();
		$.ajax({
			url: "students_controller.php?action=viewList",
			method: 'post',
			data: {keyword: keyword}
		}).done(function(msg){
			$("#sub_contents").html( msg );
		});
	});

	$('#btn_tambah').click(function(){
		
		$.ajax({
			url: "students_controller.php?action=viewForm",
		}).done(function(msg){
			$("#sub_contents").html( msg );
		});
	});
</script>

<script>
	$('#keyword').keydown(function(e){
		keyword = $ ('#keyword').val();
    		if(e.which === 13){
        		$.ajax({
				url: "students_controller.php?action=viewList",
				method: 'post',
				data: {keyword: keyword}
				}).done(function(msg){
					$("#sub_contents").html( msg );
				});
    		}
	});
</script>