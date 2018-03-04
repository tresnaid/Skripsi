<div id="tambahalternatif" class="modal fade" role="dialog" >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">tambah alternatif</h4>
          </div>
          <div class="modal-body">
          	<form action="tambahalternatif" method="POST">
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


<button type="button" class="btn btn-info btn-4 red" data-toggle="modal" data-target="#tambahalternatif">Tambah Alternatif</button>

         
<table cellpadding='0' cellspacing='0'>
	<thead>
		<tr>
		<th>No</th>
		<th>Nama Alternatif</th>
		<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; ?>
	
		<?php foreach ($informasi as $row): ?>
		<form action="editalternatif" method="POST">
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
		<form action="hapusalternatif" method="POST">
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
			 <td align=center><?php echo $no ?></td>
	         <td><?php echo $row->nama_alternatif ?></td>
			 <td><button type="button" class="btn btn-info btn-4 red" data-toggle="modal" data-target="#detail<?php echo $row->id_alternatif ?>">Edit</button>
			<button type="button" class="btn btn-info btn-4 red" data-toggle="modal" data-target="#hapus<?php echo $row->id_alternatif ?>">Hapus</button></td>
        </tr>
        <?php $no++; ?>
       	<?php endforeach ?>
    </tbody>
</table>