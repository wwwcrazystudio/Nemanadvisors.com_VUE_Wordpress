<?php /* Template Name: Команда */ ?>

<?php get_header(); ?>

<main class="team-page">
    <div class="team-page__bg"></div>
    <div class="team-page__carousel-wrap">
        <div class="container-fluid">
            <?php the_breadcrumbs('team-page'); ?>
            <section class="team-page__team-carousel team-carousel">

                <?php $team = rwmb_meta('team');
                $name = function ($person) {
                    $pieces = explode(" ", $person['person_name']);
                    $pieces[count($pieces) - 1] = '<span>' . $pieces[count($pieces) - 1] . '</span>';
                    return implode(" ", $pieces);
                };
                $job_1 = $team[0]['slider']['job'];
                $expertise_1 = $team[0]['slider']['exp'];
                $modalImg_1 = wp_get_attachment_image_src($team[0]['modal']['team_img_modal'][0], 'large')[0];
                $modalSubheading_1 = $team[0]['modal']['team_subheading_modal'];
                $modalContent_1 = $team[0]['modal']['team_content_modal'];
                ?>

                <div class="team-carousel__person-info">
                    <div class="team-person__name"><?= $name($team[0]); ?></div>
                    <div class="team-person__job"><?= $job_1; ?></div>
                    <div class="team-person__meta-info meta-info">
                        <div class="meta-info__block">
                            <div class="meta-info__block-title"><?php _e('Expertise', 'neman'); ?></div>
                            <div class="meta-info__meta-description"><?= $expertise_1; ?>
                            </div>
                        </div>
                    </div>
                    <button class="team-person__btn" data-modal="person-modal"><?php _e('Details', 'neman'); ?></button>
                </div>
                <div class="team-carousel__wrap">
                    <?php foreach ($team as $person) :
                        $job = $person['slider']['job'];
                        $expertise = $person['slider']['exp'];
                        $img = wp_get_attachment_image_src($person['slider']['img'][0], 'full')[0];
                        $modalImg = wp_get_attachment_image_src($person['modal']['team_img_modal'][0], 'large')[0];
                        $modalSubheading = $person['modal']['team_subheading_modal'];
                        $modalContent = $person['modal']['team_content_modal'];
                    ?>
                        <div class="team-carousel__person" data-name="<?= $name($person); ?>" data-job="<?= $job; ?>" data-expertise="<?= $expertise; ?>" data-subtitle="<?= $modalSubheading; ?>" data-modalcontent="<?= $modalContent; ?>" data-img="<?= $modalImg; ?>">
                            <picture class="team-carousel__person-img">
                                <source srcset="<?= $img; ?>.webp" type="image/webp">
                                <img src="<?= $img; ?>" alt="<?= $person['slider']['name']; ?>">
                            </picture>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if (count($team) > 1) : ?>
                    <div class="team-carousel__controls">
                        <button class="team-carousel__control team-carousel__control--prev" disabled="disabled">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M25.8733 11.7464H1.39438M1.39438 11.7464L12.6923 0.619629M1.39438 11.7464L12.6923 22.8732" stroke="#231F20" />
                            </svg>
                        </button>
                        <button class="team-carousel__control team-carousel__control--next">
                            <svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0.126648 11.7464H24.6056M24.6056 11.7464L13.3076 0.619629M24.6056 11.7464L13.3076 22.8732" stroke="#231F20" />
                            </svg>
                        </button>
                    </div>
                    <div class="team-carousel__counter">
                        <var class="team-carousel__counter-num team-carousel__counter-num--current">1</var>
                        <var class="team-carousel__counter-num team-carousel__counter-num--total">1</var>
                    </div>
                <?php endif; ?>
                <div class="team-carousel__modal modal" id="person-modal" style="display:none">
                    <div class="modal__body modal__body--img">
                        <button class="modal__close">
                            <svg width="32" height="31" viewBox="0 0 32 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <line x1="1.35355" y1="0.646935" x2="31.3529" y2="30.6463" stroke="#979797" />
                                <line x1="0.646447" y1="30.6457" x2="30.6458" y2="0.646359" stroke="#979797" />
                            </svg>
                        </button>
                        <div class="modal__img-wrap modal__img-wrap--desktop">
                            <img class="modal__img" src="<?= $modalImg_1; ?>" alt="">
                            <div class="modal__img-caption">
                                <span class="modal__img-num">01</span> <?= $job_1; ?>
                            </div>
                        </div>
                        <div class="modal__img-wrap modal__img-wrap--xs">
                            <img class="modal__img" src="<?= $modalImg_1; ?>" alt="">
                            <div class="modal__head modal__head--xs">
                                    <div class="modal__title"><?= $name($team[0]); ?></div>
                                    <div class="modal__subtitle"><?= $modalSubheading_1; ?></div>
                                </div>
                            <div class="modal__img-caption">
                                <span class="modal__img-num">01</span> <?= $job_1; ?>
                            </div>
                        </div>
                        <div class="modal__content-wrap">
                            <div class="modal__inner-content">
                                <div class="modal__head modal__head--desktop">
                                    <div class="modal__title"><?= $name($team[0]); ?></div>
                                    <div class="modal__subtitle"><?= $modalSubheading_1; ?></div>
                                </div>
                                <div class="modal__content">
                                    <?= $modalContent_1; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

<?php get_footer(); ?>