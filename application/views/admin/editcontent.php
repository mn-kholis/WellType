<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WellType</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  </head>
  <body>
<div class="container mt-5">
	<h5 class="mt-5">Edit Content</h5>

	<form method="post" enctype="multipart/form-data">
		<div class="mb-3">
			<label>Judul Content</label>
			<input type="text" name="judul_konten" class="form-control" value="<?php echo set_value("judul_konten", $konten->judul_konten) ?>">
				<?php echo form_error("judul_artikel") ?>
			</span>
		</div>
		<div class="mb-3">
			<label>Isi Content</label>
			<textarea class="form-control" id="editorku" name="konten"><?php echo set_value("konten", $konten->konten) ?></textarea>
			<span class="small text-danger">
				<?php echo form_error("isi_artikel") ?>
			</span>
		</div>

		<div class="mb-3">
			<label>Foto Lama</label><br>
			<img src="<?php echo base_url('assets/image/'.$konten->gambar)?>" width="250">
		</div>

		<div class="mb-3">
			<label>Ganti Foto Content</label>
			<input type="file" name="foto_artikel" class="form-control">
		</div>
		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div>

<div class="bg-light text-center">
	<div class="">Copyright &copy; 2024. Amikom</div>
</div>

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