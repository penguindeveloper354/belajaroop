<?php 
	require('function/Crud.php');
	$obj = new Crud();
	$id  = $_GET['user_id'];
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery-3.1.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<meta charset="UTF-8">
		<title>Form Edit Data</title>
	</head>
	<body>
		<div class="row">
			<div class="container">
				<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3">
					<form method="POST" role="form">
						<div class="form-group">
							<?php foreach($obj->selectWhere($id) as $row){ ?>
							<label for="">Nama</label>
							<input type="text" class="form-control" name="nama" placeholder="Input field" value="<?php echo $row['nama']; ?>">
						</div>
						<div class="form-group">
							<label for="">Alamat</label>
							<textarea name="alamat" id="inputAlamat" class="form-control" rows="3" required="required"><?php echo $row['alamat']; ?></textarea>
						</div>
						<?php } ?>
						<button type="submit" class="btn btn-primary" name="edit">Edit</button>
					</form>
				</div>
			</div>
		</div>
		<?php 
			if(isset($_POST['edit'])){
				$nama   = $_POST['nama'];
				$alamat = $_POST['alamat'];
				$act = $obj->update($nama,$alamat,$id);
				if ($act === TRUE) {
					echo "data berhasil di edit";
				}
			}
		?>
	</body>
</html>