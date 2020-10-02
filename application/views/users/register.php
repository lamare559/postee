<div class="container">
    <div class="col-md-4 col-md-offset-4 mx-auto">
        <h2 class='text-center'><?= $title; ?></h2>
        <?php echo form_open('users/register'); ?>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
                <?php echo form_error('name', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Email">
                <?php echo form_error('email', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Username">
                <?php echo form_error('username', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password at least 5 characters">
                <?php echo form_error('password', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Confirm Password</label>
                <input type="password" name="password2" class="form-control" placeholder="Confirm Password">
                <?php echo form_error('password2', '<p class="text-danger">', '</p>'); ?>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
        <?php echo form_close(); ?>
    </div>
</div>