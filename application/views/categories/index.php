<h2><?= $tittle ?></h2>
<ul class='list-group list-unstyled'>
    <?php foreach($categories as $category): ?>
        <li class="llist-group-item">
            <a href="<?php echo site_url('/categories/posts/'.$category['id']); ?>">
                <?= $category['name'] ?>
            </a>
            <?php if($this->session->userdata('user_id')==$category['user_id']): ?>
                <form action ="categories/delete/ <?= $category['id'] ?>" method="POST" class="category-dlt">
                    <input type='submit' class="btn-link text-danger" value="[X]"/>
                </form>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</Ul>