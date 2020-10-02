<div class="container">
    <div class="mx-auto">
        <h2 class='text-center'><?= $title; ?></h2>
        <?php echo form_open_multipart('posts/update/'.$post->slug); ?>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Update Title" value="<?php echo $post->title; ?>">
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <textarea name="body" class="form-control" placeholder="Update Content"><?php echo $post->body; ?></textarea>
            </div>
            <button type="submit" class="btn btn-block btn-primary">Update Post</button>
        <?php echo form_close(); ?>
    </div>
</div>