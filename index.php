<?php
include "database.php";
$que = mysqli_query($db_conn, "SELECT * FROM un_konfigurasi");
// $hsl = mysqli_fetch_array($que);
echo var_dump($que);
$timestamp = strtotime($hsl['tgl_pengumuman']);
//echo $timestamp;

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="aplikasi SMAN 3 Bojonegoro untuk menampilkan pengumuman kelulusan secara online">
	<meta name="author" content="afrilianton@gmail.com">
	<title>Pengumuman Kelulusan</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/jasny-bootstrap.min.css" rel="stylesheet">
	<link href="css/kelulusan.css" rel="stylesheet">
</head>

<body background="bg1.png">
	<nav class="navbar navbar-inverse navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>




				<a align="center" class="navbar-brand" href="./">SELAMAT DATANG DI INFO KELULUSAN KELAS XII T.P. 2021/2022 <p> <?= $hsl['sekolah'] ?>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="./">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
				</ul>

			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>

	<!-- /.Teks berjalan -->
	<marquee bgcolor="#87CEEB" height="25">
		<h5 style="color:#9400D3 ;"><b>Pemerintah Provinsi Jawa Timur Dinas Pendidikan Sekolah Menengah Atas Negeri 3 Bojonegoro Jl. Monginsidi No. 09 Telp. ( 0353 ) 882180, Fax. ( 0353) 880075 E-mail: sman3bojonegoro@yahoo.co.id Web: www.sman3bojonegoro.sch.id &nbsp &nbsp <span style="color:#B22222;">"Tidak diizinkan ke Sekolah atau konvoi kelulusan SALAM SEHAT"</span></b></h5>
	</marquee>
	<style>
		h5 {
			margin-top: 5px;
		}

		marquee {
			margin-top: -10px;
		}
	</style>
	<!-- /.========================================================== -->

	<p align="center">
		<img src="logo.png" class="rounded float-right" width="130px">
	</p>




	<div class="container">
		<h3 align="center" style="color:#006400;"><b>Pengumuman Kelulusan Kelas XII SMAN 3 Bojonegoro Tahun <?= $hsl['tahun'] ?></b></h3>
		<!-- countdown -->

		<div id="clock" class="lead"></div>

		<div id="xpengumuman">
			<?php
			if (isset($_REQUEST['submit'])) {
				//tampilkan hasil queri jika ada
				$no_ujian = $_REQUEST['nomor'];

				$hasil = mysqli_query($db_conn, "SELECT * FROM un_siswa WHERE no_ujian='$no_ujian'");
				if (mysqli_num_rows($hasil) > 0) {
					$data = mysqli_fetch_array($hasil);

			?>
					<table class="table table-bordered">
						<tr>
							<td>Nomor NISN</td>
							<td><?php echo $data['no_ujian']; ?></td>
						</tr>
						<tr>
							<td>Nama Siswa</td>
							<td><?php echo $data['nama']; ?></td>
						</tr>
						<tr>
							<td>Jurusan</td>
							<td><?php echo $data['komli']; ?></td>
						</tr>

					</table>

					<?php
					if ($data['status'] == 1) {
						echo '<div class="alert alert-success" role="alert"><strong>SELAMAT !</strong> Anda dinyatakan LULUS dari SMAN 3 Bojonegoro, Terima Kasih!. 
				<p>Tidak diizinkan ke Sekolah atau konvoi kelulusan.</p>
				<p>Selalu patuhi protokol kesehatan dalam keadaan apapun "Sehat Selalu"</p>
				
				</div>';
					} else {
						echo '<div class="alert alert-danger" role="alert"><strong>MAAF !</strong> Anda dinyatakan TIDAK LULUS dari SMAN 3 Bojonegoro.</div>';
					}
					?>



				<?php
				} else {
					echo 'Nomor NISN yang anda inputkan tidak ditemukan! periksa kembali nomor NISN anda.';
					//tampilkan pop-up dan kembali tampilkan form
				}
			} else {
				//tampilkan form input nomor ujian
				?>
				<p style="color:#FF8C00;"><b>Masukkan nomor NISN siswa pada kolom yang disediakan.</b></p>
				<form method="post">
					<div class="input-group">
						<input type="text" name="nomor" class="form-control" data-mask="9999999999" placeholder="Nomor NISN" required>
						<span class="input-group-btn">
							<button class="btn btn-primary" type="submit" name="submit">Cek disini!</button>
						</span>
					</div>
				</form>
				<p style="color:#FF0000;"><b>Mohon diperhatikan!</b></p>
				<p>Tidak diizinkan untuk ke Sekolahan dan Konfoi dijalan, cukup dipantau dari Rumah</p>
				<p>Selalu patuhi protokol kesehatan dalam keadaan apapun <b>"Salam Sehat"</b></p>
				<p>Atas perhatian dan kerja samanya kami ucapkan terima kasih.</p>
			<?php
			}
			?>
		</div>
	</div><!-- /.container -->

	<footer class="footer">
		<div class="container">
			<p align="center" style="color:#f5f5f5;" class="text-muted">&copy; <?= $hsl['tahun'] ?> &middot; Tim IT <?= $hsl['sekolah'] ?></p>
		</div>
	</footer>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery.min.js"></script>
	<script src="js/jquery.countdown.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jasny-bootstrap.min.js"></script>
	<script type="text/javascript">
		var skrg = Date.now();
		$('#clock').countdown("<?= $hsl['tgl_pengumuman'] ?>", {
				elapse: true
			})
			.on('update.countdown', function(event) {
				var $this = $(this);
				if (event.elapsed) {
					$("#xpengumuman").show();
					$("#clock").hide();
				} else {
					$this.html(event.strftime('Pengumuman dapat dilihat: <span>%H Jam %M Menit %S Detik</span> lagi'));
					$("#xpengumuman").hide();
				}
			});
	</script>

	<center>
		<p style="color:#800080;"> <b> Cara pengerjaan ujian silahkan buka : </b>
			<a target="_blank" href="https://youtu.be/a49xT9E2SSk"><b>TUTORIAL UJIAN</b></a>
		</p>
	</center>
</body>

</html>