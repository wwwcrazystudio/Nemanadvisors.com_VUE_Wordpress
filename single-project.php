<?php get_header(); ?>

<main class="project-single">
    <section class="project-single__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <a href="<?= get_post_type_archive_link('project'); ?>" class="hero__link-back">
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.7144 6H1.00007M1.00007 6L5.94513 1M1.00007 6L5.94513 11" stroke="#EBEBEB" />
                    </svg>
                    <?php _e('Back', 'neman'); ?>
                </a>
                <div class="hero__content">
                    <?php $heading = function () {
                        $pieces = explode(" ", get_the_title());
                        $pieces[count($pieces) - 2] = '<span>' . $pieces[count($pieces) - 2];
                        $pieces[count($pieces) - 1] = $pieces[count($pieces) - 1] . '</span>';
                        return implode(" ", $pieces);
                    }; ?>

                    <h1 class="hero__heading"><?= $heading(); ?></h1>
                    <div class="hero__meta-info meta-info">
                        <?php get_template_part('template-parts/content', 'tags'); ?>
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Client', 'neman'); ?></div>
                            <div class="meta-info__meta-description">
                                <?= rwmb_meta('proj_client'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <picture class="hero__img">
                        <source srcset="<?php the_post_thumbnail_url('full'); ?>.webp" type="image/webp">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="<?php the_title(); ?>">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="project-single__content">
        <div class="container-fluid">
            <div class="project-single__content-wrap">
                <div class="project-single__col project-single__col--left">
                    <div class="project-single__project-services project-services">
                        <div class="project-services__title"><?php _e('Service & products', 'neman'); ?></div>
                        <h2 class="project-single__subheading"><?= rwmb_meta('proj_task'); ?></h2>
                        <ul class="project-services__services-list">
                            <?php $services = rwmb_meta('proj_services');
                            foreach ($services as $service) : ?>
                                <li class="project-services__service-item">
                                    <?php $icon = rwmb_meta('service_icon', array('limit' => 1), $service)[0]['url']; ?>
                                    <div class="project-services__service-item-icon" <?= empty($icon) ? 'style="background:#979797"' : ''; ?>>
                                        <?php if (!empty($icon)) : ?>
                                            <img src="<?= $icon; ?>" alt="<?= get_the_title($service); ?>" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="project-services__service-item-title">
                                        <?= get_the_title($service); ?>
                                    </div>
                                    <div class="project-services__service-item-description">
                                        <?= rwmb_meta('service_description', array(), $service); ?>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="project-single__col project-single__col--right">
                    <div class="project-single__project-targets project-targets">
                        <h2 class="project-single__subheading">
                            <?= rwmb_meta('proj_task_2'); ?>
                        </h2>
                        <ul class="project-targets__description">
                            <li class="project-targets__description-item">
                                <div class="project-targets__item-title"><?php _e('Problem', 'neman'); ?></div>
                                <div class="project-targets__item-info">
                                    <?= rwmb_meta('proj_problem'); ?>
                                </div>
                            </li>
                            <li class="project-targets__description-item">
                                <div class="project-targets__item-title"><?php _e('Decision', 'neman'); ?></div>
                                <div class="project-targets__item-info">
                                    <?= rwmb_meta('proj_decision'); ?>
                                </div>
                            </li>
                            <li class="project-targets__description-item">
                                <div class="project-targets__item-title"><?php _e('Result', 'neman'); ?></div>
                                <div class="project-targets__item-info">
                                    <?= rwmb_meta('proj_result'); ?>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-single__project-gallery project-gallery">
            <div class="project-gallery__tabs">
                <?php $video = rwmb_meta('proj_video');
                $photo = rwmb_meta('proj_photo', array('size' => 'full'));
                if (!empty($video)) : ?>
                    <button class="project-gallery__tab project-gallery__tab--active" data-type="video"><?php _e('Video', 'neman'); ?></button>
                <?php endif;
                if (!empty($photo)) : ?>
                    <button class="project-gallery__tab" data-type="photo"><?php _e('Photo', 'neman'); ?></button>
                <?php endif; ?>
            </div>
            <div class="project-gallery__content-wrap">
                <?php if (!empty($video)) : ?>
                    <div class="project-gallery__content" data-type="video" <?= empty($video) ? 'style="display: none"' : ''; ?>>
                        <a href="<?= $video['link']; ?>" class="project-gallery__video-link">
                            <picture class="project-gallery__video-poster">
                                <source srcset="<?= wp_get_attachment_image_url($video['poster'][0], 'full', false); ?>.webp" type="image/webp">
                                <img src="<?= wp_get_attachment_image_url($video['poster'][0], 'full', false); ?>" alt="<?= $video['caption']; ?>">
                            </picture>
                            <div class="project-gallery__video-caption">
                                <span>
                                    <?= $video['caption']; ?>
                                </span>
                            </div>
                        </a>
                    </div>
                <?php endif;
                if (!empty($photo)) : ?>
                    <div class="project-gallery__content" data-type="photo"  <?= !empty($video) ? 'style="display: none"' : ''; ?>>
                        <div class="project-gallery__carousel-wrap">
                            <button class="project-gallery__control project-gallery__control--prev"><svg width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg" transform="rotate(180)">
                                    <circle cx="50.5" cy="50.5" r="50" stroke="white" />
                                    <path d="M40 51H62M62 51L51.8462 41M62 51L51.8462 61" stroke="white" />
                                </svg>
                            </button>
                            <div class="project-gallery__carousel">
                                <?php foreach ($photo as $img) : ?>
                                    <div class="project-gallery__gallery-item">
                                        <picture class="project-gallery__photo">
                                            <source srcset="<?= $img['url']; ?>.webp" type="image/webp">
                                            <img src="<?= $img['url']; ?>" alt="">
                                        </picture>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="project-gallery__control project-gallery__control--next">
                                <svg width="101" height="101" viewBox="0 0 101 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="50.5" cy="50.5" r="50" stroke="white" />
                                    <path d="M40 51H62M62 51L51.8462 41M62 51L51.8462 61" stroke="white" />
                                </svg>
                            </button>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php postsNav('project-single', 'project'); ?>
</main>

<?php get_footer(); ?>