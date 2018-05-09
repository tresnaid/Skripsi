<style type="text/css">
	.radioLabel {
    display:inline-block;
    vertical-align:top;
    text-align:center;

    /* IE 7 and below */
    *display:inline;
    *zoom:1;
}

.radioLabel * {
    display:block;
}
</style>
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
	for($i=1;$i<=17;$i++){
		$selected[$i]='';
	}
?>

<form action="<?php echo base_url() ?>roadmap/insertBobotkriteria" method="post" enctype="multipart/form-data">
	<section id="kriteria" class="section-gray">
	  	<div class="container clearfix">
	    	<div class="row services">
	      		<div class="col-md-12">
	        		<h2 class="heading">Perhitungan Kriteria</h2>
        			<label style="font-size: 12px">dalam laman ini anda diminta untuk mengisi perbandingan antara satu kriteria dengan kriteria lainnya dalam range 1-9 <br> dimana 1 berarti sama penting dan 9 berarti kepentingan mutlak dari pada kriteria lain</label>
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
														if ($nilai == 9) {
															$x = 1;
														}elseif($nilai == 8){
															$x = 2;
														}elseif($nilai == 7){
															$x = 3;
														}elseif($nilai == 6){
															$x = 4;
														}elseif($nilai == 5){
															$x = 5;
														}elseif($nilai == 4){
															$x = 6;
														}elseif($nilai == 3){
															$x = 7;
														}elseif($nilai == 2){
															$x = 8;
														}elseif($nilai == 1){
															$x = 9;
														}elseif($nilai == 0.5){
															$x = 10;
														}elseif($nilai == 0.3333){
															$x = 11;
														}elseif($nilai == 0.25){
															$x = 12;
														}elseif($nilai == 0.2){
															$x = 13;
														}elseif($nilai == 0.1667){
															$x = 14;
														}elseif($nilai == 0.1428){
															$x = 15;
														}elseif($nilai == 0.125){
															$x = 16;
														}elseif($nilai == 0.1111){
															$x = 17;
														}
													}else{
														$data_input = array(
															'id_kriteria_1' => $kriteria[$i][0],
															'id_kriteria_2' => $kriteria[$ii][0],
															'kode' => $kriteria[$i][0].$kriteria[$ii][0],
															'nilai' => 1
														);
														$this->User_model->insertData('t_nilai_kriteria_'.$id_user, $data_input);
														$nilai = 1;
														$x = 9;

													}
													
													$selected[$x]='checked';
													?>
													  <tr >
														<td align="right"><?php echo $kriteria[$i][1] ?></td>
														<td align="center">
															<label class="radioLabel">
																<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[1] ?> value="9">
																<span class="radioSpan">9</span>
															</label>
															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[2] ?> value="8">
																<span class="radioSpan">8</span>
															</label>
															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[3] ?> value="7">
																<span class="radioSpan">7</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[4] ?> value="6">
																<span class="radioSpan">6</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[5] ?> value="5"> 
																<span class="radioSpan">5</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[6] ?> value="4"> 
																<span class="radioSpan">4</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[7] ?> value="3">
																<span class="radioSpan">3</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[8] ?> value="2">
																<span class="radioSpan"> 2 </span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[9] ?> value="1">
																<span class="radioSpan"> 1 </span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[10] ?> value="0.5">
																<span class="radioSpan">2</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[11] ?> value="0.3333">
																<span class="radioSpan">3</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[12] ?> value="0.25">
																<span class="radioSpan">4</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[13] ?> value="0.2">
																<span class="radioSpan">5</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[14] ?> value="0.1667">
																<span class="radioSpan">6</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[15] ?> value="0.1428">
																<span class="radioSpan">7</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[16] ?> value="0.125">
																<span class="radioSpan">8</span>
															</label>

															&nbsp
															&nbsp
															<label class="radioLabel">
															<input type="radio" name="nilai_<?php echo $kriteria[$i][0] ?>_<?php echo $kriteria[$ii][0]?>" <?php echo $selected[17] ?> value="0.1111">
																<span class="radioSpan">9</span>
															</label>
														</td>
														
														<td><?php echo $kriteria[$ii][1] ?></td>
													  </tr>
													<?php
													$selected[$x]='';
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


