<div class="container">
    <h3><?php echo $post->title; ?></h3>
    <hr>
    <img class="post-image" src="<?php echo site_url(); ?>assets/img/post/<?php echo $post->post_image; ?>" alt="">
    <br><hr>
    <p><?php echo $post->body; ?></p>
</div>