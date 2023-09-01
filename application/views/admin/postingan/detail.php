<div class="container col-lg">
	<a href="<?= base_url('postingan') ?>" class="btn btn-secondary btn-sm mb-2"><i class="fas fa-fw fa-arrow-left"></i>Back</a>

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
			<h3><?= $postingan['nama']; ?></h3>
			<span class="badge badge-info"><?= date('D, d-m-Y', $postingan['tanggal_dibuat']); ?></span>
			<span class="badge badge-primary"><?= $kategori['nama_kategori']; ?></span>

			<p>
				<?= $postingan['isi_postingan']; ?>
			</p>
		</div>
	</div>
</div>
</div>
</div>
