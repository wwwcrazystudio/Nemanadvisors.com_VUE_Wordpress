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