<h2><?= $tittle ?></h2>
<?php foreach($posts as $post) : ?>
    <h3><?= $post['tittle'] ?></h3>
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo site_url(); ?>assets/images/posts/<?=$post['image']?>" class="img-responsive w-100" />
        </div>
        <div class="col-md-9">
            <h6 class="text-muted">posted on:<?= $post['created_at'] ?> in <?= $post['name'] ?></h6>
            <p><?php echo word_limiter($post['body'],60);?></p>
            <br/>
            <div><a class="btn btn-info" href="<?php echo site_url('/posts/'.$post['slug']);?>">read more</a></div>
            <br/>
        </div>
    </div>
<?php endforeach ?>