<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit Free User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="userForm" action="<?php echo base_url('User_freeuser/edit/' . $user->id_user); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_user" class="form-control" value="<?php echo $user->username_user; ?>" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_user" class="form-control" value="<?php echo $user->email_user; ?>" required>
                </div>
                <div class="form-group">
                    <label>Password (Kosongkan jika tidak ingin diubah)</label>
                    <input type="password" name="password_user" class="form-control">
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" name="level_user" class="form-control" value="<?php echo $user->level_user; ?>" required>
                </div>
                <div class="form-group">
                    <label>Total Reward</label>
                    <input type="number" name="total_reward" class="form-control" value="<?php echo $user->total_reward; ?>" required>
                </div>
                <div class="form-group">
                    <label>Status User</label>
                    <select name="status_user" class="form-control custom-select" required>
                        <option value="premium" <?php echo ($user->status_user === 'premium') ? 'selected' : ''; ?>>Premium User</option>
                        <option value="free" <?php echo ($user->status_user === 'free') ? 'selected' : ''; ?>>Free User</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="<?php echo base_url('User_freeuser'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
