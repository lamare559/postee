<div class="container">
    <div class="mx-auto">
        <h2 class='text-center'><?= $title; ?></h2>
        <?php echo form_open_multipart('posts/create'); ?>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Post Tile/Post name">
                <?php echo form_error('title', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Slug</label>
                <input type="text" name="slug" class="form-control" placeholder="Post-Title">
                <?php echo form_error('slug', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <label for="">Body</label>
                <textarea id="editor" name="body" class="form-control" placeholder="What content do you want to put?"></textarea>
                <?php echo form_error('body', '<p class="text-danger">', '</p>'); ?>
            </div>
            <div class="form-group">
                <input type="file" name="userfile" siz="20">
            </div>
            <button type="submit" class="btn btn-block btn-primary">Create Post</button>
        <?php echo form_close(); ?>
    </div>
</div>