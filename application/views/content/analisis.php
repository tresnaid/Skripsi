<style type="text/css">
  .activesub{
    background-color: grey;
  }

</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#measure_add_input").click(function(event){
            var measureadd = "<input type='text' name='measureadd[]' placeholder='' required></input><br/>";
            $("#measure_quotes").append(measureadd);
            $("#measure_quotes").append("\n<br />");
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#action_add_input").click(function(event){
            var actionadd = "<input type='text' name='actionadd[]' placeholder='' required></input>";
            $("#action_quotes").append(actionadd);
            $("#action_quotes").append("\n<br />");
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#isneed_add_input").click(function(event){
            var isneedadd = "<input type='text' name='isneedadd[]' placeholder='' required></input>";
            var isneedadd_desc = "<select name='isneedadd_desc[]'><option value='Buat Baru'>Buat Baru</option><option value='Perbaharui'>Perbaharui</option><option value='Beli'>Beli</option></select>";
            $("#isneed_quotes").append(isneedadd);
            $("#isneed_quotes").append(isneedadd_desc);
            $("#isneed_quotes").append("\n<br />");
        });
    });
</script>
<script type="text/javascript">
    var jumlah_measure = 0;
    var jumlah_action = 0;
    var jumlah_isneed = 0;
    function onClickmeasure() {
        jumlah_measure += 1;
        document.getElementById("jmeasure").value = jumlah_measure;
    };
    function onClickaction() {
        jumlah_action += 1;
        document.getElementById("jaction").value = jumlah_action;
    };
    function onClickisneed() {
        jumlah_isneed += 1;
        document.getElementById("jisneed").value = jumlah_isneed;
    };
   
    function kliktambahmeasure(link) {
      var jumlah_measure_baru = parseInt(document.getElementById(link).value);
      jumlah_measure_baru += 1;
      document.getElementById(link).value = jumlah_measure_baru;
    }
    function kliktambahaction(link) {
      var jumlah_action_baru = parseInt(document.getElementById(link).value);
      jumlah_action_baru += 1;
      document.getElementById(link).value = jumlah_action_baru;
    }
    function kliktambahisneed(link) {
      var jumlah_isneed_baru = parseInt(document.getElementById(link).value);
      jumlah_isneed_baru += 1;
      document.getElementById(link).value = jumlah_isneed_baru;
    }

      document.getElementById("isneed[]").addEventListener("keyup", function(event) {
          event.preventDefault();
      });
      document.getElementById("measure[]").addEventListener("keyup", function(event) {
          event.preventDefault();
      });
      document.getElementById("action[]").addEventListener("keyup", function(event) {
          event.preventDefault();
      });
      document.getElementById("moremeasure").addEventListener("keyup", function(event) {
          event.preventDefault();
      });
      document.getElementById("moreaction").addEventListener("keyup", function(event) {
          event.preventDefault();
      });
      document.getElementById("moreisneed").addEventListener("keyup", function(event) {
          event.preventDefault();
      });

      function hapus(id) {
        document.getElementById(id).value = " ";
      }

    // $(function tambahmeasurebaru(link, button){
    //     $("#button").click(function(event){
    //         $("#link").append("<input type='text' name='moremeasurearray[]' placeholder='' required></input>");
    //         $("#link").append("\n<br />");
    //     });
    // });   
  </script>
        
<div id="tambahanalisis" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">tambah analisis</h4>
          </div>
          <div class="modal-body">
          	<form action="<?php echo base_url();?>home/inputAnalisis" method="POST">
          		<div class="row">
	          		<div class="col-md-4">
	          			<label>Objective</label>
	          		</div>
	          		<div class="col-md-8">
		          		<input type="text" name="objective" required>
	          		</div>
          		</div>
          		<div class="row">
	          		<div class="col-md-4">
	          			<label>Measure</label>
	          		</div>
	          		<div class="col-md-8">
		          		<input type="text" name="measure" required>
							<div id="measure_quotes"></div>
							<input type="button" id=measure_add_input value="+ add measure" class="btn btn-default" onClick="onClickmeasure()">
	          		</div>
          		</div>
          		<div class="row">
	          		<div class="col-md-4">
	          			<label>Action</label>
	          		</div>
	          		<div class="col-md-8">
		          		<input type="text" name="action" required>
							<div id="action_quotes"></div>
							<input type="button" id=action_add_input value="+ add action" class="btn btn-default" onClick="onClickaction()" >
	          		</div>
          		</div>
          		<div class="row">
	          		<div class="col-md-4">
	          			<label>IS Need</label>
	          		</div>
	          		<div class="col-md-8">
                  <input type="text" name="isneed" required>
		          		<select name="isneed_desc" required="">
                    <option value="Buat Baru">Buat Baru</option>
                    <option value="Perbaharui">Perbaharui</option>
                    <option value="Beli">Beli</option>
                  </select>
							<div id="isneed_quotes"></div>
							<input type="button" id=isneed_add_input value="+ add isneed"  class="btn btn-default" onClick="onClickisneed()">
	          		</div>
          		</div>
          </div>

          <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
          <input type="hidden" name="jumlah_measure" id="jmeasure">
          <input type="hidden" name="jumlah_action" id="jaction">
          <input type="hidden" name="jumlah_isneed" id="jisneed">
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="submitted"><i class="fa fa-cross"></i> Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
        </div>
      	</form>
      </div>
   </div>
</div>

<section class="section-gray">
<div class="container clearfix">
<div class="row services">
  <div class="col-md-12">
    <h2 class="heading">Analisis Anda</h2>
    <div id="navigation" class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-right">
        <li class="
          <?php if($kategori == 'FNC'): ?>
            activesub
          <?php endif ?>
         "
        ><a href="<?php echo base_url(); ?>home/analisis/1">Financial</a></li>
        <li class="
          <?php if($kategori == 'CST'): ?>
            activesub
          <?php endif ?>
         "><a href="<?php echo base_url(); ?>home/analisis/2">Customer</a></li>
        <li class="
          <?php if($kategori == 'INT'): ?>
            activesub
          <?php endif ?>
         "><a href="<?php echo base_url(); ?>home/analisis/3">Internal Process</a></li>
        <li class="
          <?php if($kategori == 'LEA'): ?>
            activesub
          <?php endif ?>
         "><a href="<?php echo base_url(); ?>home/analisis/4">Inovation and Growth</a></li>
      </ul>
    </div>
    <div class="row">
      <div class="container">
        <div class="btn-group">
          <a class="btn btn-default" data-toggle="modal" data-target="#tambahanalisis"><span>Tambah Analisis</span></a>
        </div>
        <div class="panel panel-default">
          <div class="panel-body">
            <table class="table table-striped table-bordered" style="margin:0px;">
              <thead>
                <tr>
      						<th>Objective</th>
                  <th>Measure</th>
                  <th>Action (CSF)</th>
                  <th>IS Need</th>
                  <th>Option</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach($data_objective as $row){ ?>
                <?php $counter=1; ?>
                <?php 
                  $data_measure = $this->User_model->getDataWhere('t_measure', 'id_objective', $row['id_objective']);
                  $count_measure = $this->User_model->countwhere('t_measure', 'id_objective', $row['id_objective']);

                  $count_action = $this->User_model->countwhere('t_action', 'id_objective', $row['id_objective']);
                  $data_action = $this->User_model->getDataWhere('t_action', 'id_objective', $row['id_objective']);

                  $count_isneed = $this->User_model->countwhere('t_isneed', 'id_objective', $row['id_objective']);
                  $data_isneed = $this->User_model->getDataWhere('t_isneed', 'id_objective', $row['id_objective']);
                  
                  $biggest = $this->User_model->countmax($count_measure, $count_action, $count_isneed);
                  $jumlah_max = $biggest['jumlah'];
                  $nama_max = $biggest['nama'];
                  ?>
                <div id="hapusanalisis<?php echo $row['id_objective']?>" class="modal fade" role="dialog" >
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Hapus Analisis Ini ?</h4>
                          </div>
                          <div class="modal-body">
                            <h5>Apakah Anda Yakin Ingin Menghapus Analisis Ini ?</h5>
                          </div>
                          <form action="<?php echo base_url();?>home/deleteAnalisis" method="POST">
                          <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                          <input type="hidden" name="id_objective" value="<?php echo $row['id_objective'] ?>">
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i> Hapus</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
                        </div>
                        </form>
                      </div>
                   </div>
                </div>
                <div id="editanalisis<?php echo $row['id_objective']?>" class="modal fade" role="dialog" >
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Hapus Analisis Ini ?</h4>
                      </div>
                      <form action="<?php echo base_url();?>home/editAnalisis" method="POST">
                      <div class="modal-body">
                        <div class="row">

                          <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                          <div class="col-md-3">
                            <label>Objective</label>
                          </div>
                          <div class="col-md-9">
                            <input type="text" name="objective" value="<?php echo $row['objective']?>" style="width: 95%"  required>
                          </div>

                          <div class="col-md-3">
                            <label>Measure</label><a href="" id="cekhapus[]"></a>
                          </div>
                          <div class="col-md-9">
                          <?php foreach ($data_measure as $key): ?>
                            <input type="hidden" name="id_measure[]" value="<?php echo $key['id_measure'] ?>">
                            <input type="text" id=measure<?php echo $row['id_objective']?><?php echo $key['id_measure']?> name="measure[]" value="<?php echo $key['measure']?>" style="width: 80%"> 
                            <button onclick="hapus('measure<?php echo $row['id_objective']?><?php echo $key['id_measure']?>');" class="btn btn-default" name="buttonhapus">hapus</button> 
                          <?php endforeach ?>
                            <input type="text" name="moremeasure" id="moremeasure" style="width: 80%;" placeholder="tambah measure disini">
                          </div>

                          <div class="col-md-3">
                            <label>Action CSF</label>
                          </div>
                          <div class="col-md-9">
                          <?php foreach ($data_action as $key): ?>
                            <input type="hidden" name="id_action[]" value="<?php echo $key['id_action'] ?>">
                            <input type="text" id="action<?php echo $row['id_objective']?><?php echo $key['id_action']?>" name="action[]" value="<?php echo $key['action']?>" style="width: 80%">
                            <button onclick="hapus('action<?php echo $row['id_objective']?><?php echo $key['id_action']?>');" class="btn btn-default">hapus</button>
                          <?php endforeach ?>
                            <input type="text" name="moreaction" id="moreaction" style="width: 80%;" placeholder="tambah action disini">
                          </div>

                          <div class="col-md-3">
                            <label>IS Need</label>
                          </div>
                          <div class="col-md-9">
                          <?php foreach ($data_isneed as $key): ?>
                            <input type="hidden" name="id_isneed[]" value="<?php echo $key['id_isneed'] ?>">
                            <input type="text" id="isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>" name="isneed[]" value="<?php echo $key['isneed']?>" style="width: 80%">
                            <select name="isneed_desc_edit[]" required="">
                              <option value="Buat Baru" <?php if ($key['Tipe'] == 'Buat Baru'): ?>
                                selected
                              <?php  endif ?>
                              >Buat Baru</option>
                              <option value="Perbaharui" <?php if ($key['Tipe'] == 'Perbaharui'): ?>
                                selected
                              <?php  endif ?>
                              >Perbaharui</option>
                              <option value="Beli" <?php if ($key['Tipe'] == 'Beli'): ?>
                                selected
                              <?php  endif ?>
                              >Beli</option>
                            </select>
                            <button onclick="hapus('isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>');" class="btn btn-default">hapus</button>
                          <?php endforeach ?>
                            <input type="text" name="moreisneed" id="moreisneed" style="width: 80%;" placeholder="tambah isneed disini">
                            <select name="moreisneed_desc" required="">
                              <option value="Buat Baru">Buat Baru</option>
                              <option value="Perbaharui">Perbaharui</option>
                              <option value="Beli">Beli</option>
                            </select>
                          </div>

                        </div>
                      </div>
                      <input type="hidden" name="id_objective" value="<?php echo $row['id_objective'] ?>">
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Simpan</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div>
                  <?php

                    if ($nama_max == 'measure'): {
                      foreach ($data_measure as $key => $value) {
                  ?>
                        <tr>
                          <?php if ($counter == 1): ?>
                            <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
                          <?php endif ?>

                          <td ><?php echo $value['measure']?></td> 

                          <?php if (!empty($data_action[$key]['action'])): ?>
                            <td ><?php echo $data_action[$key]['action']?></td>
                          <?php else: ?>
                            <td> </td>
                          <?php endif ?>
                          
                          <?php if (!empty($data_isneed[$key]['isneed'])): ?>
                            <td ><?php echo $data_isneed[$key]['isneed']?></td>
                          <?php else: ?>
                            <td> </td>
                          <?php endif ?>
                         
                          <?php if ($counter == 1): ?>
                          <td rowspan="<?php echo $jumlah_max; ?>">
                            <a href="" data-toggle="modal" data-target="#editanalisis<?php echo $row['id_objective']?>"><i class="fa fa-edit"></i></a> 
                            <a href="" data-toggle="modal" data-target="#hapusanalisis<?php echo $row['id_objective']?>"><i class="fa fa-trash"></i></a> 
                          </td>
                          <?php endif ?>
                        </tr>
                      <?php
                      $counter++;
                    }
                 }elseif ($nama_max == 'action'): {
                   foreach ($data_action as $key => $value) {
                  ?>
                      <tr>
                        <?php if ($counter == 1): ?>
                          <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
                        <?php endif ?>
                        
                        <?php if (!empty($data_measure[$key]['measure'])): ?>
                          <td ><?php echo $data_measure[$key]['measure']?></td>
                        <?php else: ?>
                          <td> </td>
                        <?php endif ?>
                        
                        <td ><?php echo $value['action']?></td>

                        <?php if (!empty($data_isneed[$key]['isneed'])): ?>
                          <td ><?php echo $data_isneed[$key]['isneed']?></td>
                        <?php else: ?>
                          <td> </td>

                        <?php endif ?>
                        
                        <?php if ($counter == 1): ?>
                        <td rowspan="<?php echo $jumlah_max; ?>">
                          <a href="" data-toggle="modal" data-target="#editanalisis<?php echo $row['id_objective']?>"><i class="fa fa-edit"></i></a> 
                          <a href="" data-toggle="modal" data-target="#hapusanalisis<?php echo $row['id_objective']?>"><i class="fa fa-trash"></i></a> 
                        </td>
                        <?php endif ?>
                      </tr>
                      <?php
                      $counter++;
                    }
                 }elseif ($nama_max == 'isneed'): {
                    foreach ($data_isneed as $key => $value) {
                ?>                   
                   <tr>
                      <?php if ($counter == 1): ?>
                        <td rowspan="<?php echo $jumlah_max ?>"><?php echo $row['objective']?></td>
                      <?php endif ?>
                      
                      <?php if (!empty($data_measure[$key]['measure'])): ?>
                        <td ><?php echo $data_measure[$key]['measure']?></td>
                      <?php else: ?>
                        <td> </td>
                      <?php endif ?>
                      
                      <?php if (!empty($data_action[$key]['action'])): ?>
                          <td ><?php echo $data_action[$key]['action']?></td>
                        <?php else: ?>
                          <td> </td>
                        <?php endif ?>

                        <td ><?php echo $value['isneed']?></td>
                        
                        <?php if ($counter == 1): ?>
                      <td rowspan="<?php echo $jumlah_max; ?>">
                        <a href="" data-toggle="modal" data-target="#editanalisis<?php echo $row['id_objective']?>"><i class="fa fa-edit"></i></a> 
                        <a href="" data-toggle="modal" data-target="#hapusanalisis<?php echo $row['id_objective']?>"><i class="fa fa-trash"></i></a>
                      </td>
                      <?php endif ?>
                    </tr>
                  <?php
                  $counter++;
                 }
                }elseif ($nama_max == 'kosong'): {
                  ?>
                  <tr>
                    <td><?php echo $row['objective']; ?></td>
                    <td> </td>
                    <td> </td>
                    <td> </td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#editanalisis<?php echo $row['id_objective']?>"><i class="fa fa-edit"></i></a> 
                        <a href="" data-toggle="modal" data-target="#hapusanalisis<?php echo $row['id_objective']?>"><i class="fa fa-trash"></i></a> 
                      </td>
                  </tr>
                  <?php

                } endif ?>
                <?php } ?>
              </tbody>
            </table>
          </div>	
        </div>
	    </div>
    </div>
  </div>
</div>
</section>
