<div class="container">
    <div class="col-md-4 col-md-offset-4 mx-auto">
        <h2 class='text-center'><?= $title; ?></h2>
        <?php echo form_open('users/login'); ?>
            <div class="form-group">
                <input type="text" name="username" class="form-control" placeholder="Username">
                <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
        <?php echo form_close(); ?>
    </div>
</div>