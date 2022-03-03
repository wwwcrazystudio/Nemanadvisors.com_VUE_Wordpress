<?php /* Template Name: Сервис */ ?>

<?php get_header(); ?>

<main class="service-page">
    <section class="service-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <nav class="hero__breadcrumbs breadcrumbs" aria-label="breadcrumb">
                    <ol class="breadcrumbs__list">
                        <li class="breadcrumbs__item"><a class="breadcrumbs__link" href="<?= function_exists('pll_home_url') ? pll_home_url() : home_url(); ?>" title="<?php _e('Home', 'neman');?>"><?php _e('Home', 'neman');?></a></li>
                        <li class="breadcrumbs__item"><?php _e('Products & Services', 'neman');?></li>
                        <li class="breadcrumbs__item"><?php single_term_title();?></li>
                    </ol>
                </nav>
                <div class="hero__content">
                    <?php $heading = function () {
                        $pieces = explode(" ", single_term_title('', false));
                        $pieces[count($pieces) - 2] = '<span>' . $pieces[count($pieces) - 2];
                        $pieces[count($pieces) - 1] = $pieces[count($pieces) - 1] . '</span>';
                        return implode(" ", $pieces);
                    }; ?>

                    <h1 class="hero__heading"><?= $heading(); ?></h1>
                    <?php if (!empty(term_description())) : ?>
                        <div class="hero__text">
                            <?= term_description(); ?>
                        </div>
                    <?php endif; ?>
                    <?php $highlights = rwmb_meta('type_highlights', array('object_type' => 'term'), get_queried_object_id());
                    if (!empty($highlights)) : ?>
                        <div class="hero__meta-info meta-info">
                            <div class="meta-info__block">
                                <div class="meta-info__block-title"><?php _e('Key highlights', 'neman'); ?></div>
                                <ul class="meta-info__highlights">
                                    <?php foreach ($highlights as $highlight) : ?>
                                        <li class="meta-info__highlights-item">
                                            <div class="meta-info__highlights-icon">
                                                <img src=" <?= wp_get_attachment_image_url($highlight['icon'][0], 'thumbnail'); ?>" alt="<?= $highlight['title']; ?>">
                                            </div>
                                            <div class="meta-info__popup">
                                                <div class="meta-info__popup-title"><?= $highlight['title']; ?></div>
                                                <div class="meta-info__popup-descr">
                                                    <?= $highlight['excerpt']; ?>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="hero__foot">
                        <a href="#calc" class="hero__btn"><?php _e('Create project', 'neman'); ?></a>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <?php $img = rwmb_meta('type_img', array('object_type' => 'term', 'size' => 'full', 'limit' => 1), get_queried_object_id()); ?>
                    <?php if (!empty($img)) : ?>
                        <picture class="hero__img">
                            <source srcset="<?= $img[0]['url']; ?>.webp" type="image/webp">
                            <img src="<?= $img[0]['url']; ?>" alt="<?php single_term_title(); ?>">
                        </picture>
                    <?php else : ?>
                        <picture class="hero__img">
                            <source srcset="<?= THEME_PATH; ?>/assets/img/bg/service-bg.2d7767.jpg.webp" type="image/webp">
                            <img src="<?= THEME_PATH; ?>/assets/img/bg/service-bg.2d7767.jpg" alt="<?php single_term_title(); ?>">
                        </picture>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <div id="calc">
        <section id="project-calc" class="service-page__project-calc project-calc"></section>
    </div>
    <?php
    $args = array(
        'post_type' => 'project',
        'posts_per_page' => 2,
        'orderby' => 'menu_order',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'id',
                'terms' => get_queried_object_id(),
            ),
        ),
    );
    $query = new WP_Query($args); ?>

    <?php if ($query->have_posts()) : ?>
        <section class="service-page__related-projects related-projects">
            <div class="related-projects__list-wrap">
                <div class="container-fluid">
                    <h2 class="related-projects__heading"><?php _e('Related projects', 'neman'); ?></h2>

                    <ul class="related-projects__list" data-content>

                        <?php while ($query->have_posts()) : $query->the_post(); ?>

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

                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php if ($query->found_posts > 2) : ?>
                    <form class="filters__form" style="display:none">
                        <input type="hidden" name="related">
                        <input type="hidden" name="types[]" value="<?= get_queried_object_id(); ?>">
                        <input type="hidden" name="paged" value="1">
                        <input type="hidden" name="per_page" value="2">
                        <input type="hidden" name="post_type" value="project">
                        <input type="hidden" name="action" value="filter_form">
                        <input type="hidden" name="found_posts" value="<?=$query->found_posts;?>">
                    </form>
                    <button class="post-archive__load-btn"><?php _e('Load more', 'neman'); ?></button>
                <?php endif; ?>

                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="service-page__cv-form cv-form">
        <div class="container-fluid">
            <div class="cv-form__wrap">
                <div class="cv-form__col cv-form__col--left">
                    <h2 class="cv-form__heading"><?php _e('Contact us', 'neman'); ?></h2>
                    <div class="cv-form__text">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                        nisi ut aliquip ex ea commodo consequat.
                    </div>
                    <picture class="cv-form__bg">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/bg/cv-form-2.a65680.png.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/bg/cv-form-2.a65680.png" alt="">
                    </picture>
                </div>
                <div class="cv-form__col cv-form__col--right">
                    <form class="cv-form__form form">
                        <div class="form__title">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                            nisi ut aliquip ex ea commodo consequat.</div>
                        <div class="form__group">
                            <input name="name" id="name" class="form__control" placeholder="<?php _e('Your name', 'neman'); ?>" required>
                            <label for="name" class="form__label"><?php _e('Your name', 'neman'); ?></label>
                        </div>
                        <div class="form__group">
                            <input type="email" name="email" id="email" class="form__control" placeholder="<?php _e('E-mail', 'neman'); ?>">
                            <label for="email" class="form__label"><?php _e('E-mail', 'neman'); ?></label>
                        </div>
                        <div class="form__group">
                            <input type="tel" name="tel" id="tel" class="form__control" placeholder="<?php _e('Phone +7', 'neman'); ?>" required>
                            <label for="tel" class="form__label"><?php _e('Phone +7', 'neman'); ?></label>
                        </div>
                        <div class="form__group">
                            <textarea name="message" id="mesagge" class="form__control form__control--textarea" rows="2" placeholder="<?php _e('Comments', 'neman'); ?>"></textarea>
                            <label for="message" class="form__label"><?php _e('Comments', 'neman'); ?></label>
                        </div>
                        <div class="form__group form__group--checkbox">
                            <input type="checkbox" name="policy" id="policy" class="form__control" required>
                            <label for="policy" class="form__label"><?php _e('I have read and accept the Privacy policy'); ?></label>
                        </div>
                        <div class="form__foot">
                            <button class="form__btn"><?php _e('Send a request', 'neman'); ?></button>
                            <div class="form__group form__group--file">
                                <?php wp_nonce_field('attachment', 'fileup_nonce'); ?>
                                <input type="file" name="attachment" class="form__control" id="attachment">
                                <label for="attachment" class="form__label"><?php _e('Attach file', 'neman'); ?></label>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="contact_form">
                    </form>
                    <div class="cv-form__notice">
                        <?php _e('Thank you. Your message has been sent', 'neman'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php pagesNav('service-page'); ?>
</main>

<?php get_footer(); ?>