<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Virtual Meeting | Beranda</title>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/themify-icons.css">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- Google fonts - Roboto Condensed for headings, Open Sans for copy-->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto+Condensed:300,700%7COpen+Sans:300,400,700">
    <!-- theme stylesheet--> 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/timeline.css">
 	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/custom.css">
    <!-- Favicon-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/favicon.png">
</head>
<body data-spy="scroll" data-target="#navigation" data-offset="120">
  <?php 
  if(!isset($_SESSION['admin'])){
    $load = array(
      'admin' => FALSE
    );
    $this->session->set_userdata( $load );
  }

?>

<?php if ($_SESSION['admin'] == TRUE): ?>
	<header class="header">
      <div class="sticky-wrapper">
        <div role="navigation" class="navbar navbar-default">
          <div class="container">
            <div class=" navbar-collapse">
              <ul class="nav navbar-nav navbar-right">
                <li class="pull-right"><a href="<?php echo base_url(); ?>home/logout">keluar</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>
    <div class="container">
      <h5>Data Versi</h5>
      <table class="table table-striped table-bordered" style="margin:0px">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Versi</th>
              <th>Tahun</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($versi as $key): ?>
              <div id="hapus<?php echo $key->id?>" class="modal fade" role="dialog" >
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <label class="modal-title">Hapus Analisis Ini ?</label>
                    </div>
                    <div class="modal-body">
                      <label>Apakah Anda Yakin Ingin Menghapus Analisis Ini ?</label>
                    </div>
                    <form action="<?php echo base_url();?>home/delete_version" method="POST">
                      <input type="hidden" name="id" value="<?php echo $key->id ?>">
                      <input type="hidden" name="version" value="<?php echo $key->version ?>">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Hapus</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <tr>
                <td><?php echo $key->version ?></td>
                <td><?php echo $key->versi ?></td>
                <td><?php echo $key->tahun ?></td>
                <td><?php echo $key->status ?></td>
                <td> <a href="" data-toggle="modal" data-target="#hapus<?php echo $key->id?>"><i class="fa fa-trash"></i></a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      	<form action="<?php echo base_url(); ?>home/new_version">
         <button type="submit" class="btn pull-right">
           Buat Versi Baru
         </button> 
        </form>
      <br>
      <h5>Data User</h5>
      <table class="table table-striped table-bordered" style="margin:0px">
          <thead>
            <tr>
              <th>Nama</th>
              <th>Versi</th>
              <th>Status Aktif</th>
              <th>Status Pengisian Bobot Kriteria</th>
              <th>Status Pengisian Bobot Alternatif</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($user as $key): ?>

              <tr>
                <td><?php echo $key->nama_user ?></td>
                <td><?php echo $key->departemen ?></td>
                <td><?php echo $key->status ?></td>
                <td><?php echo $key->kriteria ?></td>
                <td><?php echo $key->alternatif ?></td>
                <td><a href=""><i class="fa fa-trash"></i></a></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      	<form action="<?php echo base_url(); ?>home/new_version">
           <button type="submit" class="btn pull-right">
            Tambah User Baru
           </button> 
        </form>
      </div>
	<?php else: ?>
	<?php redirect('home','refresh') ?>
	<?php endif ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.scrollTo.min.js"></script>
    
  </body>
</html>
