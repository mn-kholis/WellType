<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Marketplace</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-3">
    	<div class= "container">
    		<a href=" "class = "navbar-brand">Admin</a>
    		<button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#naff">
    			<span class="navbar-toggler-icon"></span>
    		</button>
    		<div class="collapse navbar-collapse" id="naff">
    			<ul class=" navbar-nav me-auto">
    				<li class="nav-item">
    					<a href="<?php echo base_url("home")?>" class="nav-link">Home</a>
    				</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("artikel")?>" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url("slider")?>" class="nav-link">Slider</a>
                    </li>
    				<li class="nav-item">
    					<a href="<?php echo base_url("kategori")?>" class="nav-link">Kategori</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?php echo base_url("produk")?>" class="nav-link">Produk</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?php echo base_url("member")?>" class="nav-link">Member</a>
    				</li>
    				<li class="nav-item">
    					<a href="<?php echo base_url("transaksi")?>" class="nav-link">Transaksi</a>
    				</li>
    			</ul>
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a href="<?php echo base_url("akun") ?>" class="nav-link">
                    <?php echo $this->session->userdata("") ?>
                </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo base_url("logout") ?>" class="nav-link">Logout</a>
            </li>
          </ul>
    		</div>
    	</div>
    </nav>
<div class="container">
	<h5>Edit Artikel</h5>

	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label>Judul Artikel</label>
			<input type="text" name="judul_artikel" class="form-control" value="<?php echo set_value("judul_artikel", $artikel["judul_artikel"]) ?>">
				<?php echo form_error("judul_artikel") ?>
			</span>
		</div>
		<div class="mb-3">
			<label>Isi Artikel</label>
			<textarea class="form-control" id="editorku" name="isi_artikel"><?php echo set_value("isi_artikel", $artikel['isi_artikel']) ?></textarea>
			<span class="small text-danger">
				<?php echo form_error("isi_artikel") ?>
			</span>
		</div>

		<div class="mb-3">
			<label>Foto Lama</label><br>
			<img src="<?php echo $this->config->item("url_artikel").$artikel["foto_artikel"] ?>" width="250">
		</div>

		<div class="mb-3">
			<label>Ganti Foto artikel</label>
			<input type="file" name="foto_artikel" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>


<footer class="bg-light text-center py-3">
    	<div class="">Copyright &copy; 2024. Amikom</div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.3/js/dataTables.bootstrap5.js"></script>
   <script>new DataTable("#tabelku")</script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <?php if ($this->session->flashdata('pesan_sukses')): ?>
   	<script>swal("Sukses!", "<?php echo $this->session->flashdata('pesan_sukses'); ?>", "success");</script>
    <?php endif ?>

    <?php if ($this->session->flashdata('pesan_gagal')): ?>
   	<script>swal("Gagal!", "<?php echo $this->session->flashdata('pesan_gagal'); ?>", "error");</script>
    <?php endif ?>

    <script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
    <script>CKEDITOR.replace("editorku")</script>

  </body>
</html>