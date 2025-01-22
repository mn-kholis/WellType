<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Add Free User</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form id="userForm" action="<?php echo base_url('User_freeuser/add'); ?>" method="post">
                <!-- <div class="form-group">
                    <label>Status User</label>
                    <select id="status_user" name="status_user" class="form-control custom-select" required>
                        <option value="">Pilih Status</option>
                        <option value="free">Free User</option>
                        <option value="premium">Premium User</option>
                    </select>
                </div> -->
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
            </form>
        </div>
    </div>
</div>

<!-- <script>
    // Add event listener to the status user select element
    document.getElementById('status_user').addEventListener('change', function() {
        var form = document.getElementById('userForm');
        var status = this.value;

        // Update the form's action based on the selected status
        if (status === 'freeuser') {
            form.action = '<?php echo base_url('User_freeuser/add'); ?>'; // Redirect to the FreeUser controller
        } else if (status_user === 'premium') {
            form.action = '<?php echo base_url('User_premuser/add'); ?>'; // Redirect to the PremiumUser controller
        } else {
            form.action = '<?php echo base_url('User_freeuser/add'); ?>'; // Default action if no status selected
        }
    });
</script> -->
