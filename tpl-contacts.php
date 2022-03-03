<?php /* Template Name: Контакты */ ?>

<?php get_header(); ?>

<main class="contacts-page">
    <section class="contacts-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <?php the_breadcrumbs('hero'); ?>
                <div class="hero__content">
                    <h1 class="hero__heading">Neman Group <span>LLC</span></h1>
                    <div class="hero__meta-info meta-info">
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Phone', 'neman'); ?></div>
                            <div class="meta-info__meta-description"><a class="meta-info__contact-link" href="tel:+74959467551">+7 (495) 946-7551</a></div>
                        </div>
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Email', 'neman'); ?></div>
                            <div class="meta-info__meta-description"><a class="meta-info__contact-link" href="mailto:info@nemanadvisors.com">info@nemanadvisors.com</a></div>
                        </div>
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Address', 'neman'); ?></div>
                            <div class="meta-info__meta-description"><?php _e('117638, Moscow, Russia, Odessa st. 2,
                                structure. 3<br>Business Center Lotus, Tower C, floor 3', 'neman'); ?></div>
                        </div>
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Director', 'neman'); ?></div>
                            <div class="meta-info__meta-description"><?php _e('Oleg Danilin', 'neman'); ?></div>
                        </div>
                    </div>
                    <div class="hero__foot">
                        <button class="hero__btn" data-modal="callback-modal"><?php _e('Send message', 'neman'); ?></button>
                        <a href="" download class="hero__btn hero__btn--dark"><?php _e('Download Presentation', 'neman'); ?></a>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <div class="hero__map" id="map"></div>
                </div>
            </div>
        </div>
    </section>
    <?php pagesNav('contacts-page'); ?>
</main>

<?php get_footer(); ?>