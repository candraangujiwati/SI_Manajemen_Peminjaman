<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
    <title>SISTEM PEMINJAMAN</title>
	<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

	<?php $this->load->view("loaderawal.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->

    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/elusive-webfont.css">
    <link href="css/animate.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    
    <script src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/modernizr.custom.js"></script>
  </head>

  <body data-spy="scroll" data-offset="0" data-target="#navbar-main">
  
  
  	<div id="navbar-main">
      <!-- Fixed navbar -->
	    <div class="navbar navbar-default navbar-fixed-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	          	<i class="el-icon-lines"></i>
	          </button>
	          <a class="navbar-brand hidden-xs hidden-sm" href="#home"><h1></h1></a>
	        </div>
	        <div class="navbar-collapse collapse">
	          	<ul class="nav navbar-nav">
		            <li><a href="#home" class="smoothScroll">Home</a></li>
					<li> <a href="#about" class="smoothScroll">Tentang</a></li>
					<li> <a href="#contact" class="smoothScroll">Kontak</a></li>
				</ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </div>
    </div>

  
  
		<!-- ==== HEADERWRAP ==== -->
	    <div id="headerwrap" id="home" name="home">
			<header class="clearfix">
	  		 		<h1 class="animated bounceIn">Sistem Peminjaman</h1>
	  		 		<p class="animated slideInLeft">Membantu Dalam Transaksi Peminjaman</p>
	  		 		<p class="animated slideInRight">Barang Dan Ruang</p>
	  		 		<a href="welcome" class="btn homebtn">Ruang <i class="el-icon-chevron homeicon"></i></a>
                       <a href="welcome_barang" class="btn homebtn">Barang <i class="el-icon-chevron homeicon"></i></a>
	  		</header>	    
	    </div><!-- /headerwrap -->

	
		<!-- ==== ABOUT ==== -->
		<div class="container" id="about" name="about">
			<div class="row white">
				<h1 class="fade-down centered">TENTANG SISTEM</h1>
				<hr>
				
				<div class="fade-up col-md-6">
					<p>Sistem informasi manajemen peminjaman ruang di Dinas Komunikasi Informatika Statistik dan Persandian (DISKOMINFO SP) Kota Surakarta sendiri sudah ada. Akan tetapi masih terdapat kekurangan diantaranya informasi ruangan masih berupa tampilan gambar, tidak ada informasi mengenai status tersedia atau tidak tersedianya ruangan, dan tidak ada informasi siapa yang sudah memesan ruangan. Jadi masih ditubuhkan pengembangan sistem. Pengembangan sistem manajemen peminjaman sudah penulis kerjakan Kegiatan Magang Mahasiswa (KMM).
					 </p>
				</div><!-- col-md-6 -->
				
				<div class="fade-up col-md-6">
					<p>Sedangkan untuk proyek Tugas Akhir (Tugas Akhir), penulis masih melanjutkan proyek Kegiatan Magang Mahasiswa (KMM) yaitu sistem informasi manajemen peminjaman menu peminjaman barang yang telah diinventariskan oleh DISKOMINFO SP. Dikarenakan permasalahan yang ditemukan adalah pegawai dari luar dinas yang akan meminjam barang, masih harus pergi ke DISKOMINFO SP dengan konfirmasi pinjam dan diberi tanda terima pinjam secara manual.  </p>
				</div><!-- col-md-6 -->
			</div><!-- row -->
		</div><!-- container -->
  		
		
		<div class="container" id="contact" name="contact">
			<div class="row row white">
			<br>
				<h1 class="centered fade-down">-TERIMA KASIH TELAH BERKUNJUNG-</h1>
				<hr class="fade-down title-mb">
				<div class="col-md-4 fade-up">
					<h3>Kontak Informasi Dinas</h3>
					
					<p><span></span>Indonesia<br/>
						<span></span>Alamat : Jl. Jenderal Sudirman No. 2 Kompleks Balaikota Surakarta<br/>
						<span></span>Telp : (0271) 2931669<br/>
						<span></span>Email : diskominfosp@surakarta.go.id<br/>
					</p>
				</div><!-- col -->
				
				<div class="col-md-4 fade-up">
					<h3>Registrasi Pengguna</h3>
					<p>Registrasi disini jika belum mempunyai akun</p>
					<a href="regis" class="btn btn-success">Ruang</a>
					<a href="regis_barang" class="btn btn-success">Barang</a>
				
				</div><!-- col -->
				
				<div class="col-md-4 fade-up">
					<h3>Informasi Dinas</h3>
					<p>Dinas Komunikasi, Informatika, Statistik dan Persandian (DISKOMINFO SP) Kota Surakarta adalah unsur pelaksana pemerintah daerah yang mempunyai tugas pokok menyelenggarakan urusan pemerintahan bidang Komunikasi dan Informatika, Statistik serta Persandian berdasarkan asas otonomi daerah dan tugas pembantuan.
DISKOMINFO SP Kota Surakarta, sesuai dengan yang diatur dalam Perwali No. 27-C Tahun 2016, tentang Kedudukan, Susunan Organisasi, Tugas, Fungsi dan Tata Kerja Perangkat Daerah Kota Surakarta.</p>
				</div><!-- col -->

			</div><!-- row -->
		
		</div><!-- container -->

		<div id="footerwrap">
			<div class="container">
				<div class="btt-wrapper fade-down"><a class="btt-link smoothScroll" href="#home"><i class="el-icon-chevron-up"></i></a></div>
				<h4 class="fade-up">Copyright © <a href="https://diskominfosp.surakarta.go.id/">Diskominfo SP </a><?php 
    echo gmdate('Y'); ?></h4>
			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/plugins.js"></script>
	<script type="text/javascript" src="js/init.js"></script>
  </body>
</html>
