<?php get_header(); ?>

<main class="faq-archive">
    <div class="container-fluid">
        <?php the_breadcrumbs('faq-archive'); ?>
    </div>
    <section class="faq-archive__content">
        <div class="container-fluid">
            <h1 class="faq-archive__heading"><?php _e('Frequently Asked <span>Questions</span>'); ?></h1>
        </div>
        <div class="faq-archive__list-wrap">

            <?php $cats = get_terms(array(
                'taxonomy'      => 'theme',
                'orderby'       => 'name',
                'order'     => 'desc',
                'hide_empty' => false,
                'parent'    => 0,
            ));
            if (!empty($cats)) : ?>
                <div class="faq-archive__filters filters">
                    <div class="filters__wrap">
                        <div class="filters__title"><?php _e('Filter', 'neman'); ?></div>
                        <form class="filters__form">
                            <?php foreach ($cats as $cat) : ?>
                                <div class="filters__group">
                                    <label for="<?= $cat->term_id; ?>" class="filters__label sr-only"><?= $cat->name; ?></label>
                                    <select name="theme[]" id="<?= $cat->term_id; ?>" class="filters__control" data-placeholder="<?= $cat->name; ?>">
                                        <option></option>
                                        <?php $subcats = get_terms(array(
                                            'taxonomy'      => 'theme',
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
                            <div class="filters__group filters__group--search">
                                <label for="search" class="filters__label sr-only"><?php _e('Search', 'neman'); ?></label>
                                <input name="s" id="search" placeholder="<?php _e('Search', 'neman'); ?>" class="filters__control filters__control--search">
                            </div>
                            <input type="hidden" name="post_type" value="faq">
                            <input type="hidden" name="paged" value="1">
                            <input type="hidden" name="per_page" value="-1">
                            <input type="hidden" name="action" value="filter_form">
                        </form>

                    </div>
                </div>
            <?php endif;
            $args = array(
                'post_type' => 'faq',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
            );
            $query = new WP_Query($args); ?>

            <?php if ($query->have_posts()) : ?>
                <div class="container-fluid">
                    <ul class="faq-archive__list" data-content>
                        <?php while ($query->have_posts()) : $query->the_post();
                            get_template_part('template-parts/content', 'faq');
                        endwhile; ?>
                    </ul>

                    <?php wp_reset_postdata(); ?>

                </div>

            <?php endif; ?>
        </div>
    </section>
    <?php pagesNav('faq-archive'); ?>
</main>

<?php get_footer(); ?>