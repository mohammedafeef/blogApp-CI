<h1><?= $post['tittle'] ?></h1>
<h6>posted on:<?= $post['created_at'] ?></h6>
<p><?php echo $post['body'];?></p>
<div class="d-flex justify-content-between">
<div>
<a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug'] ?>" class="btn btn-warning pull-left">Edit</a>
</div>
<?php echo form_open('/posts/delete/'.$post['id']); ?>
    <input type="submit" value="delete" class="btn btn-danger d-flex"/>
</form>
</div>