<!-- page content -->
<div class="col-md-12 col-sm-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Premium User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card-box table-responsive">
                        <p class="text-muted font-13 m-b-30">
                            Berikut adalah daftar pengguna premium. Anda dapat menambah, mengedit, atau menghapus data pengguna premium.
                        </p>
                        <div class="text-left">
                            <a href="<?php echo base_url('User_premuser/add/'); ?>" class="btn btn-primary">Add New</a>
                        </div>
                        
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <!-- <th>Password</th> -->
                                    <th>Level</th>
                                    <th>Total Reward</th>
                                    <th>Tanggal Registrasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1; // Penomoran
                                foreach ($premium_users as $row): ?>
                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $row->username_user; ?></td>
                                        <td><?php echo $row->email_user; ?></td>
                                        <!-- <td><?php echo $row->password_user; ?></td> -->
                                        <td><?php echo $row->level_user; ?></td>
                                        <td><?php echo $row->total_reward; ?></td>
                                        <td><?php echo date('d-m-Y', strtotime($row->tgl_reg_user)); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('User_premuser/edit/' . $row->id_user); ?>"
                                                class="btn btn-warning">Edit</a>
                                            <a href="<?php echo base_url('User_premuser/delete/' . $row->id_user); ?>"
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
