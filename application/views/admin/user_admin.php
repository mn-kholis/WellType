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
                            Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
                        </p>
                        <div class="text-left">
                            <a href="<?php echo base_url('User_admin/add/'); ?>" class="btn btn-primary">Add New</a>
                        </div>
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
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
                                            <a href="<?php echo base_url('User_admin/edit/' . $row->id_admin); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?php echo base_url('User_admin/delete_user_admin/'. $row->id_admin); ?>"
                                                class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Delete</a>
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
</div>