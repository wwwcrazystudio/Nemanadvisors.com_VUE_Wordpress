<?php /* Template Name: CSR */ ?>

<?php get_header(); ?>

<main class="csr-page">
    <section class="csr-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <?php the_breadcrumbs('hero'); ?>
                <div class="hero__content">
                    <?php $heading = function () {
                        $pieces = explode(" ", get_the_title());
                        $pieces[count($pieces) - 1] = '<span>' .$pieces[count($pieces) - 1] . '</span>';
                        return implode(" ", $pieces);
                    }; ?>

                    <h1 class="hero__heading"><?= $heading(); ?></h1>
                    <p class="hero__text">
                        <?php _e('We work as an open platform organization, cooperating with technology
                        leaders, local and global leading service providers to deliver the complex services and
                        bridge our gap in specific narrow competencies or solutions', 'neman'); ?>
                    </p>
                    <div class="hero__foot">
                        <a href="<?php the_permalink( function_exists('pll_get_post') ? pll_get_post(23) : 23 );?>" class="hero__btn"><?php _e('Contact us', 'neman'); ?></a>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <picture class="hero__img">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/bg/csr-hero.fa0f8e.jpg.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/bg/csr-hero.fa0f8e.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="csr-page__achievments achievments">
        <div class="achievments__wrap">
            <ul class="achievments__list achievments__list--single">
                <li class="achievments__item achievments__item--accent">
                    <div class="achievments__item-title"><?php _e('<span>400</span> people', 'neman'); ?></div>
                    <div class="achievments__item-info">
                        <?php _e('<b>Were trained in professional</b> matters by our team for the last 6 years', 'neman'); ?>
                    </div>
                </li>
                <li class="achievments__item">
                    <div class="achievments__item-title"><?php _e('<span>45</span> professionals', 'neman'); ?></div>
                    <div class="achievments__item-info"><?php _e('<b>Successfully referred</b> by our team', 'neman'); ?></div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><?php _e('<span>>500</span> working<br>places', 'neman'); ?></div>
                    <div class="achievments__item-info"><?php _e('<b>Were created with the </b>assistance of our team', 'neman'); ?></div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><?php _e('<span>>2</span> mln. citizens', 'neman'); ?></div>
                    <div class="achievments__item-info"><?php _e('<b>Avarage duration of relations</b> with our clients', 'neman'); ?></div>
                </li>
            </ul>
        </div>
    </section>
    <?php $partners = rwmb_meta('csr_partner');
    if (!empty($partners)) : ?>
    <section class="csr-page__csr-partners csr-partners">
        <div class="container-fluid">
            <ul class="csr-partners__list">
                <?php foreach ($partners as $partner) : ?>
                <li class="csr-partners__partner">
                    <picture class="csr-partners__partner-img">
                        <source srcset="<?= wp_get_attachment_image_url($partner['logo'][0], 'medium', false); ?>.webp" type="image/webp">
                        <img src="<?= wp_get_attachment_image_url($partner['logo'][0], 'medium', false); ?>" alt="<?=$partner['name'];?>" title="<?=$partner['name'];?>">
                    </picture>
                    <div class="csr-partners__partner-title"><?=$partner['name'];?></div>
                    <div class="csr-partners__partner-info">
                        <?=$partner['excerpt'];?>
                    </div>
                </li>
                <?php endforeach;?>
            </ul>
        </div>
    </section>
    <?php endif;?>
    <?php pagesNav('csr-page'); ?>
</main>

<?php get_footer(); ?>