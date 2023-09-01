<link rel="stylesheet" href="<?= base_url('assets/dataTables/datatables.min.css') ?>">
<script src="<?= base_url('assets/dataTables/datatables.min.js ') ?>"></script>

<div class="container col-lg">
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
			<a href="<?= base_url('postingan/tambah') ?>" class="btn btn-primary mb-2">Tambah Berita & Postingan</a>
			<table class="table table-bordered table-hover mt-2" id="table">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama Postingan</th>
						<th>Kategori</th>
						<th>Tanggal Dibuat</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 1;
					foreach ($postingan as $data) : ?>
						<tr>
							<td><?= $i++; ?></td>
							<td><?= $data['nama'] ?></td>
							<td><?php foreach ($kategori as $key) :  ?>
									<?php if ($data['id_kategori'] == $key['id']) : ?>
										<span class="badge badge-primary"><?= $key['nama_kategori'] ?></span>
									<?php else : ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</td>
							<td><?= date('D, d-m-Y', $data['tanggal_dibuat']); ?></td>
							<td>
								<a href="<?= base_url('postingan/detail/' . $data['id']) ?>" class="btn btn-info btn-sm">Detail</a>
								<a href="<?= base_url('postingan/edit/' . $data['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
								<a href="<?= base_url('postingan/hapus/' . $data['id']) ?>" onclick="return confirm('yakin ?')" class="btn btn-danger btn-sm">Hapus</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>


<script>
	$(document).ready(function() {
		$('#table').DataTable();
	})
</script>
