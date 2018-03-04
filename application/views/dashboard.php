<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Virtual Meeting | Beranda</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700%7COpen+Sans:300,400,700">
    <!-- theme stylesheet-->

 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.png">
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="120">
	<?php 
  if(!isset($_SESSION['login'])){
    $load = array(
      'login' => FALSE
    );
    
    $this->session->set_userdata( $load );
  
  }else{
    if($_SESSION['login'] == TRUE){
      $data = $_SESSION['list'];
      foreach ($data as $row) {
        $id = $row['id_user'];
        $nama = $row['nama_user'];
        $username = $row['username'];
        $picture = $row['profile_picture'];
        $departemen = $row['departemen'];
      }
    }
  }
?>
<?php if ($_SESSION['login'] == TRUE): ?>
	<header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container">
            <div id="navigation" class="collapse navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="<?php echo base_url(); ?>home/dashboard">Beranda</a></li>
                <li><a href="<?php echo base_url(); ?>home#kriteria">Lini Masa</a></li>
                <li><a href="<?php echo base_url(); ?>home/youranalisis">Analisis</a></li>
                <li><a href="<?php echo base_url(); ?>home/penilaiankriteria">Finalisasi</a></li>
                <li><a href="<?php echo base_url(); ?>home/penilaianalternatif">Rekomendasi</a></li>
                <li><a href="<?php echo base_url(); ?>home/logout">keluar</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    
	selamat datang <?php echo $nama ?>
	
	<!-- Content -->
	<div>
		<?php $this->load->view($content); ?>
	</div>

	<?php else: ?>
	<?php redirect('home','refresh') ?>
	<?php endif ?>

	<footer>
      <div class="container">
        <div class="row copyright">
         
      </div>
    </footer>
		<!-- End Footer -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    <!-- to use it on your site, change API key for Google Maps -->
    <script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>
