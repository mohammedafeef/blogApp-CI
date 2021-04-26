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
<div class="bg-secondary p-3">
    <?php if($comments): ?>
        <?php foreach($comments as $comment): ?>
            <div class="my-2">
                <h6 class="text-capitalize lead"><?= $comment['body'] ?> :[by <strong class="text-uppercase "><?= $comment['name'] ?></strong>]</h6>
            </div>  
        <?php endforeach; ?>
    <?php else : ?>
        <p> No comments To display </p>
    <?php endif; ?>
</div>
<h3>Add comments </h3>
<?php echo validation_errors() ?>
<?php echo form_open('comments/create/'.$post['id']); ?>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea name="body" class="form-control"></textarea>
    </div>
    <input type="hidden" name="slug" value="<?= $post['slug'] ?>"/>
    <button class="btn btn-success" type="submit">submit</button>
</form>