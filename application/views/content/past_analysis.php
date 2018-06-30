<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/roadmap/style.css">
<style type="text/css">
	body{
		background: white;
		padding: 0 0;
	}.number{
		color: green;
		font-size: 9px;
		padding-left: 17%;
		padding-right: 10%;
		padding-top: 1px;
	}
</style>
<?php if (!empty($data_version)): ?>
	
<?php foreach ($data_version as $key): ?>
	<?php 
		$hasil = $this->User_model->hasil_fuzzy2('t_isneed','t_roadmap', 't_isneed.id_isneed=t_roadmap.id_isneed', 't_isneed.version', $key->version);
	 	$KO = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'KO', 'version', $key->version);
		$SP = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'SP', 'version', $key->version);
		$HP = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'HP', 'version', $key->version);
		$ST = $this->User_model->getDataWhere2('t_isneed', 'bagan', 'ST', 'version', $key->version);
	 ?>
 <!-- <section class="section-gray"> -->
 	<div class="container clearfix">
		<h3><?php echo $key->version ?></h3>
		<div class="row services">
		  	<div class="col-md-12">
		    	
				<div class="container">
		    	<h5>ROADMAP IMPLEMENTASI SISTEM INFORMASI</h5>
				 	<div class="flex-parent">
						<div class="input-flex-container">
							<?php foreach ($hasil as $row): ?>
							<div class="input">
								<?php if ($row->Tipe == "Perbaharui"): ?>
									<span data-info="<?php echo $row->detail ?> pada <?php echo $row->isneed ?>"></span>
									<span data-year="tambah fitur <?php echo $row->detail ?>"></span>
								<?php else: ?>
									<span data-info="<?php echo $row->isneed ?>"></span>
									<span data-year="<?php echo $row->Tipe ?>"></span>
								<?php endif ?>
							</div>
								
							<?php endforeach ?>
						</div>
					</div>
			<table class="table table-striped table-bordered" style="margin:0px">
	      				<thead>
							<tr>
								<th style="text-align:center;" width="20">NO</th>
								<th>Kebutuhan Sistem Informasi</th>
								<th>Tipe</th>
								<th style="text-align:center;">Nilai</th>
								<th style="text-align:center;">action</th>
							</tr>
							</thead>
							<tbody>
								<?php
								$counter = 1;
								?>
								<?php foreach ($hasil as $key): ?>	
									<div id="detail<?php echo $key->id_objective?>" class="modal fade" role="dialog" >
				                      <div class="modal-dialog">
				                        <div class="modal-content">
				                          <div class="modal-header">
				                            <button type="button" class="close" data-dismiss="modal">&times;</button>
				                            <label class="modal-title">Detail Analisis</label>
				                          </div>
				                          <div class="modal-body">
				                            <label><?php echo $key->id_objective ?></label>
				                          </div>
				                          <form action="<?php echo base_url();?>analisis/deleteAnalisis" method="POST">
				                            <div class="modal-footer">
				                              <button type="submit" class="btn btn-default"><i class="fa fa-cross"></i>Hapus</button>
				                              <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-cross"></i>Close</button>
				                            </div>
				                          </form>
				                        </div>
				                      </div>
				                    </div>
									<tr>
										<td style="text-align:center;"><?php echo $counter ?></td>
										<td><?php if ($key->Tipe == "Perbaharui"): ?>
												<?php echo $key->detail." pada ".$key->isneed ?>
												<?php else: ?>
												<?php echo $key->isneed ?>
												<?php endif ?></td>
										<td><?php echo $key->Tipe ?></td>
										<td><?php echo $key->nilai_hasil ?></td>
										<td><a href="" data-toggle="modal" data-target="#detail<?php echo $key->id_objective?>"><i class="fa fa-info"></i></a></td>
									</tr>
									<?php $counter++; ?>
								<?php endforeach ?>
							</tbody>
					</table>
					<br>
					<br>
		    	<h5>MCFARLAN GRID</h5>
		    	<table class="table table-striped table-bordered" style="margin:0px">
      				<thead>
						<tr>
							<th>Strategic</th>
							<th>High Potential</th>
						</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php foreach ($ST as $key): ?>
										<ul>
											<li>
												<?php echo $key['isneed'] ?>
											</li>
										</ul>

									<?php endforeach ?>
								</td>
								<td>
									<?php foreach ($HP as $key): ?>
										<ul>
											<li>
												<?php echo $key['isneed'] ?>
											</li>
										</ul>
									<?php endforeach ?>
								</td>
							</tr>
						</tbody>
						<thead>
							<tr>
								<th>Key Operational</th>
								<th>Support</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<?php foreach ($KO as $key): ?>
										<ul>
											<li>
												<?php echo $key['isneed'] ?>
											</li>
										</ul>
									<?php endforeach ?>
								</td>
								<td>
									<?php foreach ($SP as $key): ?>
										<ul>
											<li>
												<?php echo $key['isneed'] ?>
											</li>
										</ul>
									<?php endforeach ?>
								</td>
							</tr>
						</tbody>
					</table>
					<br><br>
		    	<h5>KEBUTUHAN TEKNOLOGI INFORMASI</h5>
					<table class="table table-striped table-bordered" style="margin:0px">
      				<thead>
						<tr>
							<th style="text-align:center;width:20px;">NO</th>
							<th>Kebutuhan Sistem Informasi</th>
							<th>Tipe Pengembangan Sistem Informasi</th>
							<th style="width:40%">Kebutuhan Teknologi Informasi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$counter = 1;
						?>
						<?php foreach ($hasil as $key): ?>	
							<?php $kebutuhan_hardware = $this->User_model->getDataWhere('t_kebutuhan_hardware', 'id_isneed', $key->id_isneed);?>
							<tr>
								<td style="text-align:center;"><?php echo $counter ?></td>
								<td><?php echo $key->isneed ?></td>
								<td><?php echo $key->Tipe ?></td>
								<td>
								<?php foreach ($kebutuhan_hardware as $kebutuhan_hardware): ?>
								<?php echo $kebutuhan_hardware['jumlah']." ".$kebutuhan_hardware['nama']." ".$kebutuhan_hardware['detail']; ?>
								<br>
								<?php endforeach ?>
								</td>
							</tr>
						<?php $counter++; ?>
						<?php endforeach ?>
						</tbody>
					</table>
					<br><br>
		    		
				</div>
			</div>
		</div>
	</div>
<!-- </section> -->
<?php endforeach ?>
<?php else: ?>
<center>ini merupakan versi pertama, belum ada hasil dari analisis sebelumnya</center>
<?php endif ?>
