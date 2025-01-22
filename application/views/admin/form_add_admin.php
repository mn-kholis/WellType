<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Admin</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="adminForm" action="<?php echo base_url('User_admin/add'); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_admin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_admin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password_admin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Status Admin</label>
                    <select name="status_admin" class="form-control custom-select" required>
                        <option value="">Pilih Status Admin</option>
                        <option value="owner">Owner</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?php echo base_url('User_admin'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
