<?php echo $this->session->userdata('logged_in'); ?>
<div class="container">
    <h2><?= $title; ?></h2>
    <hr>
    <?php if($posts): ?>
        <?php foreach($posts as $post): ?>
            <h3><?php echo $post['title']; ?></h3>
            <div class="row">
                <div class="col-md-3">
                    <img class="post-image" src="<?php echo site_url(); ?>assets/img/post/<?php echo $post['post_image']; ?>" alt="">
                </div>
                <div class="col-md-9">
                    <p><?php echo $post['body']; ?></p>
                    <small>Posted On: <strong><?php echo $post['posted_at']; ?></strong></small><br><br>
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug']; ?>">Update</a>
                    <a class="btn btn-danger" href="<?php echo base_url(); ?>posts/delete/<?php echo $post['slug']; ?>">Delete</a>
                </div>
            </div>
            <hr>
        <?php endforeach; ?>
    <?php else: ?>
        <h4>You have not put any post yet</h4>
    <?php endif; ?>
</div>