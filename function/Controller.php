<?php
	require_once('Crud.php');
	$obj = new Crud;
if ($_GET['user_id']) {
	$act = $obj->delete($_GET['user_id']);
	if($act === TRUE){
		echo "
			<script>
				alert('data berhasil di input')
				window.location.href='http://localhost/oop';
			</script>";
	}
}