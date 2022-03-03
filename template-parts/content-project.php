<li class="project-archive__project-item project-item">
    <div class="project-item__wrap">
        <a class="project-item__img-link" href="<?php the_permalink(); ?>">
            <picture class="project-item__img">
                <source srcset="<?php the_post_thumbnail_url('full'); ?>.webp" type="image/webp">
                <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>">
            </picture>
        </a>
        <div class="project-item__info">
            <h2 class="project-item__title">
                <a class="project-item__title-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h2>
            <div class="project-item__meta-info meta-info">
                <?php $terms = get_the_terms(get_the_ID(), 'categories');
                if (!empty($terms)) : ?>
                    <div class="meta-info__block">
                        <div class="meta-info__block-title"><?php _e('Tags', 'neman'); ?></div>
                        <ul class="meta-info__meta-list">
                            <?php foreach ($terms as $term) : ?>
                                <li class="meta-info__meta-item">
                                    <a href="<?= get_term_link($term->term_id, 'categories'); ?>" class="meta-info__meta-link"><?= $term->name; ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
                <div class="meta-info__block">
                    <div class="meta-info__block-title"><?php _e('Description', 'neman'); ?></div>
                    <div class="meta-info__meta-description">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            </div>
            <a href="<?php the_permalink(); ?>" class="project-item__btn"><?php _e('View project', 'neman'); ?></a>
        </div>
    </div>
</li>