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
					<form id="formInput" class="form-bed" method="POST" action="<?= base_url(); ?>sekretaris/tambah_dokumen" enctype="multipart/form-data">
						<input type="hidden" name="id_dok_sekretaris" id="idDokumen">
						<div class="form-group">
							<label for="nomorDokumen">Nomor Dokumen</label>
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
					<button type="submit" class="btn btn-primary" name="simpan" id="tblSimpanDokumen">Tambah Data</button>
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
						<?php foreach ($tambah_dokumen as $i => $tdk): ?>
							<tr>
								<th scope="row">
									<?= $i + 1; ?>
								</th>
								<td>
									<?= $tdk['nomor_dok']; ?>
								</td>
								<td>
									<?= $tdk['nama_dokumen']; ?>
								</td>
								<td>
									<?= $tdk['jenis_dokumen']; ?>
								</td>
								<!-- <td><img style="width: 150px;height: 100px;" src="<?= base_url(); ?>assets/upload/pdf_sekretaris/<?= $tdk['url_dokumen']; ?>"></td> -->
								<td>
									<?php
									$preview = strstr($tdk['url_dokumen'], '.', true);
									?>
									<a href="../assets/upload/pdf_sekretaris/<?= $tdk['url_dokumen']; ?>" data-toggle="popover" data-trigger="hover" data-popover-content="#a1" data-html="true" data-url="<?= $preview; ?>">Lihat Dokumen</a>
								</td>
								<td>
									<?= $tdk['uploaded_at']; ?>
								</td>
								<td>
									<?= $tdk['updated_at']; ?>
								</td>

								<td>
									<a href="" class="btn btn-info" data-toggle="modal" data-target="#tambahModalDok" data-dokumen="<?= $i ?>"><i class="fas fa-edit"></i></a>

									<a href="<?= base_url(); ?>sekretaris/delete_dok/<?= $tdk['id_dok_sekretaris']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="hidden d-none" id="a1">
	<div class="popover-heading">
		Preview
	</div>

	<div class="popover-body">
		<img id="PDFPreview" class="img-thumbnail" src="./">
	</div>
</div>


<script>
	var data = JSON.parse(`<?= json_encode($tambah_dokumen); ?>`);
	$(function () {
		$('[data-toggle="popover"]').popover({
			html: true,
			content: function () {
				var content = $(this).attr("data-popover-content");
				return $(content).children(".popover-body").html();
			},
			title: function () {
				var title = $(this).attr("data-popover-content");
				return $(title).children(".popover-heading").html();
			}
		});

		$('[data-toggle="popover"]').on('show.bs.popover', function(event){
			var url = $(event.target).data('url');
			
			$('#PDFPreview').attr('src', `<?= base_url('assets/upload/pdf_sekretaris'); ?>/${url}_preview.jpg`);
		});

		$("#tambahModalDok").on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget);
			var row = data[button.data('dokumen')];

			if (row) {
				$('#nomorDokumen').val(row['nomor_dok']);
				$('#namaDokumen').val(row['nama_dokumen']);
				$('#jenisDokumen').val(row['jenis_dokumen']);
			}
			$("#Dokumen").prop('disabled', (row));
			$('#judulModal').text((row) ? 'Edit Dokumen PT Bukit Asam Medika' : 'Tambah Dokumen PT Bukit Asam Medika');
			$('#tblSimpanDokumen').text((row) ? 'Edit Data' : 'Tambah Data')
			$('#formInput').attr('action',
				(row) ? '<?= base_url(); ?>sekretaris/update_dokumen' : '<?= base_url(); ?>sekretaris/tambah_dokumen'
			);
			$('#idDokumen').val(row?.id_dok_sekretaris || null);
		});
	});

</script>