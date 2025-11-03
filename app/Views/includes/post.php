<div class="col-lg-6">
    <article class="position-relative h-100">

        <div class="post-img position-relative overflow-hidden">
            <img src="assets/img/blog/blog-1.jpg" class="img-fluid" alt="">
            <span class="post-date"><?= h($post['created_at']) ?></span>
        </div>

        <div class="post-content d-flex flex-column">

            <h3 class="post-title"><?= h($post['title']) ?></h3>

            <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <i class="bi bi-person"></i> <span class="ps-2">John Doe</span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                    <i class="bi bi-folder2"></i> <span class="ps-2"><?= h($post['c_title']) ?></span>
                </div>
            </div>

            <p>
                <?= h($post['excerpt']) ?>
            </p>

            <hr>

            <a href="<?= baseUrl('/post/' . $post['slug']) ?>" class="readmore stretched-link"><span>Подробнее</span><i class="bi bi-arrow-right"></i></a>

        </div>

    </article>
</div>