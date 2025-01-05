<style>
    .table {
        width: 100%;
        table-layout: fixed;
        /* Membuat kolom memiliki lebar tetap */
    }

    .table th,
    .table td {
        padding: 10px;
        text-align: left;
    }

    .table th {
        width: 20%;
        text-align: center;
    }

    .table td {
        width: 20%;
    }
    .table th:nth-child(1), .table td:nth-child(1) {
        width: 5%; 
        text-align: center;  
    }

</style>

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Content <small>Artikel</small></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Judul Konten</th>
                            <th>Konten</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($konten as $row): ?>
                            <tr>
                                <th scope="row"><?php echo $row->id_konten; ?></th>
                                <td><?php echo $row->judul_konten; ?></td>
                                <td><?php echo substr($row->konten, 0, 100) . '...'; ?></td>
                                <td class="text-center">
                                    <img src="<?php echo base_url('assets/image/' . $row->gambar); ?>"
                                        width="100" alt="Gambar Konten">
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('Content_admin/edit/' . $row->id_konten); ?>"
                                        class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url('Content_admin/delete_content/'. $row->id_konten); ?>"
                                        class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="text-left">
                <a href="<?php echo base_url('Content_admin/add/'); ?>" class="btn btn-primary">Add Content</a>
            </div>
        </div>
    </div>
</div>