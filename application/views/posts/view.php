<h1><?= $post['tittle'] ?></h1>
<div class="row">
    <div class="col-md-3">
        <img src="<?php echo site_url(); ?>assets/images/posts/<?=$post['image']?>" class="img-responsive w-100" />
    </div>
    <div class="col-md-9">
    <h6>posted on:<?= $post['created_at'] ?></h6>
    <p><?php echo $post['body'];?></p>
    </div>
</div>
<div class="d-flex justify-content-between">
    <div>
        <a href="<?php echo base_url(); ?>posts/edit/<?php echo $post['slug'] ?>" class="btn btn-warning pull-left">Edit</a>
    </div>
    <?php echo form_open('/posts/delete/'.$post['id']); ?>
        <input type="submit" value="delete" class="btn btn-danger d-flex"/>
    </form>
</div>