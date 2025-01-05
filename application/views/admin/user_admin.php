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



<!-- page content -->
<div class="">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Admin</h2>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $row): ?>
                                <tr>
                                    <th scope="row"><?php echo $row->id_admin; ?></th>
                                    <td><?php echo $row->username_admin; ?></td>
                                    <td><?php echo substr($row->email_admin, 0, 100); ?></td>
                                    <td class="text-center">
                                        <a href="<?php echo base_url('index.php/User_admin/edit/' . $row->id_admin); ?>"
                                            class="btn btn-warning">Edit</a>
                                        <a href="<?php echo base_url('index.php/User_admin/delete_user_admin/'. $row->id_admin); ?>"
                                            class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-left">
                    <a href="<?php echo base_url('index.php/admin/add/'); ?>" ></a>
                </div>
            </div>
        </div>
    </div>
</div>