<?php 
	require('function/Crud.php');
	$obj = new Crud();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Form Input Data</title>
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<script src="assets/js/jquery-3.1.1.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="row">
			<div class="container">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-md-offset-2">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title"><a data-toggle="modal" href='#input-data' class="btn btn-success"> + tambah data</a></h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>No</th>
											<th>Nama</th>
											<th>Alamat</th>
											<th colspan="2">Act</th>
										</tr>
									</thead>
									<tbody>
									<?php 
										$no = 1;
										foreach($obj->selectAll() as $row){
									?>
										<tr>
											<td><?php echo $no;$no++; ?></td>
											<td><?php echo $row['nama']; ?></td>
											<td><?php echo $row['alamat']; ?></td>
											<td class="col-md-1">
												<a href="edit.php?user_id=<?php echo $row['id']; ?>" class="btn btn-warning" style="border-radius: 40px">
													<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
												</a>
											</td>
											<td class="col-md-1">
												<a href="function/Controller.php?user_id=<?php echo $row['id']; ?>" class="btn btn-danger" style="border-radius: 40px">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</a>
											</td>
										</tr>
									<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- modal -->
		<div class="modal fade" id="input-data">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">input data</h4>
					</div>
					<div class="modal-body">
						<form method="POST" role="form">
							<div class="form-group">
								<label for="">Nama</label>
								<input type="text" class="form-control" name="nama">
							</div>
							<div class="form-group">
								<label for="">Alamat</label>
								<textarea name="alamat" id="inputAlamat" class="form-control" rows="3" required="required"></textarea>
							</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
						<button type="submit" class="btn btn-primary" name="kirim">Insert Data</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- end modal -->
		<?php if(isset($_POST['kirim'])){
				$nama 	= $_POST['nama'];
				$alamat = $_POST['alamat'];
				$insert = $obj->insert($nama,$alamat);
				if($insert === TRUE){
					echo "
					<script>
						alert('data berhasil di input')
						window.location.href='http://localhost/oop';
					</script>";
				}
			} 
		?>
	</body>
</html>