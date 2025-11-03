<div class="col-lg-8">
  <section id="blog-posts" class="blog-posts section">
    <div class="container">
      <div class="row gy-4">
        <?php if (empty($posts)) : ?>
          <p>Нет доступных постов.</p>
        <?php else : ?>
          <?php foreach ($posts as $post) : ?>
            <?= view()->renderPartial('includes/post', ['post' => $post]) ?>
          <?php endforeach; ?>
          <?php if (isset($pagination)) : ?>
            <?= view()->renderPartial('includes/pagination', ['pagination' => $pagination]) ?>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>