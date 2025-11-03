<nav id="navmenu" class="navmenu">
    <ul>
        <li><a href="<?= baseUrl('/') ?>" class="active">Главная</a></li>
        <li><a href="<?= baseUrl('/about') ?>">О нас</a></li>
        <?php $categories = container()->get('categories', []); ?>
        <?php if (!empty($categories)) : ?>
            <li class="dropdown"><a href="#"><span>Категории</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                    <?php foreach ($categories as $category) : ?>
                        <li><a href="<?= baseUrl('/category/' . $category['slug']) ?>"><?= h($category['title']) ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
        <?php endif; ?>
        <li><a href="<?= baseUrl('/contact') ?>">Связаться с нами</a></li>
    </ul>
    <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>