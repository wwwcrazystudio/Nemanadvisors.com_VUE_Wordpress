<?php get_header(); ?>

<main class="project-archive">
    <div class="container-fluid">
        <?php the_breadcrumbs('project-archive'); ?>
    </div>
    <section class="project-archive__content">
        <div class="container-fluid">
            <h1 class="project-archive__heading"><?php _e('Key <span>credentials</span>', 'neman'); ?></h1>
        </div>

        <?php
        $args = array(
            'post_type' => 'project',
            'posts_per_page' => 5,
            'orderby' => 'menu_order',
        );
        $query = new WP_Query($args);
        $cats = get_terms(array(
            'taxonomy'      => 'categories',
            'orderby'       => 'name',
            'order'     => 'desc',
            'hide_empty' => false,
            'parent'    => 0,
        ));
        if (!empty($cats)) :  ?>
            <div class="project-archive__filters filters">
                <div class="filters__wrap">
                    <div class="filters__title"><?php _e('Filter', 'neman'); ?></div>
                    <form class="filters__form">
                        <?php foreach ($cats as $cat) : ?>
                            <div class="filters__group">
                                <label for="<?= $cat->term_id; ?>" class="filters__label sr-only"><?= $cat->name; ?></label>
                                <select name="categories[]" id="<?= $cat->term_id; ?>" class="filters__control" data-placeholder="<?= $cat->name; ?>">
                                    <option></option>
                                    <?php $subcats = get_terms(array(
                                        'taxonomy'      => 'categories',
                                        'orderby'       => 'name',
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
                        <input type="hidden" name="post_type" value="project">
                        <input type="hidden" name="paged" value="1">
                        <input type="hidden" name="per_page" value="5">
                        <input type="hidden" name="action" value="filter_form">
                        <input type="hidden" name="found_posts" value="<?=$query->found_posts;?>">
                    </form>
                </div>
            </div>
        <?php endif;
        if ($query->have_posts()) : ?>
            <div class="project-archive__list-wrap">
                <ul class="project-archive__list" data-content>
                    <?php while ($query->have_posts()) : $query->the_post();
                        get_template_part('template-parts/content', 'project');
                    endwhile; ?>
                </ul>
                <?php if ($query->found_posts > 5) : ?>
                    <button class="project-archive__load-btn"><?php _e('Load more', 'neman'); ?></button>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>

            </div>

        <?php endif; ?>

    </section>
    <?php pagesNav('project-archive'); ?>
</main>


<?php get_footer(); ?>