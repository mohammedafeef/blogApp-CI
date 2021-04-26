<h2><?= $tittle ?></h2>
<ul class='list-group list-unstyled'>
    <?php foreach($categories as $category): ?>
        <li class="llist-group-item">
            <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>">
                <?= $category['name'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</Ul>