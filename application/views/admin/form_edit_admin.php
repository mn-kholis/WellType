<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Admin</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="adminEditForm" action="<?php echo base_url('User_admin/edit/' . $admin->id_admin); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_admin" class="form-control" value="<?php echo $admin->username_admin; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_admin" class="form-control" value="<?php echo $admin->email_admin; ?>" required>
                </div>
                <div class="form-group">
                    <label>Password (Opsional)</label>
                    <input type="password" name="password_admin" class="form-control" placeholder="Kosongkan jika tidak ingin mengubah">
                </div>
                <div class="form-group">
                    <label>Status Admin</label>
                    <select name="status_admin" class="form-control custom-select" required>
                        <option value="owner" <?php echo ($admin->status_admin == 'owner') ? 'selected' : ''; ?>>Owner</option>
                        <option value="admin" <?php echo ($admin->status_admin == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo base_url('User_admin'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
