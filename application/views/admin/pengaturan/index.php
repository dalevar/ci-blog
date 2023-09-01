<div class="container col-lg">
	<div class="row mb-3">

		<div class="col-md-6">
			<?php if ($this->session->flashdata('pesan') != null) :  ?>
				<div class="alert alert-success alert-dismissible fade show col-md-6" role="alert">
					<?= $this->session->flashdata('pesan') ?>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			<?php else : ?>
			<?php endif; ?>
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('pengaturan/update') ?>" method="post">
						<div class="form-group">
							<label for="">Nama Blog</label>
							<input type="text" class="form-control" name="nama_blog" value="<?= $pengaturan['nama_blog'] ?>" required>
						</div>
						<div class="form-group">
							<label for="">Link Instagram</label>
							<input type="text" class="form-control" name="link_instagram" value="<?= $pengaturan['link_instagram'] ?>" required>
						</div>
						<div class="form-group">
							<label for="">Link facebook</label>
							<input type="text" class="form-control" name="link_facebook" value="<?= $pengaturan['link_facebook'] ?>" required>
						</div>
						<div class="form-group">
							<label for="">Email</label>
							<input type="text" class="form-control" name="email" value="<?= $pengaturan['email'] ?>" required>
						</div>
						<div class="form-group">
							<label for="">No. Hp</label>
							<input type="text" class="form-control" name="no_hp" value="<?= $pengaturan['no_hp'] ?>" required>
						</div>
						<button type="submit" class="btn btn-primary btn-flat">Ubah</button>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-body">
					<form action="<?= base_url('pengaturan/updateLogo') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Logo</label>
							<input type="file" name="logo" class="form-control" required>
						</div>
						<button class="btn btn-primary btn-sm" type="submit">Ubah</button>
					</form>
					<hr>
					<form action="<?= base_url('pengaturan/updateBanner') ?>" method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="">Banner</label>
							<input type="file" name="banner" class="form-control" required>
						</div>
						<button class="btn btn-primary btn-sm" type="submit">Ubah</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>