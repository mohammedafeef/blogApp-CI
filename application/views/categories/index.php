<h2><?= $tittle ?></h2>
<ul class='list-group list-unstyled mt-4'>
    <?php foreach($categories as $category): ?>
        <li class="llist-group-item">
            <a class="btn btn-secondary btn-block btn-box"href="<?php echo site_url('/categories/posts/'.$category['id']); ?>">
                <?= $category['name'] ?>
                <?php if($this->session->userdata('user_id')==$category['user_id']): ?>
                <form action ="categories/delete/ <?= $category['id'] ?>" method="POST" class="category-dlt">
                    <input type='submit' class="btn-link" value="X"/>
                </form>
                <?php endif; ?>
            </a>

        </li>
    <?php endforeach; ?>
</Ul>