<li class="related-projects__post-item post-item">
    <a class="post-item__img-link" href="<?php the_permalink(); ?>">
        <picture class="post-item__img">
            <source srcset="<?php the_post_thumbnail_url('full'); ?>.webp" type="image/webp">
            <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
        </picture>
    </a>
    <?php $terms = get_the_terms(get_the_ID(), 'categories');
    if (!empty($terms)) : ?>
        <div class="post-item__tags meta-info">
            <ul class="post-item__tags-list">
                <?php foreach ($terms as $term) : ?>
                    <li class="post-item__tags-item">
                        <a href="<?= get_term_link($term->term_id, 'categories'); ?>" class="post-item__tags-link"><?= $term->name; ?></a>
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