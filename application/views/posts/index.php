<h2><?= $tittle ?></h2>
<?php foreach($posts as $post) : ?>
    <h3><?= $post['tittle'] ?></h3>
    <h6 class="text-muted">posted on:<?= $post['created_at'] ?> in <?= $post['name'] ?></h6>
    <p><?php echo word_limiter($post['body'],60);?></p>
    <br/>
    <div><a class="btn btn-info" href="<?php echo site_url('/posts/'.$post['slug']);?>">read more</a><div>
    <br/>
<?php endforeach ?>