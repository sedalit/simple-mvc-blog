<div class="recent-posts-widget widget-item">

    <h3 class="widget-title">Recent Posts</h3>

    <?php foreach($recentPosts as $post) : ?>

        <div class="post-item">
            <img src="assets/img/blog/blog-1.jpg" alt="" class="flex-shrink-0">
            <div>
                <h4><a href="<?= baseUrl('/post/' . $post['slug']) ?>"><?= $post['title'] ?></a></h4>
                <time datetime="2020-01-01"><?= $post['created_at'] ?></time>
            </div>
        </div>

    <?php endforeach; ?>

</div>