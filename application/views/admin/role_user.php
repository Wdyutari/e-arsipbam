<div class="container">
	<div class="btn-modal pb-3 pt-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModalRole">
  		Tambah Role User
	</button> 
	</div>

	
	<?= $this->session->flashdata('message'); ?>
	<!-- Modal -->
	<div class="modal fade" id="tambahModalRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="judulModal">Tambah Role User</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body mx-auto">
	        <form class="form-bed" method="POST" action="<?= base_url(); ?>admin/tambah_role" enctype="multipart/form-data">
	        	<div class="form-group">
				    <label for="roleUser">Role User</label>
				    <input type="text" class="form-control" id="nomorDokumen" name="role">
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



<!--Start Datatables-->
<div class="container">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Data Role User</h6>
             </div>
             <div class="card-body">
              	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="width: 100%">
		            <thead>
		            <tr>
		              <th>No</th>
		              <th>Role User</th>
		              <th>Aksi</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php $i = 1; ?>
		                    <?php foreach ($tambah_role as $tr) : ?>
		                        <tr>
		                            <th scope="row"><?= $i++; ?></th>
		                            <td><?= $tr['role']; ?></td>
		                            <td>
		                            
		                                <a href="<?= base_url();?>admin/delete_role/<?= $tr['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

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