<?php /* Template Name: HR */ ?>

<?php get_header(); ?>

<main class="hr-page">
    <section class="hr-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <?php the_breadcrumbs('hero'); ?>
                <div class="hero__content">
                    <?php $heading = function () {
                        $pieces = explode(" ", get_the_title());
                        $pieces[count($pieces) - 3] = '</br><span>' . $pieces[count($pieces) - 3];
                        $pieces[count($pieces) - 1] = $pieces[count($pieces) - 1] . '</span>';
                        return implode(" ", $pieces);
                    }; ?>

                    <h1 class="hero__heading"><?= $heading(); ?></h1>
                    <p class="hero__text">
                        <?php _e('Experience and skills of our employees are the engine that drive us forward.
                        Each member of our team is an integral part of a complex system that allows us to deliver value to our clients.
                        Day by day we are improving this system and looking for new structural elements that will reach us to a new level in ever-changing world.', 'neman'); ?>
                    </p>
                    <div class="hero__foot">
                        <a href="#form" class="hero__btn"><?php _e('Send CV', 'neman'); ?></a>
                        <a href="https://hh.ru/employer/2936063" targget="_blank" rel="nofollow" download class="hero__btn hero__btn--dark"><?php _e('View vacancies', 'neman'); ?></a>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <picture class="hero__img">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/img/hr-hero-img.3db69a.jpg.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/img/hr-hero-img.3db69a.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="hr-page__achievments achievments">
        <div class="achievments__wrap">
            <ul class="achievments__list achievments__list--single">
                <li class="achievments__item achievments__item--accent">
                    <div class="achievments__item-title"><?php _e('<span>20</span> advisors', 'neman'); ?></div>
                    <div class="achievments__item-info">
                        <?php _e('<b>Work permanently</b> in Neman'); ?>
                    </div>
                </li>
                <li class="achievments__item">
                    <div class="achievments__item-title"><?php _e('<span>25</span> experts', 'neman'); ?></div>
                    <div class="achievments__item-info">
                        <?php _e('<b>Technology and business</b> experts as subcontractors'); ?>
                    </div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><?php _e('<span>12</span> years', 'neman'); ?></div>
                    <div class="achievments__item-info">
                        <?php _e('<b>Our employees average</b> professional experience and real sector practice'); ?>
                    </div>
                </li>
                <li class="achievments__item achievments__item--dark">
                    <div class="achievments__item-title"><?php _e('<span>10</span> %', 'neman'); ?></div>
                    <div class="achievments__item-info">
                        <?php _e('<b>We dedicate 10% of our team</b> annual working time to continuous learning'); ?>
                    </div>
                </li>
            </ul>
        </div>
    </section>
    <section class="hr-page__content">
        <div class="container-fluid">
            <div class="hr-page__content-wrap">
                <div class="hr-page__col hr-page__col--left">
                    <div class="hr-page__inner-content">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="hr-page__col hr-page__col--right">
                    <div class="hr-page__timeline timeline">
                        <ul class="timeline__list">
                            <li class="timeline__item">
                                <div class="timeline__item-title"><?php _e('Trainee', 'neman'); ?></div>
                                <div class="timeline__item-description">
                                    <?php _e('A part-time job for everyone who wants to try themselves in management consulting.', 'neman'); ?>
                                </div>
                                <div class="timeline__item-experience"><?= sprintf(_n('%s year', '%s years', 1, 'neman'), '1'); ?></div>
                            </li>
                            <li class="timeline__item">
                                <div class="timeline__item-title"><?php _e('Analyst / Senior Analyst', 'neman'); ?></div>
                                <div class="timeline__item-description">
                                    <?php _e('A typical entry point for career starting. You"ll support a team of consultants in research, data collection and analysis, as well as you will develop your professional skills.', 'neman'); ?>
                                </div>
                                <div class="timeline__item-experience"><?= sprintf(_n('%s year', '%s years', 3, 'neman'), '1-3'); ?></div>
                            </li>
                            <li class="timeline__item">
                                <div class="timeline__item-title"><?php _e('Consultant / Senior Consultant', 'neman'); ?></div>
                                <div class="timeline__item-description">
                                    <?php _e('You"ll be responsible for identifying issues, forming hypotheses and helping with the implementation of change. Consultant will manage larger aspects of the problem solving process and be responsible for presenting findings and formulating recommendations.', 'neman'); ?>
                                </div>
                                <div class="timeline__item-experience"><?= sprintf(_n('%s year', '%s years', 5, 'neman'), '3-5'); ?></div>
                            </li>
                            <li class="timeline__item">
                                <div class="timeline__item-title"><?php _e('Manager / Senior Manager', 'neman'); ?></div>
                                <div class="timeline__item-description">
                                    <?php _e('Manager will oversee a stream of a large project and be appointed as project manager on smaller projects. It"s the manager who is in charge of assigning work to the team, and leading and managing members in that team.', 'neman'); ?>
                                </div>
                                <div class="timeline__item-experience"><?= sprintf(_n('%s year', '%s years', 10, 'neman'), '3-10'); ?></div>
                            </li>
                            <li class="timeline__item">
                                <div class="timeline__item-title"><?php _e('Director', 'neman'); ?></div>
                                <div class="timeline__item-description">
                                    <?php _e('As a director you will project manage all phases of the project and be accountable for the timely delivery of the project. Moreover directors oversee the growth and direction of the firm, and are accountable for defining innovative strategies and achieving results. Promotion to this level is a formal acknowledgement of personal merit and accomplishment.', 'neman'); ?>
                                </div>
                                <div class="timeline__item-experience"><?php _e('Director', 'neman'); ?></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="hr-page__cv-form cv-form" id="form">
        <div class="container-fluid">
            <div class="cv-form__wrap">
                <div class="cv-form__col cv-form__col--left">
                    <h2 class="cv-form__heading"><?php _e('Send CV', 'neman'); ?></h2>
                    <div class="cv-form__text"><?php _e('Are you ready to apply your knowledge and background to exciting new challenges?', 'neman'); ?></div>
                    <picture class="cv-form__bg">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/bg/cv-form.30b4a5.png.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/bg/cv-form.30b4a5.png" alt="">
                    </picture>
                </div>
                <div class="cv-form__col cv-form__col--right">
                    <form class="cv-form__form form">
                        <div class="form__title"><?php _e('It is your chance to take your career to the next level. Send us your CV today.', 'neman'); ?></div>
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
                            <textarea name="message" id="message" class="form__control form__control--textarea" rows="2" placeholder="<?php _e('Comments', 'neman'); ?>"></textarea>
                            <label for="mesagge" class="form__label"><?php _e('Comments', 'neman'); ?></label>
                        </div>
                        <div class="form__group form__group--checkbox">
                            <input type="checkbox" name="policy" id="policy" class="form__control" required>
                            <label for="policy" class="form__label"><?php _e('I have read and accept the Privacy policy');?></label>
                        </div>
                        <div class="form__foot">
                            <button class="form__btn"><?php _e('Send CV', 'neman'); ?></button>
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
    <?php pagesNav('hr-page'); ?>
</main>

<?php get_footer(); ?>