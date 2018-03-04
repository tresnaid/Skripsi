<div id="tambahkriteria" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">tambah kriteria</h4>
          </div>
          <div class="modal-body">
          	<form action="home/tambahkriteria" method="POST">
          		<label>Nama Kriteria</label>
          		<input type="text" name="nama_kriteria" required>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i> Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
        </div>
      	</form>
      </div>
   </div>
</div>
<div id="tambahalternatif" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">tambah alternatif</h4>
          </div>
          <div class="modal-body">
          	<form action="home/tambahalternatif" method="POST">
          		<label>Nama Alternatif</label>
          		<input type="text" name="nama_alternatif" required>
          </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i> Tambah</button>
          <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
        </div>
      	</form>
      </div>
   </div>
</div>
<section id="kriteria" class="section-gray">
      <div class="container clearfix">
        <div class="row services">
          <div class="col-md-12">
            <h2 class="heading">Data Kriteria</h2>
            <div class="row">
              <div class="container" style="margin-top:50px">
                <div class="panel panel-default">
                    <div style="margin:7px">
                      <div class="col-xs-6">
                      <div class="btn-group">
                        <a class="btn btn-default" data-toggle="modal" data-target="#tambahkriteria"><span>Tambah Kriteria</span></a>
                      </div>
                      </div>
                      <div class="col-xs-6 pull-right form-group">
                           <input type="text" class="form-control" style="border-radius:0px" placeholder="Search">
                      </div>
                    </div>
                  <div class="panel-body" style="padding:0px">
                    <table class="table table-striped table-bordered" style="margin:0px">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Kriteria</th>
                          <th style="width:100px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php $no = 1; ?>
						<?php foreach ($informasi_kriteria as $row): ?>
						<form action="home/editkriteria" method="POST">
							<div id="detail<?php echo $row->id_kriteria ?>" class="modal fade" role="dialog" >
						      	<div class="modal-dialog">
						            <div class="modal-content">
						            	<div class="modal-header">
						                	<button type="button" class="close" data-dismiss="modal">&times;</button>
						                	<h4 class="modal-title">Edit Kriteria</h4>
						            	</div>
						            	<div class="modal-body">
							              		<label>Nama Kriteria</label>
							              		<input type="text" name="nama_kriteria" value="<?php echo $row->nama_kriteria ?>">
							              		<input type="hidden" name="id_kriteria" value="<?php echo $row->id_kriteria ?>">
						            	</div>
						            	<div class="modal-footer">
							              <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i> Simpan</button>
							              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
						            	</div>
						      		</div>
								</div>
							</div>
						</form>
						<form action="home/hapuskriteria" method="POST">
							<div id="hapus<?php echo $row->id_kriteria ?>" class="modal fade" role="dialog" >
						      	<div class="modal-dialog">
						            <div class="modal-content">
						            	<div class="modal-header">
						                	<button type="button" class="close" data-dismiss="modal">&times;</button>
						                	<h4 class="modal-title">Hapus Kriteria</h4>
						            	</div>
						            	<div class="modal-body">
						            		apakah anda yakin akan menghapus kriteria ini ?
						            	</div>
						            	<div class="modal-footer">
						      			<input type="hidden" name="id_kriteria" value="<?php echo $row->id_kriteria ?>">
							              <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i>Ya</button>
							              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
						            	</div>
						      		</div>
								</div>
							</div>
						</form>
						<tr>	
	                        <td><?php echo $no ?></td>
	                        <td><?php echo $row->nama_kriteria ?></td>
	                        <td>
	                          <button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#detail<?php echo $row->id_kriteria ?>">
	                            <span class="glyphicon glyphicon-pencil"></span>
	                          </button>
	                          <button type="button" class="remove-news btn btn-xs btn-default"  data-toggle="modal" data-target="#hapus<?php echo $row->id_kriteria ?>">
	                            <span class="glyphicon glyphicon-trash"></span>
	                          </button>
	                        </td> 
						</tr>
        				<?php $no++; ?>
       					<?php endforeach ?>
                      </tbody> 
                    </table>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="alternatif" class="section-gray">
      <div class="container clearfix">
        <div class="row services">
          <div class="col-md-12">
            <h2 class="heading">Data Alternaif</h2>
            <div class="row">
              <div class="container" style="margin-top:50px">
                <div class="panel panel-default">
                    <div style="margin:7px">
                      <div class="col-xs-6">
                      <div class="btn-group">
                        <a class="btn btn-default" data-toggle="modal" data-target="#tambahalternatif"><span>Tambah Alernatif</span></a>
                      </div>
                      </div>
                      <div class="col-xs-6 pull-right form-group">
                           <input type="text" class="form-control" style="border-radius:0px" placeholder="Search">
                      </div>
                    </div>
                  <div class="panel-body" style="padding:0px">
                    <table class="table table-striped table-bordered" style="margin:0px">
                      <thead>
                      	<tr>
                          <th>No</th>
                          <th>Alternatif</th>
                          <th style="width:100px">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      	<?php $no = 1; ?>
	
						<?php foreach ($informasi_alternatif as $row): ?>
						<form action="home/editalternatif" method="POST">
							<div id="detail<?php echo $row->id_alternatif ?>" class="modal fade" role="dialog" >
						      	<div class="modal-dialog">
						            <div class="modal-content">
						            	<div class="modal-header">
						                	<button type="button" class="close" data-dismiss="modal">&times;</button>
						                	<h4 class="modal-title">Edit Alternatif</h4>
						            	</div>
						            	<div class="modal-body">
							              		<label>Nama Alternatif</label>
							              		<input type="text" name="nama_alternatif" value="<?php echo $row->nama_alternatif ?>">
							              		<input type="hidden" name="id_alternatif" value="<?php echo $row->id_alternatif ?>">
						            	</div>
						            	<div class="modal-footer">
							              <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i> Simpan</button>
							              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
						            	</div>
						      		</div>
								</div>
							</div>
						</form>
						<form action="home/hapusalternatif" method="POST">
							<div id="hapus<?php echo $row->id_alternatif ?>" class="modal fade" role="dialog" >
						      	<div class="modal-dialog">
						            <div class="modal-content">
						            	<div class="modal-header">
						                	<button type="button" class="close" data-dismiss="modal">&times;</button>
						                	<h4 class="modal-title">Hapus alternatif</h4>
						            	</div>
						            	<div class="modal-body">
						            		apakah anda yakin akan menghapus alternatif ini ?
						            	</div>
						            	<div class="modal-footer">
						      			<input type="hidden" name="id_alternatif" value="<?php echo $row->id_alternatif ?>">
							              <button type="submit" class="btn btn-default" ><i class="fa fa-cross"></i>Ya</button>
							              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i> Close</button>
						            	</div>
						      		</div>
								</div>
							</div>
						</form>
                        
                      	<tr>
		                    <td class=""><?php echo $no ?></td>
		                    <td class=""><?php echo $row->nama_alternatif ?></td>
                        <td>
                      		
                          <button type="button" class="btn btn-xs btn-default" data-toggle="modal" data-target="#detail<?php echo $row->id_alternatif ?>">
	                            <span class="glyphicon glyphicon-pencil"></span>
	                          </button>
                          <button type="button" data-bind="click: $parent.remove" class="remove-news btn btn-xs btn-default" data-toggle="modal" data-target="#hapus<?php echo $row->id_alternatif ?>">
                            <span class="glyphicon glyphicon-trash"></span>
                          </button>
                        </td>   
                      	</tr>
                      	<?php $no++; ?>
       					<?php endforeach ?>
                      </tbody> 
                    </table>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>