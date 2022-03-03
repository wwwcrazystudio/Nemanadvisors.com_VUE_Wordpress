<?php get_header(); ?>

<main class="post-archive">
    <div class="container-fluid">
        <?php the_breadcrumbs('post-archive'); ?>
    </div>
    <section class="post-archive__content">
        <div class="container-fluid">
            <h1 class="post-archive__heading"><?php _e('We share the best knowledge <span>and skills in our field</span>', 'neman'); ?></h1>
        </div>
        <div class="post-archive__list-wrap">

            <?php
            $args = array(
                'posts_per_page' => 4,
                'orderby' => 'date',
                'order' => 'desc',
            );
            $query = new WP_Query($args);
            $cats = get_terms(array(
                'taxonomy'      => 'category',
                'orderby'       => 'name',
                'order'     => 'desc',
                'hide_empty' => false,
                'parent'    => 0,
                'exclude' => function_exists('pll_get_term') ? pll_get_term(1) : 1,
            ));
            if (!empty($cats)) : ?>
                <div class="post-archive__filters filters">
                    <div class="filters__wrap">
                        <div class="filters__title"><?php _e('Filter', 'neman'); ?></div>
                        <form class="filters__form">
                            <?php foreach ($cats as $cat) : ?>
                                <div class="filters__group">
                                    <label for="<?= $cat->term_id; ?>" class="filters__label sr-only"><?= $cat->name; ?></label>
                                    <select name="category[]" id="<?= $cat->term_id; ?>" class="filters__control" data-placeholder="<?= $cat->name; ?>">
                                        <option></option>
                                        <?php $subcats = get_terms(array(
                                            'taxonomy'      => 'category',
                                            'orderby'       => 'date',
                                            'order'     => 'desc',
                                            'hide_empty' => false,
                                            'parent' => $cat->term_id,
                                        ));
                                        foreach ($subcats as $subcat) :
                                        ?>
                                            <option value="<?= $subcat->term_id; ?>" <?= get_class(get_queried_object()) == 'WP_Term' ? (get_queried_object_id() == $subcat->term_id ? 'selected' : '') : null; ?>><?= $subcat->name; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            <?php endforeach; ?>
                            <input type="hidden" name="post_type" value="post">
                            <input type="hidden" name="paged" value="1">
                            <input type="hidden" name="per_page" value="4">
                            <input type="hidden" name="action" value="filter_form">
                            <input type="hidden" name="found_posts" value="<?= $query->found_posts; ?>">
                        </form>
                    </div>
                </div>
            <?php endif;
            if ($query->have_posts()) : ?>
                <div class="container-fluid">
                    <ul class="post-archive__list" data-content>
                        <?php while ($query->have_posts()) : $query->the_post();
                            get_template_part('template-parts/content', 'post');
                        endwhile; ?>
                    </ul>
                </div>
                <?php if ($query->found_posts > 4) : ?>
                    <button class="post-archive__load-btn"><?php _e('Load more', 'neman'); ?></button>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>

            <?php endif; ?>
        </div>
    </section>
    <?php pagesNav('post-archive'); ?>
</main>

<?php get_footer(); ?>