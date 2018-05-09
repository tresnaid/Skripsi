<style type="text/css">
  .activesub{
    background-color: yellow;
  }
.modal-dialog{
  width: 80%;
}
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#measure_add_input").click(function(event){
            var measureadd = "<textarea placeholder='masukkan measure disini' name='measureadd[]' placeholder='' required style='width: 90%;'></textarea>";
            $("#measure_quotes").append(measureadd);
            $("#measure_quotes").append("\n<br />");
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#action_add_input").click(function(event){
            var actionadd = "<textarea placeholder='masukkan action disini' name='actionadd[]' placeholder='' required style='width: 90%;'></textarea>";
            $("#action_quotes").append(actionadd);
            $("#action_quotes").append("\n<br />");
        });
    });
</script>
<script type="text/javascript">
    $(function(){
        $("#isneed_add_input").click(function(event){
            var isneedadd = "<select name='a'><optgroup label='Key Operational'><?php foreach ($key_operational as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Strategic'><?php foreach ($strategic as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='High Potential'><?php foreach ($high_potential as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Support'><?php foreach ($support as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Lainnya'><option value='lainnya'>Lainnya</option></optgroup></select>";
            var isneedadd_desc = "<select name='isneedadd_desc[]'><option value='Buat Baru'>Buat Baru</option><option value='Perbaharui'>Perbaharui</option><option value='Beli'>Beli</option></select>";
            var isneedadd_colom = "<textarea placeholder='detail' id='isneed_lainnya' name='isneedadd_detail[]' required style='width: 70%; '></textarea>";
            $("#isneed_quotes").append("<br />");
            $("#isneed_quotes").append(isneedadd);
            $("#isneed_quotes").append(isneedadd_desc);
            $("#isneed_quotes").append(isneedadd_colom);
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

  jQuery(function($){
     $("select[name='isneed']").change(function(){
        var select = $(this);              
        if(select.val() === "lainnya"){     
            document.getElementById('isneed_lainnya').style.display = "block";
        }else{
          document.getElementById('isneed_lainnya').style.display = "none";
        }
     });        
  });

  jQuery(function($){
     $("select[name='a']").change(function(){       
     alert("sadads"); 
     });        
  });
 
  function hapus(id,button,button2) {
    if(confirm("Yakin akan menghapus ini ? pastikan anda menyimpan perubahan setelah menghapus")){
      document.getElementById(id).value = " ";     
      document.getElementById(id).style.display = "none";     
      document.getElementById(button).style.display = "none";
      document.getElementById(button2).style.display = "none";
    }else{
      return false;
    }
  }
  
    
  function tambahmeasurebaru(link){
    var measurebaru1 = "<textarea placeholder='masukkan measure disini' name='measureadd[]' id='moremeasurearrayid' placeholder='' required style='width: 90%;'></textarea>";
    $(document.getElementById(link)).append(measurebaru1);
  }
  function tambahactionbaru(link){
    $(document.getElementById(link)).append(
       $('<input>', {
        type: 'text',
        name: 'moreactionarray[]'
    })
    );
  }
  function tambahisneedbaru(link){
    $(document.getElementById(link)).append(
       $('<input>', {
        type: 'text',
        name: 'moreisneedarray[]'
    })
    );
  } 
  function hehe(link) {
     var a = document.getElementById(link).value;
     alert(a);
   } 
</script>
<!-- <form action="" method="post">
  <div id="measurebaru1"></div> 
  <input type="button" id=measure_add_input_button value="+ add measure" class="btn btn-default" onClick="tambahmeasurebaru('measurebaru1', 'measure_add_input_button')">
  <button type="submit" name="hehe">sasd</button>
</form> -->
<!-- <?php 
  if (isset($_POST['hehe'])) {
        $asdid = $this->input->post('moremeasurearray');
        print_r($asdid);
  }

 ?> -->
<div id="tambahanalisis" class="modal fade" role="dialog" >
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">tambah analisis</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url();?>analisis/inputAnalisis" method="POST">
          <div class="row">
            <div class="col-md-2">
              <label>Objective</label>
            </div>
            <div class="col-md-10">
              <label style="font-size: 10px;">pada kolom ini anda diminta untuk memasukkan objektif yang ingin dicapai</label>
              <textarea placeholder="masukkan objektif disini" name="objective" required style="width: 90%;"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label>Measure</label>
            </div>
            <div class="col-md-10">
              <label style="font-size: 10px;">pada kolom ini anda diminta untuk memasukkan ukuran dalam objektif yang ingin dicapai</label>
              <textarea placeholder="masukkan measure disini" name="measure" required style="width: 90%;"></textarea>
          <div id="measure_quotes"></div>
          <input type="button" id=measure_add_input value="+ tambah measure" class="btn btn-default" onClick="onClickmeasure()">
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label>Action (CSF)</label>
            </div>
            <div class="col-md-10">
              <label style="font-size: 10px;">pada kolom ini anda diminta untuk memasukkan critical success factors yang ingin dicapai</label>
              <textarea placeholder="masukkan action disini" name="action" required style="width: 90%;"></textarea>
          <div id="action_quotes"></div>
          <input type="button" id=action_add_input value="+ tambah action" class="btn btn-default" onClick="onClickaction()" >
            </div>
          </div>
          <div class="row">
            <div class="col-md-2">
              <label>IS Need</label>
            </div>
            <div class="col-md-10">
              <label style="font-size: 10px;">pada kolom ini anda diminta untuk memasukkan memilih kebutuhan sistem informasi yang akan dibuat</label>
              <label style="font-size: 10px;">*apabila pilihan anda tidak terdapat pada menu pilihan silakan pilih pilihan lainnya, dan tulis di kolom detail</label>
              <label style="font-size: 10px;">*apabila anda bermaksud memperbaharui kebutuhan sistem informasi yang telah tersedia dan hanya akan menambahkan fitur, silakan pilih kebutuhan sistem informasi yang hendak diperbaharui, pilih perbaharui pada tipe pembuatan, dan tuliskan fitur tambahan di kolom detail</label>
              <select name="isneed">
                <optgroup label="Key Operational">
                  <?php foreach ($key_operational as $key): ?>
                    <option value="<?php echo $key['nama'] ?>"><?php echo $key['nama'] ?></option>
                  <?php endforeach ?>
                </optgroup>
                <optgroup label="Strategic">
                  <?php foreach ($strategic as $key): ?>
                    <option value="<?php echo $key['nama'] ?>"><?php echo $key['nama'] ?></option>
                  <?php endforeach ?>
                </optgroup>
                <optgroup label="High Potential">
                  <?php foreach ($high_potential as $key): ?>
                    <option value="<?php echo $key['nama'] ?>"><?php echo $key['nama'] ?></option>
                  <?php endforeach ?>
                </optgroup>
                <optgroup label="Support">
                  <?php foreach ($support as $key): ?>
                    <option value="<?php echo $key['nama'] ?>"><?php echo $key['nama'] ?></option>
                  <?php endforeach ?>
                </optgroup>
                <optgroup label="Lainnya">
                  <option value="lainnya">Lainnya</option>
                </optgroup>
              </select>
              <select name="isneed_desc" required="">
                <option value="Buat Baru">Buat Baru</option>
                <option value="Perbaharui">Perbaharui</option>
                <option value="Beli">Beli</option>
              </select>
              <textarea placeholder="detail" id="isneed_detail" name="isneed_lainnya" required style="width: 70%; "></textarea>
            <div id="isneed_quotes"></div>
              <input type="button" id=isneed_add_input value="+ tambah kebutuhan sistem informasi"  class="btn btn-default" onClick="onClickisneed()">
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
            >
              <a href="<?php echo base_url(); ?>home/analisis/1">Financial</a>
            </li>
            <li class="
              <?php if($kategori == 'CST'): ?>
                activesub
              <?php endif ?>
             ">
              <a href="<?php echo base_url(); ?>home/analisis/2">Customer</a>
            </li>
            <li class="
              <?php if($kategori == 'INT'): ?>
                activesub
              <?php endif ?>
             ">
              <a href="<?php echo base_url(); ?>home/analisis/3">Internal Process</a>
            </li>
            <li class="
              <?php if($kategori == 'LEA'): ?>
                activesub
              <?php endif ?>
             ">
              <a href="<?php echo base_url(); ?>home/analisis/4">Inovation and Growth</a>
            </li>
          </ul>
        </div>
        <div class="row">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-body">
                <label style="font-size: 12px;">*dalam laman ini, anda diminta untuk mengisi strategi objektif pada perspektif <?php echo $nama_kategori ?></label>
                <br>
                <div class="btn-group">
                  <a class="btn btn-default" data-toggle="modal" data-target="#tambahanalisis">
                    <span>Tambah Analisis</span>
                  </a>
                </div>
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
                          <form action="<?php echo base_url();?>analisis/deleteAnalisis" method="POST">
                            <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                            <input type="hidden" name="id_objective" value="<?php echo $row['id_objective'] ?>">
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Hapus</button>
                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
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
                            <h4 class="modal-title">Edit Analisis</h4>
                          </div>
                          <form action="<?php echo base_url();?>analisis/editAnalisis" method="POST" id="edit">
                          <div class="modal-body">
                            <div class="row">
                              <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                             
                              <div class="col-md-2">
                                <label>Objective</label>
                              </div>
                              <div class="col-md-10">
                                <textarea name="objective" style="width: 100%"  required><?php echo $row['objective']?></textarea>
                              </div>

                              <div class="col-md-2">
                                <label>Measure</label><a href="" id="cekhapus[]"></a>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_measure as $key): ?>
                                <input type="hidden" name="id_measure[]" value="<?php echo $key['id_measure'] ?>">
                                <textarea id=measure<?php echo $row['id_objective']?><?php echo $key['id_measure']?> name="measure[]" style="width: 80%"><?php echo $key['measure']?></textarea>
                                <button type="button" onclick="hapus('measure<?php echo $row['id_objective'].$key['id_measure']?>','measurebutton<?php echo $row['id_objective'].$key['id_measure']?>');" class="btn btn-default" name="buttonhapus" id="measurebutton<?php echo $row['id_objective'].$key['id_measure']?>" style="margin-bottom: 5px; margin-top: 0;">hapus</button> 
                              <?php endforeach ?>
                              <div id="measurebaru<?php echo $row['id_objective']?>">
                                <textarea name="moremeasure" id="moremeasure" style="width: 100%;" placeholder="tambah measure disini"></textarea>

                              </div> 
                              <button type="button" id=measure_add_input_button class="btn btn-default" onclick="tambahmeasurebaru('measurebaru<?php echo $row['id_objective']?>')">tambah measure</button>
                                
                              <button type="button" onclick="hehe('moremeasurearrayid');">check</button>
                              </div>

                              <div class="col-md-2">
                                <label>Action CSF</label>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_action as $key): ?>
                                <input type="hidden" name="id_action[]" value="<?php echo $key['id_action'] ?>">
                                <textarea id="action<?php echo $row['id_objective']?><?php echo $key['id_action']?>" name="action[]" style="width: 80%"><?php echo $key['action']?></textarea>
                                <button type="button" onclick="hapus('action<?php echo $row['id_objective']?><?php echo $key['id_action']?>','actionbutton<?php echo $row['id_objective']?><?php echo $key['id_action']?>');" id="actionbutton<?php echo $row['id_objective']?><?php echo $key['id_action']?>" class="btn btn-default">hapus</button>
                              <?php endforeach ?>
                                <textarea name="moreaction" id="moreaction" style="width: 100%;" placeholder="tambah action disini"></textarea>
                              </div>

                              <div class="col-md-2">
                                <label>IS Need</label>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_isneed as $key): ?>
                                <input type="hidden" name="id_isneed[]" value="<?php echo $key['id_isneed'] ?>">
                                <textarea id="isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>" name="isneed[]" style="width: 80%"><?php echo $key['isneed']?></textarea>
                                <select name="isneed_desc_edit[]" id="isneedbutton2<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>" required="">
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
                                <button type="button" onclick="hapus('isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneedbutton<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneedbutton2<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>');" class="btn btn-default" id="isneedbutton<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>">hapus</button>
                              <?php endforeach ?>
                                <textarea name="moreisneed" id="moreisneed" style="width: 100%;" placeholder="tambah isneed disini"></textarea>
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
