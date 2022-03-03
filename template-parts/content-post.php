<li class="post-archive__post-item post-item">
    <a class="post-item__img-link" href="<?php the_permalink(); ?>">
        <picture class="post-item__img">
            <source srcset="<?php the_post_thumbnail_url('full'); ?>.webp" type="image/webp">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
        </picture>
        <time class="post-item__date" datetime="<?= get_the_date('Y-m-d'); ?>"><?= get_the_date('j F Y'); ?></time>
    </a>
    <?php $terms = get_the_terms(get_the_ID(), 'category');
    if (!empty($terms)) : ?>
        <div class="post-item__tags meta-info">
            <ul class="post-item__tags-list">
                <?php foreach ($terms as $term) : ?>
                    <li class="post-item__tags-item">
                        <a href="<?= get_term_link($term->term_id, 'category'); ?>" class="post-item__tags-link"><?= $term->name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>
    <h2 class="post-item__title">
        <a class="post-item__title-link" href="<?php the_permalink(); ?>">
            <?php the_title(); ?>
        </a>
    </h2>
</li>