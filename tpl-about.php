<?php /* Template Name: О компании */ ?>

<?php get_header(); ?>

<main class="aboutus-page">
    <section class="aboutus-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <?php the_breadcrumbs('hero'); ?>
                <div class="hero__content">
                    <h1 class="hero__heading">
                        <?php _e('We are independent private Russian <span>advisory and management company</span>', 'neman') ?>
                    </h1>
                    <div class="hero__text">
                        <p><?php _e('Neman group established in 2013 by the former partners and directors of Ernst & Young, Accenture and Oliver Wyman.', 'neman') ?></p>
                        <p><?php _e('Company is splitted into two units – Neman Advisors and Neman Technology and is led by a team of 5 directors with joint decision making on key strategic issues and practice management.', 'neman') ?></p>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <picture class="hero__img">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/img/about-us-img.db0f82.jpg.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/img/about-us-img.db0f82.jpg" alt="<?php _e('We are independent private Russian advisory and management company', 'neman') ?>">
                    </picture>
                    <a href="" class="hero__img-link">
                        <?php _e('Watch the video', 'neman') ?>
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.135406 7H13.1354M13.1354 7L7.13541 1M13.1354 7L7.13541 13" stroke="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="aboutus-page__achievments achievments">
        <div class="achievments__wrap">
            <ul class="achievments__list achievments__list--primary">
                <li class="achievments__item achievments__item--accent">
                    <div class="achievments__item-title"><span>7</span> <?php _e('years', 'neman') ?></div>
                    <div class="achievments__item-info"><?php _e('<b>Professional</b> experience as Neman', 'neman') ?></div>
                </li>
                <li class="achievments__item">
                    <div class="achievments__item-title"><span>61</span> %</div>
                    <div class="achievments__item-info"><?php _e('<b>Our average annual</b> revenue growth', 'neman') ?></div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><span>2.1</span> <?php _e('BLN. EUR', 'neman') ?></div>
                    <div class="achievments__item-info"><?php _e('<b>In M&A, debt and equity</b> financing were secured with our team members involvement', 'neman') ?></div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><span>5</span> <?php _e('years', 'neman') ?></div>
                    <div class="achievments__item-info"><?php _e('<b>Avarage duration of relations</b> with our clients', 'neman') ?></div>
                </li>
            </ul>
            <ul class="achievments__list achievments__list--secondary">
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><span>30</span></div>
                    <div class="achievments__item-info"><?php _e('<b>Advisors work </b>permanently in Neman', 'neman') ?></div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><span>25</span></div>
                    <div class="achievments__item-info"><?php _e('<b>Technology and business</b> experts as subcontractors', 'neman') ?>
                    </div>
                </li>
                <li class="achievments__item">
                    <div class="achievments__item-title"><span>106</span></div>
                    <div class="achievments__item-info"><?php _e('<b>Projects and deals</b> accomplished in 7 years', 'neman') ?></div>
                </li>
                <li class="achievments__item achievments__item--accent">
                    <div class="achievments__item-title"><span>21</span></div>
                    <div class="achievments__item-info"><?php _e('<b>Countries of operation</b> in 7 years', 'neman') ?></div>
                </li>
            </ul>
        </div>
    </section>
    <section class="aboutus-page__about-company about-company">
        <div class="container-fluid">
            <div class="about-company__wrap">
                <h2 class="about-company__heading">
                    <?php _e('Winning is always a collective effort of many. Including those who stand behind the awards. <span>True champions are made by their crews and coaches</span>', 'neman') ?>
                </h2>
                <div class="about-company__content">
                    <div class="about-company__subheading">
                        <?php _e('Our team is carefully compiled from former Ernst & Young, Deloitte, Accenture, IBM, KPMG partners, directors and managers and industrial experts with average 12 years of professional experience and real sector practice.', 'neman') ?>
                    </div>
                    <div class="about-company__text">

                        <p>
                            <?php _e('Our internal team of 20 advisors is supported in our engagements by a team of 25
                            technology and business experts – former executives and specialists from Schlumberger,
                            ThomsonReuters, MTS, large oil and gas and metals and mining companies and technological
                            leaders, working on as-needed basis as temporary project subcontractors.', 'neman'); ?>
                        </p>
                        <p>
                            <?php _e('Nobody can cover all emerging professional competencies and questions, and in projects
                            Neman cooperates with top 5 international and domestic legal firms - members of Chambers
                            100 list, and leading technological companies.', 'neman'); ?>
                        </p>
                    </div>
                    <a href="<?php the_permalink( function_exists('pll_get_post') ? pll_get_post(128) : 128 );?>" class="about-company__btn"><?php _e('Our team', 'neman'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <?php $industries = get_terms(array(
        'taxonomy'      => 'categories',
        'orderby'       => 'name',
        'order'     => 'desc',
        'hide_empty' => false,
        'parent'      => function_exists('pll_get_term') ? pll_get_term(52) : 52,
    ));
    if (!empty($industries)) : ?>
        <section class="aboutus-page__industries industries">
            <div class="container-fluid industries__container">
                <div class="industries__wrap">
                    <div class="industries__info">
                        <h2 class="industries__heading"><?php _e('Industry', 'neman') ?> </h2>
                        <div class="industries__text"><?php _e('We focus on industries that have historically been the backbone of the Russian economy, but we are also looking to expand our presence in other segments', 'neman') ?> </div>
                    </div>
                    <div class="industries__industries-carousel industries-carousel">
                        <div class="industries-carousel__wrap">
                            <?php foreach ($industries as $industry) : ?>
                                <a href="<?= get_term_link($industry->term_id, 'categories'); ?>" class="industries-carousel__item">
                                    <picture class="industries-carousel__item-img">
                                        <?php $img = rwmb_meta('tax_img', array('object_type' => 'term', 'size' => 'large', 'limit' => 1), $industry->term_id); ?>
                                        <?php if (!empty($img)) : ?>
                                            <source srcset="<?= $img[0]['url']; ?>.webp" type="image/webp">
                                            <img src="<?= $img[0]['url']; ?>" alt="<?= $industry->name; ?>">
                                        <?php else : ?>
                                            <img src="https://via.placeholder.com/500/979797/979797" alt="">
                                        <?php endif; ?>
                                    </picture>
                                    <h3 class="industries-carousel__item-title"><?= $industry->name; ?></h3>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <section class="aboutus-page__projects-map projects-map">
        <div class="container-fluid">
            <h2 class="projects-map__heading"><?php _e('Act locally, think globally', 'neman') ?></h2>
            <div class="projects-map__text"><?php _e('We work in Russia and globally, with high concentration in EMEIA region', 'neman') ?></div>
        </div>
        <div id="projects-map"></div>
    </section>
    <?php $clients = rwmb_meta('client');;
    if (!empty($clients)) : ?>
        <section class="aboutus-page__clients clients">
            <div class="container-fluid">
                <h2 class="clients__heading"><?php _e('Landmark <span>clients</span>', 'neman') ?></h2>
                <ul class="clients__list">
                    <?php foreach ($clients as $client) : ?>
                        <li class="clients__item">
                            <picture class="clients__item-logo">
                                <source srcset="<?= wp_get_attachment_image_url( $client['logo'][0], 'medium', false ); ?>.webp" type="image/webp">
                                <img src="<?= wp_get_attachment_image_url( $client['logo'][0], 'medium', false ); ?>" alt="<?= $client['name']; ?>">
                            </picture>
                            <div class="clients__item-info">
                                <?= $client['excerpt']; ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    <?php endif; ?>
    <?php pagesNav('aboutus-page'); ?>
</main>

<?php get_footer(); ?>