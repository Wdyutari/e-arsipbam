<div class="container">
	<div class="btn-modal pb-3 pt-3">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahModal">
  		Tambah Pengguna
	</button> 
	</div>

	<p>
		Role Id -> 1 = Admin
	</p>
	<?= $this->session->flashdata('message'); ?>
	<!-- Modal -->
	<div class="modal fade" id="tambahModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog modal-xl">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="judulModal">Tambah Pengguna</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body mx-auto">
	        <form class="user" method="post" action="<?= base_url('admin/tambah_user'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Nama Pengguna" value="<?= set_value('name'); ?>">
                                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Ulangi Password">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Register Account
                            </button>
                        </form>
	    </div>
	  </div>
	</div>
</div>



<!--Start Datatables-->
<div class="container">
      <div class="card shadow mb-4">
            <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Data Pengguna</h6>
             </div>
             <div class="card-body">
              	<div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="width: 100%">
		            <thead>
		            <tr>
		              <th>No</th>
		              <th>Nama Pengguna</th>
		              <th>Foto</th>
		              <th>Email</th>
		              <th>Role</th>
		              <th>Aksi</th>
		            </tr>
		          </thead>
		          <tbody>
		          	<?php $i = 1; ?>
		                    <?php foreach ($user_data as $ud) : ?>
		                        <tr>
		                            <th scope="row"><?= $i++; ?></th>
		                            <td><?= $ud['name']; ?></td>
		                            <td><?= $ud['image']; ?></td>
		                            <td><?= $ud['email']; ?></td>
		                            <td><?= $ud['role_id']; ?></td>
		                            <td>
		                            
		                                <a href="<?= base_url();?>admin/delete_user/<?= $ud['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>

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