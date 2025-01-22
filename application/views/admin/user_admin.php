<!-- page content -->
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Admin</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                            Berikut adalah daftar admin. Anda dapat menambah, mengedit, atau menghapus data admin.
                        </p>
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Status Admin</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1; 
                                foreach ($admin as $row): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->username_admin; ?></td>
                                        <td><?php echo substr($row->email_admin, 0, 100); ?></td>
                                        <td><?php echo $row->status_admin; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('User_admin/edit/' . $row->id_admin); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?php echo base_url('User_admin/delete/'. $row->id_admin); ?>"
                                                class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        
                        <br>
                        <br>

                        <div class="text-left">
                            <a href="<?php echo base_url('User_admin/add/'); ?>" class="btn btn-primary">Add New</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>