<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        $("#measure_add_input").click(function(event){
            var measureadd = "<input type='text' name='measureadd[]' placeholder='' required></input>";
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
            $("#isneed_quotes").append(isneedadd);
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
    </script>


<div id="tambahanalisis" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">tambah analisis</h4>
          </div>
          <div class="modal-body">
          	<form action="<?php echo base_url();?>home/input" method="POST">
<!--               <input type="hidden" name="id_user" value="<?php echo $id ?>"> -->
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
							<div id="isneed_quotes"></div>
							<input type="button" id=isneed_add_input value="+ add isneed"  class="btn btn-default" onClick="onClickisneed()">
	          		</div>
          		</div>
          </div>

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
    <div class="row">
      <div class="container" style="margin-top:50px">
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
                <?php $counter=1; ?>
                <?php foreach($data_objective as $row){ ?>
                  <div id="editanalisis<?php echo $row->id_objective?><?php echo $row->id_analisis?>" class="modal fade" role="dialog" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">edit analisis</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url();?>home/edit" method="POST">
                            <div class="row">
                              <div class="col-md-3">
                                <label>Objective</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="objective" value="<?php echo $row->objective?>" style="width: 100%"  required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <label>Measure</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="measure" value="<?php echo $row->measure?>" style="width: 100%"  required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <label>Action</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="action" value="<?php echo $row->action?>" style="width: 100%" required>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <label>IS Need</label>
                              </div>
                              <div class="col-md-9">
                                <input type="text" name="isneed" value="<?php echo $row->isneed?>" style="width: 100%"  required>
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="id_objective" value="<?php echo $row->id_objective ?>">
                        <input type="hidden" name="id_analisis" value="<?php echo $row->id_analisis ?>">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i> Edit</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
                      </div>
                      </form>
                    </div>
                 </div>
              </div>
              <div id="hapusanalisis<?php echo $row->id_objective?><?php echo $row->id_analisis?>" class="modal fade" role="dialog" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Pilihan Hapus Analisis</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url();?>home/hapus" method="POST">
                            <input type="radio" name="hapuschoice" value="all">Hapus Semua Analisis Termasuk Objective <br>(Semua Analisis yang termasuk dalam objective tersebut ikut terhapus)<br>
                            <input type="radio" name="hapuschoice" value="analisis" checked>Hapus Baris Analisis Ini <br>
                        </div>
                        <input type="hidden" name="id_objective" value="<?php echo $row->id_objective ?>">
                        <input type="hidden" name="id_analisis" value="<?php echo $row->id_analisis ?>">
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i> Hapus</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
                      </div>
                      </form>
                    </div>
                 </div>
              </div>
              <!-- <script type="text/javascript">
                $(function(){
                    $("#measure_add_input<?php echo $row->id_analisis ?>").click(function(event){
                        var measureadd<?php echo $row->id_analisis ?> = "<input type='text' name='measure1[]' placeholder='' required></input>";
                        $("#measure_quotes<?php echo $row->id_analisis ?>").append(measureadd<?php echo $row->id_analisis ?>);
                        $("#measure_quotes<?php echo $row->id_analisis ?>").append("\n<br />");
                    });
                });
            </script>
            <script type="text/javascript">
                $(function(){
                    $("#action_add_input<?php echo $row->id_analisis ?>").click(function(event){
                        var actionadd<?php echo $row->id_analisis ?> = "<input type='text' name='action1[]' placeholder='' required></input>";
                        $("#action_quotes<?php echo $row->id_analisis ?>").append(actionadd<?php echo $row->id_analisis ?>);
                        $("#action_quotes<?php echo $row->id_analisis ?>").append("\n<br />");
                    });
                });
            </script>
            <script type="text/javascript">
                $(function(){
                    $("#isneed_add_input<?php echo $row->id_analisis ?>").click(function(event){
                        var isneedadd<?php echo $row->id_analisis ?> = "<input type='text' name='isneed1[]' placeholder='' required></input>";
                        $("#isneed_quotes<?php echo $row->id_analisis ?>").append(isneedadd<?php echo $row->id_analisis ?>);
                        $("#isneed_quotes<?php echo $row->id_analisis ?>").append("\n<br />");
                    });
                });
            </script>
            <script type="text/javascript">
                var jumlah_measure<?php echo $row->id_analisis ?> = 0;
                var jumlah_action<?php echo $row->id_analisis ?> = 0;
                var jumlah_isneed<?php echo $row->id_analisis ?> = 0;

                function onClickmeasure<?php echo $row->id_analisis ?>() {
                    jumlah_measure<?php echo $row->id_analisis ?> += 1;
                    document.getElementById("jmeasure<?php echo $row->id_analisis ?>").value = jumlah_measure<?php echo $row->id_analisis ?>;
                };
                function onClickaction<?php echo $row->id_analisis ?>() {
                    jumlah_action<?php echo $row->id_analisis ?> += 1;
                    document.getElementById("jaction<?php echo $row->id_analisis ?>").value = jumlah_action<?php echo $row->id_analisis ?>;
                };
                function onClickisneed<?php echo $row->id_analisis ?>() {
                    jumlah_isneed<?php echo $row->id_analisis ?> += 1;
                    document.getElementById("jisneed<?php echo $row->id_analisis ?>").value = jumlah_isneed<?php echo $row->id_analisis ?>;
                };
            </script> -->

              <div id="tambah1analisis<?php echo $row->id_objective?>" class="modal fade" role="dialog" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Tambah Satu Baris Analisis</h4>
                        </div>
                        <div class="modal-body">
                          <form action="<?php echo base_url();?>home/input1" method="POST">
                            <div class="row">
                              <div class="col-md-4">
                                <label>Objective</label>
                              </div>
                              <div class="col-md-8">
                                <input type="text" name="objective" value="<?php echo $row->objective ?>" disabled>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Measure</label>
                              </div>
                              <div class="col-md-8">
                                <input type="text" name="measure" required>
                            <!-- <div id="measure_quotes<?php echo $row->id_analisis ?>"></div>
                            <input type="button" id=measure_add_input<?php echo $row->id_analisis ?> value="+ add measure" class="btn btn-default" onClick="onClickmeasure<?php echo $row->id_analisis ?>()"> -->
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label>Action</label>
                              </div>
                              <div class="col-md-8">
                                <input type="text" name="action" required>
                            <!-- <div id="action_quotes<?php echo $row->id_analisis ?>"></div>
                            <input type="button" id=action_add_input<?php echo $row->id_analisis ?> value="+ add action" class="btn btn-default" onClick="onClickaction<?php echo $row->id_analisis ?>()" > -->
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <label>IS Need</label>
                              </div>
                              <div class="col-md-8">
                                <input type="text" name="isneed" required>
                            <!-- <div id="isneed_quotes<?php echo $row->id_analisis ?>"></div>
                            <input type="button" id=isneed_add_input<?php echo $row->id_analisis ?> value="+ add isneed"  class="btn btn-default" onClick="onClickisneed<?php echo $row->id_analisis ?>()"> -->
                              </div>
                            </div>
                        </div>
                        <input type="hidden" name="huhu[]" value="s">
                        <input type="hidden" name="huhu[]" value="W">
                        <input type="hidden" name="huhu[]" value="e">
                        <input type="hidden" name="huhu[]" value="q">
                        <input type="hidden" name="id_objective" value="<?php echo $row->id_objective ?>">
                        <input type="hidden" name="id_analisis" value="<?php echo $row->id_analisis ?>">
                        <!-- <input type="hidden" name="jumlah_measure<?php echo $row->id_analisis ?>" id="jmeasure<?php echo $row->id_analisis ?>"> -->
                        <!-- <input type="hidden" name="jumlah_action<?php echo $row->id_analisis ?>" id="jaction<?php echo $row->id_analisis ?>"> -->
                        <!-- <input type="hidden" name="jumlah_isneed<?php echo $row->id_analisis ?>" id="jisneed<?php echo $row->id_analisis ?>"> -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-default" name="submitted"><i class="fa fa-cross"></i> Tambah</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
                      </div>
                      </form>
                    </div>
                 </div>
              </div>
                  <?php $count = $this->User_model->countwhere('t_t', 'id_objective', $row->id_objective); ?>
                  <tr>
                    <?php if ($counter == 1): ?>
        						  <td rowspan="<?php echo $count ?>"><?php echo $row->objective ?></td>
                    <?php endif ?>
                    <td><?php echo $row->measure ?></td>
                    <td><?php echo $row->action ?></td>
                    <td><?php echo $row->isneed ?></td>
                    <td>
                      <a href="" data-toggle="modal" data-target="#editanalisis<?php echo $row->id_objective?><?php echo $row->id_analisis?>"><i class="fa fa-edit"></i></a> 
                      <a href="" data-toggle="modal" data-target="#hapusanalisis<?php echo $row->id_objective?><?php echo $row->id_analisis?>"><i class="fa fa-trash"></i></a> 
                      <a href="" data-toggle="modal" data-target="#tambah1analisis<?php echo $row->id_objective ?>"><i class="fa fa-plus"></i></a>
                    </td>
	              	</tr>
                  <?php $counter++; ?> 
                  <?php if ($counter > $count): ?>
                    <?php  $counter = 1;
                  ?>
                  <?php endif ?>
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
