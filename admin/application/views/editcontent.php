<?php $this->load->view('template/header') ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-light">
                <div class="card-header bg-warning text-white text-center">
                    <h5>Edit Konten</h5>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="judul_konten" class="form-label">Judul Konten</label>
                            <input type="text" name="judul_konten" id="judul_konten" class="form-control" value="<?php echo set_value('judul_konten', $content->judul_konten) ?>" placeholder="Masukkan Judul Konten">
                            <span class="small text-danger">
                                <?php echo form_error('judul_konten') ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="konten" class="form-label">Isi Konten</label>
                            <textarea class="form-control" id="editorku" name="konten" rows="5" placeholder="Masukkan Isi Konten"><?php echo set_value('konten', $content->konten) ?></textarea>
                            <span class="small text-danger">
                                <?php echo form_error('konten') ?>
                            </span>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Foto Konten</label>
                            <input type="file" name="gambar" id="gambar" class="form-control">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-warning btn-lg">Perbarui</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional Custom CSS -->
<style>
    body {
        background-color: #f7f7f7;
    }

    .card {
        border-radius: 15px;
    }

    .card-header {
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        padding: 30px;
    }

    .form-control:focus {
        border-color: #ffc107;
        box-shadow: 0 0 5px rgba(255, 193, 7, 0.5);
    }

    .btn-warning {
        padding: 10px 20px;
        border-radius: 25px;
        font-weight: bold;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .text-danger {
        font-size: 0.875rem;
    }

    .mb-3 label {
        font-size: 1.1rem;
    }

    #editorku {
        font-size: 1rem;
    }
</style>

<?php $this->load->view('template/footer') ?>
