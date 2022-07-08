<?php require_once('assets/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mining K-NN</title>
	<?php require('config/style.php'); ?>
</head>
<body>
	<div id="wrapper" >
		<h2 class="text-center mt-5 fw-bolder">(Metode K-NN) Studi Kasus Pertumbuhan Cabe</h2>
		<div class="container">
			<div class="row d-flex justify-content-center">
			<!-- kiri -->
			<!-- data awal -->
			<div class="kiri col-6 mb-3">
				<div class="wrap table-responsive shadow rounded p-3 mt-3 mx-4">
					<?php require('komponen/tambah.php'); ?>
					<table class="table table-striped table-bordered responsive-utilities text-center">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col" class="col-4">DiPupuk (X1)</th>
								<th scope="col" class="col-4">Tidak Dipupuk (Y1)</th>
								<th scope="col" class="col-4">Pertumbuhan</th>
								<th scope="col" style="min-width: 100px !important;">Aksi</th>
							</tr>
						</thead>
						<tbody>
							<?php

							$query= "SELECT * FROM tb_data";
							$result=mysqli_query($db, $query);
							$i=1;
						// foreach
							foreach ($result as $data) { ?>
								<tr>
									<td><?php echo $i++?></td>
									<td><?php echo $data['x1']?></td>
									<td><?php echo $data['y1']?></td>
									<td <?php echo ($data['tumbuh']=="Cepat") ? "style='background-color: #ADFFA7; color: #20982C;'" : "style='background-color: #FFAEAE; color: #B53030'" ?>><?php echo $data['tumbuh']?></td>
									<td class="aksi">
										<!-- Button  modal -->
										<a class="text-decoration-none text-success pe-2" data-bs-toggle="modal" data-target="#EditData<?php echo $data['id'] ?>" href="#EditData<?php echo $data['id'] ?>">Edit</a>
										|<a class="text-decoration-none text-danger ps-2" data-bs-toggle="modal" data-target="#HapusData<?php echo $data['id'] ?>" href="#HapusData<?php echo $data['id'] ?>">Hapus</a>
									</td>

									<?php require('komponen/edit.php'); ?>
									<?php require('komponen/hapus.php'); ?>
								</tr>

							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
			<!-- ahir kiri -->
		<div class="kanan col-6 mb-3">	
			<!-- kanan -->
			<div class="kanan col-12 mb-3">
				<div class="wrap table-responsive shadow rounded p-3 mt-3 mx-4">
					<div style="display: flex; justify-content: space-between;">
					
					<h4 class="mb-4 fw-bolder">Hitung Data</h4>
					<div>

					<?php require('komponen/data-test.php'); ?>
					<button type="button" class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#HitungData" style="font-size: 14px;">
				Hitung
				</button>
					<a class="btn btn-info mb-3" style="font-size: 14px;" href="index.php">Reset</a>
					</div>
					</div>
					
					<?php
					if(isset($_GET['opsi'])) : 

						if($_GET['opsi']=="hitung") : ?>
							<p>Nilai x2 = <b><?php echo $_POST['x2']?></b> &nbsp&nbsp&nbsp&nbsp Nilai y2 = <b><?php echo $_POST['y2']?></b>  &nbsp&nbsp&nbsp&nbsp Nilai K = <b><?php echo $_POST['K']?></b> </p>
							<table class="table table-striped table-bordered responsive-utilities text-center">
								<thead>
									<tr>
										<th scope="col">Dipupuk (x1)</th>
										<th scope="col">Tidak Dipupuk (y1)</th>
										<th scope="col">Nilai Jarak</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$query= "SELECT * FROM tb_data";
									$result=mysqli_query($db, $query);
									$i=1;
									// foreach
									foreach ($result as $dataOlah) { ?>
										<tr>
											<td><?php echo $dataOlah['x1']?></td>
											<td><?php echo $dataOlah['y1']?></td>
											<?php 
											$id= $dataOlah['id'];
											$jarak = sqrt(pow($dataOlah['x1']-$_POST['x2'],2)+pow($dataOlah['y1']-$_POST['y2'],2));
											$query = "UPDATE tb_data SET hitung = '$jarak' WHERE id ='$id'";
											$update = mysqli_query($db,$query);
											$i++;
											?>
											<td><?php echo $jarak?></td>
										</tr>

									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
					<!-- ahir kanan -->

					<div class="col-12 mb-4">
						<div class="wrap table-responsive shadow rounded p-3 mt-3 mx-4">
							<h4 class="mb-4 fw-bolder">Hasil Data K= <?php echo $_POST['K']?></h4>

							<table class="table table-striped table-bordered responsive-utilities text-center">
								<thead>
									<tr>
										<th scope="col">Di pupuk X1</th>
										<th scope="col"> Tidak Dipupuk (Y1)</th>
										<th scope="col">Nilai Jarak</th>
										<th scope="col" class="col-4">Pertumbuhan</th>
									</tr>
								</thead>
								<tbody>
									<?php
									// array tumbuh
									$arrayTumbuhCepat = array();
									$arrayTumbuhLambat = array();
									// ahir

									$K = (int)$_POST['K'];
									$query= "SELECT * FROM tb_data ORDER BY hitung ASC LIMIT 0,$K";
									$k= mysqli_query($db, $query);
									// foreach
									foreach ($k as $batasK) { ?>
										<tr>
											<td><?php echo $batasK['x1']?></td>
											<td><?php echo $batasK['y1']?></td>
											<td><?php echo $batasK['hitung']?></td>
											<td <?php echo ($batasK['tumbuh']=="Cepat") ? "style='background-color: #ADFFA7; color: #20982C;'" : "style='background-color: #FFAEAE; color: #B53030'" ?> > <?php echo $batasK['tumbuh']?></td>
										</tr>

									<?php
									// tambah isi array
									if($data['tumbuh']=="Cepat") :
									array_push($arrayTumbuhCepat, $data['tumbuh']);
									endif;
									if($data['tumbuh']=="Lambat") :
									array_push($arrayTumbuhLambat, $data['tumbuh']);
									endif;
									// ahir
								} ?>
								</tbody>
							</table>

							<?php

							// hasil final
							$jumlahCepat = count($arrayTumbuhCepat);
							$jumlahLambat = count($arrayTumbuhLambat);
							$tumbuh_kategori = ($jumlahCepat>$jumlahLambat) ? "Cepat" : "Lambat";
							?>
							<h4 class="fw-bolder" style="margin-top: 60px !important;">Hasil Tumbuh</h4>
							<table class="table table-striped table-bordered responsive-utilities text-center">
								<thead>
									<tr>
										<th scope="col"> Di Pupuk (X2)</th>
										<th scope="col">Tidak (Y2)</th>
										<th scope="col" class="col-4">Pertumbuhan</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td><?php echo $_POST['x2']?></td>
										<td><?php echo $_POST['y2']?></td>
										<td <?php echo ($tumbuh_kategori=="Cepat") ? "style='background-color: #ADFFA7; color: #20982C;'" : "style='background-color: #FFAEAE; color: #B53030'" ?> ><?php echo $tumbuh_kategori?></td>
									</tr>
								</tbody>

							</div>
							<!-- // hasil final -->
						</div>

					<?php endif; 
				endif;

				unset($arrayTumbuhCepat);
				unset($arrayTumbuhLambat); 
				// hapus semua isi array 

				$query= "SELECT * FROM tb_data";
				$reset_hitung=mysqli_query($db, $query);
				$i=1;
				foreach ($reset_hitung as $reset) { 
					$query = "UPDATE tb_data SET hitung = '0' WHERE id = $i";
					$update = mysqli_query($db,$query);
					$i++;
				}
				// foreach
			?>
		</div>
		
		</div>
	</div>
</div>
</body>
</html>
<?php require('config/script.php');

if (isset($_GET['opsi'])) :

$opsi = $_GET['opsi'];

if($opsi=="input"){

	if (isset($_POST['x1'])) { $x1 = $_POST['x1']; }else{ echo "x1 tidak ditemukan"; }
	if (isset($_POST['y1'])) { $y1 = $_POST['y1']; }else{ echo "y1 tidak ditemukan"; }
	if (isset($_POST['tumbuh'])) { $tumbuh = $_POST['tumbuh']; }else{ echo "tumbuh tidak ditemukan"; }

	$query = "INSERT INTO tb_data (x1, y1, tumbuh) VALUES ('$x1', '$y1', '$tumbuh')";
	$insert = mysqli_query($db,$query);

	if ($insert == false) {
		?>
		<script type='text/javascript'>
			alert('Gagal Menambah Data');
			window.location.href="index.php";
		</script>
		<?php
	}
	else{
		?>
		<script type='text/javascript'>
			alert('Sukses Menambah Data');
			window.location.href="index.php";
		</script>
		<?php
	}

}elseif($opsi=="edit"){

	if (isset($_POST['id'])) {$id = $_POST['id']; } else{echo "id tidak ditemukan"; }
	if (isset($_POST['x1'])) { $x1 = $_POST['x1']; }else{ echo "x1 tidak ditemukan"; }
	if (isset($_POST['y1'])) { $y1 = $_POST['y1']; }else{ echo "y1 tidak ditemukan"; }
	if (isset($_POST['tumbuh'])) { $tumbuh = $_POST['tumbuh']; }else{ echo "tumbuh tidak ditemukan"; }
	$query = "UPDATE tb_data SET x1='$x1', y1='$y1',tumbuh ='$tumbuh' WHERE id= '$id'";
	$update = mysqli_query($db,$query);
	
	if ($update == false) {
		?>
		<script type='text/javascript'>
			alert('Gagal Mengubah Data');
			window.location.href="index.php";
		</script>
		<?php
	}
	else{
		?>
		<script type='text/javascript'>
			alert('Sukses Mengubah Data');
			window.location.href="index.php";
		</script>
		<?php
	}	

}elseif($opsi=="delete"){
	if (isset($_GET['id'])) {$id = $_GET['id']; }else{echo "id tidak ditemukan";}

	$query = "DELETE FROM tb_data WHERE id = $id";
	$delete = mysqli_query($db,$query);

	$query = "SELECT id FROM tb_data ORDER BY id DESC";
	$result = mysqli_query($db,$query);
	$id_desc = mysqli_fetch_assoc($result);
	$ai = $id_desc['id']+1;


	$query = "ALTER TABLE tb_data auto_increment=$ai";
	$alter = mysqli_query($db,$query);

	if ($delete == false) {
		?>
		<script type='text/javascript'>
			alert('Gagal Menghapus Data');
			window.location.href="index.php";
		</script>
		<?php
	}
	else{
		?>
		<script type='text/javascript'>
			alert('Sukses Menghapus Data');
			window.location.href="index.php";
		</script>
		<?php
	}
}

endif;
// end controller
?>