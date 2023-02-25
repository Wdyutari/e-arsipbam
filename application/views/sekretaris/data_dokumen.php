<!--Start form artikel-->
<!--Button Modal Box-->
<div class="container">
	<div class="btn-modal pb-3 pt-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModalDok">
  		Tambah Dokumen
	</button> 
	</div>
	 <?= $this->session->flashdata('message'); ?>
	<!-- Modal -->
	<div class="modal fade" id="tambahModalDok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="judulModal">Tambah Dokumen PT Bukit Asam Medika</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body mx-auto">
	        <form class="form-bed" method="POST" action="<?= base_url(); ?>sekretaris/tambah_dokumen" enctype="multipart/form-data">
	        	<div class="form-group">
				    <label for="namaKelas">Nomor Dokumen</label>
				    <input type="text" class="form-control" id="nomorDokumen" name="nomor_dok">
				</div>
				<div class="form-group">
				    <label for="namaRuang">Nama Dokumen</label>
				    <input type="text" class="form-control" id="namaDokumen" name="nama_dokumen">
				</div>
				<div class="form-group">
				    <label for="kapasitasBed">Jenis Dokumen</label>
				    <input type="text" class="form-control" id="jenisDokumen" name="jenis_dokumen">
				</div>
				<div class="form-group">
				    <label for="kapasitasBed">Dokumen</label>
				    <input type="file" class="form-control" id="Dokumen" name="url_dokumen">
				</div>
				
				
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="simpan">Tambah Data</button>
	      </div>
	      </form>
	    </div>
	  </div>
	</div>
</div>




     
      <!-- DataTabes -->
    <div class="container">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Data Dokumen PT Bukit Asam Medika</h6>
             </div>
            
             <div class="card-body">
              	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="width: 100%">
		            <thead>
		            <tr>
		              <th>No</th>
		              <th>Nomor</th>
		              <th>Nama</th>
		              <th>Jenis</th>
		              <th>Dokumen</th>
		              <th>Tanggal Upload</th>
		              <th>Tanggal Update</th>
		              <th width="18%">Aksi</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php $i = 1; ?>
		                    <?php foreach ($tambah_dokumen as $tdk) : ?>
		                        <tr>
		                            <th scope="row"><?= $i++; ?></th>
		                            <td><?= $tdk['nomor_dok']; ?></td>
		                            <td><?= $tdk['nama_dokumen']; ?></td>
		                            <td><?= $tdk['jenis_dokumen']; ?></td>
		                            <!-- <td><img style="width: 150px;height: 100px;" src="<?= base_url();?>assets/upload/pdf_sekretaris/<?= $tdk['url_dokumen']; ?>"></td> -->
		                            <td>
		                            	<a href="../assets/upload/pdf_sekretaris/<?= $tdk['url_dokumen']; ?>">Preview</a>
		                            </td>
		                            <td><?= $tdk['uploaded_at']; ?></td>
		                            <td><?= $tdk['updated_at']; ?></td>
		                            
		                            <td>
		                                <a href="" class="btn btn-info" data-toggle="modal" data-target="#updateModalDok<?= $tdk['id_dok_sekretaris']; ?>"><i class="fas fa-edit"></i></a> 
		                                
		                                <a href="<?= base_url();?>sekretaris/delete_dok/<?= $tdk['id_dok_sekretaris']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

		                            </td>
		                        </tr>
		                        <? $i++; ?>
		                    <?php endforeach; ?>
		          </tbody>
        		</table>
      			</div>
		</div>
	</div>
</div>




<!--Modal Update Data Dokter-->
<?php foreach ($tambah_dokumen as $tdk): ?>
<div class="modal fade" id="updateModalDok<?= $tdk['id_dok_sekretaris']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="judulModal">Edit Data Dokumen</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body mx-auto">
	        <form class="form-artikel" method="POST" action="<?= base_url(); ?>sekretaris/update_dokumen" enctype="multipart/form-data">
	        	<input type="hidden" name="id_bed" value="<?= $tdk['id_dok_sekretaris']; ?>">
	        	<div class="form-group">
				    <label for="namaKelas">Nomor Dokumen</label>
				    <input type="text" class="form-control" id="nomorDokumen" name="nomor_dok" value="<?= $tdk['nomor_dok']; ?>>
				</div>
				<div class="form-group">
				    <label for="namaRuang">Nama Dokumen</label>
				    <input type="text" class="form-control" id="namaDokumen" name="nama_dokumen" value="<?= $tdk['nama_dokumen']; ?>>
				</div>
				<div class="form-group">
				    <label for="kapasitasBed">Jenis Dokumen</label>
				    <input type="text" class="form-control" id="jenisDokumen" name="jenis_dokumen" value="<?= $tdk['jenis_dokumen']; ?>>
				</div>
				<div class="form-group">
				    <label for="kapasitasBed">Dokumen</label>
				    <input type="file" class="form-control" id="Dokumen" name="url_dokumen" value="<?= $tdk['url_dokumen']; ?>>
				</div>

	        	
				
				
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary" name="simpan">Edit Data</button>
	      </div>
	      </form>
	    </div>
	  </div>
</div>
</div>
<?php endforeach; ?>