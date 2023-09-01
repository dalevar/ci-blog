<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
<script src="<?= base_url('assets/dataTables/datatables.min.js ') ?>"></script>


<div class="col-lg-8 col-md-8 col-sm-8">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#kategoriModal">
		Tambah Kategori
	</button>
	<?php if ($this->session->flashdata('pesan') != null) :  ?>
		<div class="alert alert-success alert-dismissible fade show col-md-4" role="alert">
			<?= $this->session->flashdata('pesan') ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php else : ?>
	<?php endif; ?>
	<div class="card">
		<div class="card-body">
			<table class="table table-bordered table-hover table-striped mt-3" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Kategori</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($kategori as $data) : ?>
						<tr>
							<td><?= $i; ?></td>
							<td><?= $data['nama_kategori']; ?></td>
							<td>
								<a href="<?= base_url('kategori/ubah/' . $data['id']) ?>" class="btn btn-info btn-sm">Ubah</a>
								<a href="<?= base_url('kategori/hapus/' . $data['id']) ?>" onclick="return confirm('Yakin ?')" class="btn btn-danger btn-sm">Hapus</a>
							</td>
						</tr>
						<?php $i++ ?>
					<?php endforeach;  ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="kategoriModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="kategoriModalLabel">Tambah Data Kategori</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="<?= base_url('kategori/tambah') ?>" method="post">
					<label for="nama_kategori">Nama Kategori</label>
					<input type="text" class="form-control" name="nama_kategori">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function() {
		$('#table').DataTable();
	})
</script>