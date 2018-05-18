<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
    function tambah(link){
    var nama_hardware = "<label style='font-size:11px'>Jenis Kebutuhan teknologi informasi</label><br/><select name='nama_hardware[]'><option value=''>Pilih Kebutuhan Teknologi Informasi</option><?php foreach ($jenis_hardware as $key): ?><optgroup label='<?php echo $key->deskripsi ?>'><?php $pilihan = $this->User_model->getDataWhere('t_pilihan_hardware', 'jenis', $key->nama); ?><?php foreach ($pilihan as $row): ?><option value='<?php echo $row['nama'] ?>'><?php echo $row['nama'] ?></option><?php endforeach ?></optgroup><?php endforeach ?></select><br/>";
    var kebutuhan = "<label style='font-size:11px'>Detail Kebutuhan teknologi informasi</label><br/><textarea placeholder='Tulis detail kebutuhan teknologi informasi disini' name='detail_kebutuhan_hardware[]' placeholder='' style='width:85%;' required ></textarea>";
    var jumlah = "<label style='font-size:11px'>Jumlah yang dibutuhkan</label><br/><input type='number' name='jumlah[]' style='width:15%;' placeholder='jumlah' required></input><br/><hr>";
    var id_sistem_informasi = "<input type='hidden' name='id_isneed[] 'value='"+link+"'></input>";
    $(document.getElementById(link)).append(nama_hardware);
    $(document.getElementById(link)).append(kebutuhan);
    $(document.getElementById(link)).append(jumlah);
    $(document.getElementById(link)).append(id_sistem_informasi);

  }
</script>
<style type="text/css">
	.btn-a-roadmap{
		border-color: grey;
	}
	.btn-a-left{
		border-left: none;
	}
</style>

<section id="rekomendasi" class="section-gray">
  	<div class="container clearfix">
  			<center>
  			status pengisian pembobotan: <?php echo $total." dari ".$total_user." user" ?>
  			<?php if ($total == $total_user): ?>
  				<i class="fa fa-check"></i>
  			<?php endif ?>
  			<br>
  			<?php if ($status_hardware == 0): ?>
	  			status pengisian kebutuhan teknologi informasi : belum selesai
	  			<br>
	  			apabila anda dari departemen IT, mohon isi terlebih dahulu kebutuhan teknologi informasi 
			<?php else: ?>
	  			status pengisian kebutuhan teknologi informasi : selesai <i class="fa fa-check"></i>
  			<?php endif ?>
      		<br>
  			</center>
  		<?php if (($total == $total_user)&&($status_hardware==1)): ?>
  			<center><a class="btn btn-a-roadmap" href="<?php echo base_url(); ?>home/rekomendasi">hasil roadmap</a></center>
  		<?php else: ?>
			<center>mohon tunggu hingga semua user telah mengisi pembobotan, dan bagian IT telah mengisi kebutuhan teknologi informasi</center>
  		<?php endif ?>
    	<div class="row services">
      		<div class="col-md-12">
      			
      			<?php if ($departement == "IT"): ?>
      				<div class="row">
          			<div class="container" style="margin-top:50px">
      				<label style="font-size: 15px;"><b>Tabel roadmap kebutuhan</b></label>
              			<div class="panel-body" style="padding:0px">
							<form action="<?php echo base_url(); ?>roadmap/hardwareneed" method="POST">
            					<table class="table table-striped table-bordered" style="margin:0px">
                  					<thead>
										<tr>
											<th style="text-align:center;" width="20">NO</th>
											<th>Kebutuhan Sistem Informasi</th>
											
											<th>Tipe Pembuatan</th>
											<th>Kebutuhan Teknologi Informasi</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
											
										<?php foreach ($perbandingan_semua as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													
													<td><?php echo $key->Tipe ?></td>
													<td id="<?php echo $key->id_isneed; ?>" style="width: 40%;">
														<?php 
															$kebutuhan_hardware = $this->User_model->getDataWhere('t_kebutuhan_hardware', 'id_isneed', $key->id_isneed);
														 ?>
														<?php foreach ($kebutuhan_hardware as $kebutuhan_hardware): ?>
															
															<div id="hapusanalisis<?php echo $kebutuhan_hardware['id']?>" class="modal fade" role="dialog" >
										                      <div class="modal-dialog">
										                        <div class="modal-content">
										                          <div class="modal-header">
										                            <button type="button" class="close" data-dismiss="modal">&times;</button>
										                            <label class="modal-title">Hapus Kebutuhan teknologi informasi Ini ?</label>
										                          </div>
										                          <div class="modal-body">
										                            <label>Apakah Anda Yakin Ingin Menghapus Kebutuhan teknologi informasi Ini ?</label>
										                          </div>
										                          <form action="<?php echo base_url();?>roadmap/delete" method="POST">
										                            <input type="hidden" name="id" value="<?php echo $kebutuhan_hardware['id'] ?>">
										                            <div class="modal-footer">
										                              <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Hapus</button>
										                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
										                            </div>
										                          </form>
										                        </div>
										                      </div>
										                    </div>

										                    <div id="editanalisis<?php echo $kebutuhan_hardware['id']?>" class="modal fade" role="dialog" >
										                        <form action="<?php echo base_url();?>roadmap/edit" method="POST">
										                      		<div class="modal-dialog">
										                        		<div class="modal-content">
										                          			<div class="modal-header">
										                            			<button type="button" class="close" data-dismiss="modal">&times;</button>
													                            <label class="modal-title">Edit Kebutuhan teknologi informasi</label>
													                        </div>
												                          	<div class="modal-body">
										                            			<input type="hidden" name="id" value="<?php echo $kebutuhan_hardware['id'] ?>">
										                            			<label>kebutuhan teknologi informasi</label><br>
												                            	<input type="text" name="nama_hardware" value="<?php echo $kebutuhan_hardware['nama'] ?>">
												                            	<br>
												                            	<label>detail kebutuhan</label><br>
												                            	<textarea name="detail_kebutuhan_hardware" style="width: 100%"><?php echo $kebutuhan_hardware['detail'] ?></textarea>
												                            	<br>
												                            	<label>jumlah yang dibutuhkan</label><br>
												                            	<input type="number" name="jumlah" value="<?php echo $kebutuhan_hardware['jumlah'] ?>">

												                        	</div>
												                            <div class="modal-footer">
													                            <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Simpan</button>
										                              			<button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
												                          	</div>
											                          	</div>
											                        </div>
										                        </form>
										                    </div>

															<div class="row">
																<div class="col-md-9">
																	<?php echo $kebutuhan_hardware['jumlah']." ".$kebutuhan_hardware['nama']." ".$kebutuhan_hardware['detail']; ?>
																</div>
																<div class="col-md-3">
																	<a href=""  class="btn btn-a-roadmap" data-toggle="modal" data-target="#editanalisis<?php echo $kebutuhan_hardware['id']?>"><i class="fa fa-pencil"></i></a><a href=""  class="btn btn-a-roadmap btn-a-left" data-toggle="modal" data-target="#hapusanalisis<?php echo $kebutuhan_hardware['id']?>"><i class="fa fa-trash"></i></a>
																</div>
															</div>
															<br>
														<?php endforeach ?>
													<hr>		
													</td>
													<td><button type="button" class="btn" onclick="tambah('<?php echo $key->id_isneed; ?>')">Tambah</button></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
								<button type="submit" name="submit" value="save"  class="btn">save</button>
								<button type="submit" name="submit" value="end" class="btn">selesai</button>
							</form>
						</div>
					</div>
				</div>
      			<?php endif ?>
      			<div class="row">
          			<div class="container" style="margin-top:50px">
      				<label style="font-size: 15px;"><b>Tabel roadmap kebutuhan</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kebutuhan Sistem Informasi</th>
										<th>Tipe</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_semua as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													<td><?php echo $key->Tipe ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>

        		<div class="row">
          			<div class="container" style="margin-top:50px">
      				<label style="font-size: 15px;"><b>tabel hasil perbandingan kriteria</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_kriteria as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<td><?php echo $key->nama_kriteria ?></td>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				</div>
				
          			<div class="container" style="margin-top:50px">
      				<label style="font-size: 15px;"><b>tabel hasil per kriteria Finance</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_finance as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				
				
          			<div class="container" style="margin-top:50px">
					<label style="font-size: 15px;"><b>tabel hasil per kriteria Customer</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_customer as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>
				
				
          			<div class="container" style="margin-top:50px">
					<label style="font-size: 15px;"><b>tabel hasil per kriteria Internal Business</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_internal as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>
					</div>

				
          			<div class="container" style="margin-top:50px">
      				<label style="font-size: 15px;"><b>tabel hasil per kriteria Learning and Growth</b></label>
              			<div class="panel-body" style="padding:0px">
                			<table class="table table-striped table-bordered" style="margin:0px">
                  				<thead>
									<tr>
										<th style="text-align:center;" width="20">NO</th>
										<th>Kriteria</th>
										<th style="text-align:center;">Nilai</th>
									</tr>
									</thead>
									<tbody>
										<?php
										$counter = 1;
										?>
										<?php foreach ($perbandingan_learning as $key): ?>
												<tr>
													<td style="text-align:center;"><?php echo $counter ?></td>
													<?php if ($key->Tipe == "Perbaharui"): ?>
														<td><?php echo $key->detail ?> pada <?php echo $key->isneed ?></td>
													<?php else: ?>
														<td><?php echo $key->isneed ?></td>
													<?php endif ?>
													<td><?php echo $key->nilai_hasil ?></td>
												</tr>
											<?php $counter++; ?>
										<?php endforeach ?>
									</tbody>
								</table>
						</div>

				</div>
			</div>
		</div>
	</div>
</section>