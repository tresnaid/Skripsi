<script language="javascript">
	function ResetConfirm(){
		if (confirm("Anda yakin akan mengatur ulang semua nilai perbandingan kriteria ini ?")){
			return true;
		}else{
			return false;
		}
	}
	function NextConfirm(){
	if (confirm("Anda yakin dengan bobot perbandingan kriteria ini ? anda tidak dapat mengganti bobot setelah ini")){
			return true;
		}else{
			return false;
		}
	}
</script>
<?php 
	foreach($informasi as $row){
		$kriteria[]=array($row->id_kriteria,$row->nama_kriteria);
	}
	for($i=1;$i<=9;$i++){
		$selected[$i]='';
	}
?>

<form action="<?php echo base_url() ?>roadmap/insertBobotkriteria" method="post" enctype="multipart/form-data">
	<section id="kriteria" class="section-gray">
	  	<div class="container clearfix">
	    	<div class="row services">
	      		<div class="col-md-12">
	        		<h2 class="heading">Perhitungan Kriteria</h2>
	        		<div class="row">
	          			<div class="container" style="margin-top:50px">
	              			<div class="panel-body" style="padding:0px">
	                			<table class="table table-striped table-bordered" style="margin:0px">
	                  				<thead>
	                    				<tr>
					                      	<th>Nama Kriteria</th>
											<th>Nilai Perbandingan</th>
											<th>Nama Kriteria</th>
	                    				</tr>
	                  				</thead>
	                  				<tbody>
					                  	<?php 
										for($i=0;$i<count($kriteria);$i++){
											for($ii=0;$ii<count($kriteria);$ii++){
												if($i < $ii){
													$q = $this->db->query("select nilai from t_nilai_kriteria_".$id_user." where id_kriteria_1='".$kriteria[$i][0]."' and id_kriteria_2='".$kriteria[$ii][0]."'");
													if($q->num_rows() >0){
														$nilai=$q->row('nilai');
													}else{
														$data_input = array(
															'id_kriteria_1' => $kriteria[$i][0],
															'id_kriteria_2' => $kriteria[$ii][0],
															'kode' => $kriteria[$i][0].$kriteria[$ii][0],
															'nilai' => 1
														);
														$this->User_model->insertData('t_nilai_kriteria_'.$id_user, $data_input);
														$nilai = 1;
													}
													
													$selected[$nilai]='selected';
													?>
													  <tr >
														<td align="right"><?php echo $kriteria[$i][1] ?></td>
														<td align="center"><select name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>">
														<option value="1" <?php echo $selected[1]?> >1. Sama penting dengan</option>
														<option value="2" <?php echo $selected[2]?> >2. Mendekati sedikit lebih penting dari</option>
														<option value="3" <?php echo $selected[3]?> >3. Agak lebih penting dari</option>
														<option value="4" <?php echo $selected[4]?> >4. Mendekati lebih penting dari</option>
														<option value="5" <?php echo $selected[5]?> >5. Cukup penting dari</option>
														<option value="6" <?php echo $selected[6]?> >6. Mendekati sangat penting dari</option>
														<option value="7" <?php echo $selected[7]?> >7. Sangat penting dari</option>
														<option value="8" <?php echo $selected[8]?> >8. Mendekati kepentingan ekstrim dari</option>
														<option value="9" <?php echo $selected[9]?> >9. Kepentingan ekstrim dari</option>
														</select></td>
														<td><?php echo $kriteria[$ii][1] ?></td>
													  </tr>
													<?php
													$selected[$nilai]='';
												}
											}
										}
					                  	?>
	                  				</tbody> 
	               	 			</table>
	              			</div>
	            		</div>
	          		</div>
        		</div>
	      	</div>
      		<input type="hidden" name="id" value="<?php echo $id_user ?>">
		    <button type="submit" name="save" class="btn blue"><i class="icon-ok"></i> Simpan</button>
			<button type="submit" name="reset" class="btn" onclick="return(ResetConfirm());">Reset Nilai</button>
		    <button type="submit" name="next" class="btn pull-right" onclick="return(NextConfirm());">NEXT</button>
	    </div>
  	</section>
</form>


