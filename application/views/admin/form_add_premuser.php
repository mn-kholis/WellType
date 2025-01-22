<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Premium User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="userForm" action="<?php echo base_url('User_premuser/add'); ?>" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username_user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email_user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password_user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Level</label>
                    <input type="text" name="level_user" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Total Reward</label>
                    <input type="number" name="total_reward" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Tambah</button>
                <a href="<?php echo base_url('User_premuser'); ?>" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
