<style type="text/css">
  .activesub{
    background-color: #bdc3c7;
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
            var isneedadd = "<select name='isneedadd[]' required><option value=''>Pilih Kebutuhan Sistem Informasi</option><optgroup label='Key Operational'><?php foreach ($key_operational as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Strategic'><?php foreach ($strategic as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='High Potential'><?php foreach ($high_potential as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Support'><?php foreach ($support as $key): ?><option value='<?php echo $key['nama'] ?>'><?php echo $key['nama'] ?></option><?php endforeach ?></optgroup><optgroup label='Lainnya'><option value='lainnya'>Lainnya</option></optgroup></select>";
            var isneedadd_desc = "<select name='isneedadd_desc[]'><option value='Buat Baru'>Buat Baru</option><option value='Perbaharui'>Perbaharui</option><option value='Beli'>Beli</option></select>";
            var isneedadd_detail = "<textarea placeholder='detail' id='isneed_detail' name='isneedadd_detail[]' style='width: 70%; '></textarea>";
            var isneedadd_strategic = "<select name='isneedadd_strategic[]' required=''><option value=''>Pilih Termasuk ke Dalam Strategic Seperti Apa Sistem Informasi Yang Akan Dibangun</option><option value='KO'>Key Operational</option><option value='ST'>Strategic</option><option value='HP'>High Potential</option><option value='SP'>Support</option></select>";
            $("#isneed_quotes").append("<br />");
            $("#isneed_quotes").append(isneedadd);
            $("#isneed_quotes").append(isneedadd_desc);
            $("#isneed_quotes").append(isneedadd_detail);
            $("#isneed_quotes").append(isneedadd_strategic);
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


  // jQuery(function($){
  //    $("select[name='isneed']").change(function(){
  //       var select = $(this);              
  //       if(select.val() === "lainnya"){     
  //           document.getElementById('isneed_lainnya').style.display = "block";
  //       }else{
  //         document.getElementById('isneed_lainnya').style.display = "none";
  //       }
  //    });        
  // });
  var numberMeasure = 1;
  var numberAction = 1;
  var numberIsneed = 1;
  
  function tambahMeasure(link){
    document.getElementById(numberMeasure+link).style.display = "block";
    if (numberMeasure<6){
      numberMeasure+= 1;
    }else{
      numberMeasure = 1;
    }
  }
  function tambahAction(link){
    document.getElementById(numberAction+link).style.display = "block";
    if (numberAction<6){
      numberAction+= 1;
    }else{
      numberAction = 1;
    }
  }
  function tambahIsneed(link){
    document.getElementById(numberIsneed+link).style.display = "block";
    if (numberIsneed<6){
      numberIsneed+= 1;
    }else{
      numberIsneed = 1;
    }
  }

  function hapus(id,button,button2, nama, strategi) {
    if(confirm("Yakin akan menghapus ini ? pastikan anda menyimpan perubahan setelah menghapus")){
      document.getElementById(id).value = "   ";     
      document.getElementById(id).style.display = "none";     
      document.getElementById(button).style.display = "none";
      document.getElementById(button2).style.display = "none";
      document.getElementById(nama).style.display = "none";
      document.getElementById(strategi).style.display = "none";
    }else{
      return false;
    }
  }
  
    
  // function tambahmeasurebaru(link){
  //   var measurebaru1 = "<textarea placeholder='masukkan measure disini' name='measureadd[]' id='moremeasurearrayid' placeholder='' required style='width: 90%;'></textarea>";
  //   $(document.getElementById(link)).append(measurebaru1);
  // }
  // function tambahactionbaru(link){
  //   $(document.getElementById(link)).append(
  //      $('<input>', {
  //       type: 'text',
  //       name: 'moreactionarray[]'
  //   })
  //   );
  // }
  // function tambahisneedbaru(link){
  //   $(document.getElementById(link)).append(
  //      $('<input>', {
  //       type: 'text',
  //       name: 'moreisneedarray[]'
  //   })
  //   );
  // } 
  // function hehe(link) {
  //    var a = document.getElementById(link).value;
  //    alert(a);
  //  } 
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
              <label style="font-size: 10px;">pada bagian ini anda diminta untuk memilih kebutuhan sistem informasi yang akan dibuat</label>
              <label style="font-size: 10px;">*apabila pilihan anda tidak terdapat pada menu pilihan silakan pilih pilihan lainnya, dan tulis di kolom detail</label>
              <label style="font-size: 10px;">*apabila anda bermaksud memperbaharui kebutuhan sistem informasi yang telah tersedia dan hanya akan menambahkan fitur, silakan pilih kebutuhan sistem informasi yang hendak diperbaharui, pilih perbaharui pada tipe pembuatan, dan tuliskan fitur tambahan di kolom detail</label>
              <select name="isneed" required="">
                <option value="">
                  Pilih Kebutuhan Sistem Informasi
                </option>
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
              <textarea placeholder="detail" id="isneed_detail" name="isneed_detail" style="width: 70%; "></textarea>
              <select name="isneed_strategic" required="">
                <option value="">Pilih Termasuk ke Dalam Strategic Seperti Apa Sistem Informasi Yang Akan Dibangun</option>
                <option value="KO">Key Operational</option>
                <option value="ST">Strategic</option>
                <option value="HP">High Potential</option>
                <option value="SP">Support</option>
              </select>
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

<!-- <section class="section-gray"> -->
  <!-- <h4 class="heading">Analisis Anda</h4> -->
  <div class="container clearfix">
    <div class="row services">
      <div class="col-md-12">
        <div id="navigation" class="collapse navbar-collapse" style="background: #f4f4f4">
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
                <h4>Analisis Anda</h4>
                <label style="font-size: 12px;">*dalam laman ini, anda diminta untuk mengisi strategi objektif pada perspektif <?php echo $nama_kategori ?></label>
                <br>
                <div class="btn-group pull-right">
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
                            <label class="modal-title">Hapus Analisis Ini ?</label>
                          </div>
                          <div class="modal-body">
                            <label>Apakah Anda Yakin Ingin Menghapus Analisis Ini ?</label>
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
                                <textarea name="objective" style="width: 88%"  required><?php echo $row['objective']?></textarea>
                              <hr>
                              </div>

                              <div class="col-md-2">
                                <label>Measure</label><a href="" id="cekhapus[]"></a>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_measure as $key): ?>
                                <input type="hidden" name="id_measure[]" value="<?php echo $key['id_measure'] ?>">
                                <textarea id=measure<?php echo $row['id_objective']?><?php echo $key['id_measure']?> name="measure[]" style="width: 88%"><?php echo $key['measure']?></textarea>
                                <button type="button" onclick="hapus('measure<?php echo $row['id_objective'].$key['id_measure']?>','measurebutton<?php echo $row['id_objective'].$key['id_measure']?>');" class="btn btn-default" name="buttonhapus" id="measurebutton<?php echo $row['id_objective'].$key['id_measure']?>" style="margin-bottom: 5px; margin-top: 0;">hapus</button> 
                              <?php endforeach ?>

                              <?php for ($i=1; $i < 6; $i++) : ?>
                              <div id="<?php echo $i ?>measurebaru<?php echo $row['id_objective']?>" style="display: none">
                                <textarea name="moremeasure[]" style="width: 88%;" placeholder="tambah measure baru disini" ></textarea>
                              </div>
                              <?php endfor ?>  

                              <button type="button" class="btn btn-default" onclick="tambahMeasure('measurebaru<?php echo $row['id_objective']?>')">
                                Tambah Measure
                              </button>
                              <!-- <button type="button" id=measure_add_input_button class="btn btn-default" onclick="tambahmeasurebaru('measurebaru<?php echo $row['id_objective']?>')">tambah measure</button> -->
                                <hr>
                              </div>

                              <div class="col-md-2">
                                <label>Action CSF</label>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_action as $key): ?>
                                <input type="hidden" name="id_action[]" value="<?php echo $key['id_action'] ?>">
                                <textarea id="action<?php echo $row['id_objective']?><?php echo $key['id_action']?>" name="action[]" style="width: 88%"><?php echo $key['action']?></textarea>
                                <button type="button" onclick="hapus('action<?php echo $row['id_objective']?><?php echo $key['id_action']?>','actionbutton<?php echo $row['id_objective']?><?php echo $key['id_action']?>');" id="actionbutton<?php echo $row['id_objective']?><?php echo $key['id_action']?>" class="btn btn-default">hapus</button>
                              <?php endforeach ?>

                              <?php for ($i=1; $i < 6; $i++) : ?>
                              <div id="<?php echo $i ?>actionbaru<?php echo $row['id_objective']?>" style="display: none">
                                <textarea name="moreaction[]" style="width: 88%;" placeholder="tambah action baru disini" ></textarea>
                              </div>
                              <?php endfor ?>  
                              
                              <button type="button" class="btn btn-default" onclick="tambahAction('actionbaru<?php echo $row['id_objective']?>')">
                                Tambah Action
                              </button>
                                <hr>
                              </div>

                              <div class="col-md-2">
                                <label>IS Need</label><br><label style="font-size: 10px">*apabila anda hendak memperbaharui sistem informasi yang telah tersedia, maka isi kolom detail dengan fitur yang ingin ditambahkan pada sistem informasi tersebut</label>
                              </div>
                              <div class="col-md-10">
                              <?php foreach ($data_isneed as $key): ?>
                                <input type="hidden" name="id_isneed[]" value="<?php echo $key['id_isneed'] ?>">
                                <label id="isneedname<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>"><?php echo $key['isneed']?></label><br>

                                <textarea id="isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>" name="isneed[]" style="width: 88%" placeholder="detail"><?php echo $key['detail']?></textarea>
                                <select name="isneed_strategic[]" id="isneed_strategic<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>" style="width: 70%">
                                  <option value="">Pilih Termasuk ke Dalam Strategic Seperti Apa Sistem Informasi Yang Akan Dibangun</option>
                                  <option value="KO" <?php if ($key['bagan'] == 'KO'): ?>
                                    selected
                                  <?php  endif ?>>Key Operational</option>
                                  <option value="ST" <?php if ($key['bagan'] == 'ST'): ?>
                                    selected
                                  <?php  endif ?>>Strategic</option>
                                  <option value="HP" <?php if ($key['bagan'] == 'HP'): ?>
                                    selected
                                  <?php  endif ?>>High Potential</option>
                                  <option value="SP" <?php if ($key['bagan'] == 'SP'): ?>
                                    selected
                                  <?php  endif ?>>Support</option>
                                </select>
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
                                <button type="button" onclick="hapus('isneed<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneedbutton<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneedbutton2<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneedname<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>','isneed_strategic<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>');" class="btn btn-default" id="isneedbutton<?php echo $row['id_objective']?><?php echo $key['id_isneed']?>">hapus</button>
                              <?php endforeach ?>
                              <br/>
                              <br/>
                              <?php for ($i=1; $i < 6; $i++) : ?>
                              <div id="<?php echo $i ?>isneedbaru<?php echo $row['id_objective']?>" style="display: none">
                                <select name="moreisneed[]">
                                  <option value="">Pilih Kebutuhan Sistem Informasi</option>
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
                                <select name="moreisneed_desc[]">
                                  <option value="Buat Baru">Buat Baru</option>
                                  <option value="Perbaharui">Perbaharui</option>
                                  <option value="Beli">Beli</option>
                                </select>
                                <textarea placeholder="detail" name="moreisneed_detail[]" style="width: 70%; "></textarea>
                                <select name="moreisneed_strategic[]">
                                  <option value="">Pilih Termasuk ke Dalam Strategic Seperti Apa Sistem Informasi Yang Akan Dibangun</option>
                                  <option value="KO">Key Operational</option>
                                  <option value="ST">Strategic</option>
                                  <option value="HP">High Potential</option>
                                  <option value="SP">Support</option>
                                </select>
                                <br/>
                                <br/>
                              </div>
                              <?php endfor ?>  
                              <button type="button" class="btn btn-default" onclick="tambahIsneed('isneedbaru<?php echo $row['id_objective']?>')">
                                  Tambah Isneed
                              </button>
                                <!-- <textarea name="moreisneed" id="moreisneed" style="width: 75%;" placeholder="tambah isneed disini"></textarea>
                                <select name="moreisneed_desc" required="">
                                  <option value="Buat Baru">Buat Baru</option>
                                  <option value="Perbaharui">Perbaharui</option>
                                  <option value="Beli">Beli</option>
                                </select> -->
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
                              <?php if ($data_isneed[$key]['Tipe'] == "Perbaharui"): ?>
                              <td ><?php echo $data_isneed[$key]['detail']?> pada <?php echo $data_isneed[$key]['isneed']?></td>
                              <?php else: ?>
                              <td ><?php echo $data_isneed[$key]['isneed']?></td>
                              <?php endif ?>
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
                            <?php if ($data_isneed[$key]['Tipe'] == "Perbaharui"): ?>
                              <td ><?php echo $data_isneed[$key]['detail']?> pada <?php echo $data_isneed[$key]['isneed']?></td>
                              <?php else: ?>
                              <td ><?php echo $data_isneed[$key]['isneed']?></td>
                              <?php endif ?>
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
                          <?php if ($data_isneed[$key]['Tipe'] == "Perbaharui"): ?>
                              <td ><?php echo $value['detail']?> pada <?php echo $value['isneed']?></td>
                              <?php else: ?>
                              <td ><?php echo $value['isneed']?></td>
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
<!-- </section> -->

<!-- <section class="section-gray"> -->
    <div class="row services">
      <div class="col-md-12">
        <div class="row">
          <div class="container">
            <div class="panel panel-default">
              <div class="panel-body">
                <?php foreach ($data_version as $key): ?>
                  <?php  
                  $data_objective_past = $this->User_model->getDataWhere3('t_objective', 'id_user', $id, 'id_kategori_analisis', $kategori,'version', $key['version']);
                  ?>
                  <h5>PAST ANALYSIST <?php echo $key['version'] ?></h5>
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
                      <?php foreach($data_objective_past as $row){ ?>
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
                        <div id="upto<?php echo $row['id_objective']?>" class="modal fade" role="dialog" >
                        <form action="<?php echo base_url();?>analisis/usulkan_analisis" method="POST">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <label class="modal-title">Apakah anda akan mengusulkan kembali analisis ini ? Perubahan dapat dilakukan setelah analisis diusulkan</label>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="kategori" value="<?php echo $kategori ?>">
                                <input type="hidden" name="objective" value="<?php echo $row['objective']?>">
                                <b>Objective</b><br>
                                <label><?php echo $row['objective']?></label><br><br>

                                <b>Measure</b><br>
                                  <?php foreach ($data_measure as $key): ?>
                                  <input type="hidden" name="measure[]" value="<?php echo $key['measure']?>">
                                    <label><?php echo $key['measure']?></label><br>
                                  <?php endforeach ?><br>

                                <b> Action CSF</b><br>
                                  <?php foreach ($data_action as $key): ?>
                                  <input type="hidden" name="action[]" value="<?php echo $key['action']?>">
                                    <b><label><?php echo $key['action']?></label><br>
                                  <?php endforeach ?><br>

                                <b>IS Need</b><br>
                                  <?php foreach ($data_isneed as $key): ?>
                                  <input type="hidden" name="isneed[]" value="<?php echo $key['isneed']?>">
                                  <input type="hidden" name="isneed_detail[]" value="<?php echo $key['detail']?>">
                                  <input type="hidden" name="isneed_strategic[]" value="<?php echo $key['bagan']?>">
                                  <input type="hidden" name="isneed_desc[]" value="<?php echo $key['Tipe']?>">
                                    <label><?php echo $key['isneed']?></label><br>
                                  <?php endforeach ?>
                            </div>                            
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Usulkan</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
                              </div>
                            </div>
                          </div>
                        </form>
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
                                <a href="" data-toggle="modal" data-target="#upto<?php echo $row['id_objective']?>"><i class="fa fa-level-up"></i></a> 
                                
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
                                <a href="" data-toggle="modal" data-target="#upto<?php echo $row['id_objective']?>"><i class="fa fa-level-up"></i></a> 
                              
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
                                <a href="" data-toggle="modal" data-target="#upto<?php echo $row['id_objective']?>"><i class="fa fa-level-up"></i></a> 
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
                        <a href="" data-toggle="modal" data-target="#upto<?php echo $row['id_objective']?>"><i class="fa fa-level-up"></i></a> 
                        </td>
                      </tr>
                      <?php

                    } endif ?>
                    <?php } ?>
                  </tbody>
                </table>
            <?php endforeach ?>
            </div>  
          </div>
        </div>
      </div>
    </div>
<!-- </section> -->