<?php /* Template Name: Партнеры */ ?>

<?php get_header(); ?>

<main class="partners-page">
    <section class="partners-page__hero hero">
        <div class="hero__wrap">
            <div class="container-fluid hero__container">
                <?php the_breadcrumbs('hero'); ?>
                <div class="hero__content">
                    <h1 class="hero__heading"><?php _e('Collaborative <span>business model</span>', 'neman'); ?></h1>
                    <p class="hero__text"><?php _e('We work as an open platform organization, cooperating with technology  leaders, local and global leading service providers to deliver the complex services and bridge our gap in specific narrow competencies or solutions', 'neman'); ?></p>
                    <div class="hero__foot">
                        <a href="<?php the_permalink( function_exists('pll_get_post') ? pll_get_post(23) : 23 );?>" class="hero__btn"><?php _e('Contact us', 'neman'); ?></a>
                    </div>
                </div>
                <div class="hero__img-wrap">
                    <picture class="hero__img">
                        <source srcset="<?= THEME_PATH; ?>/assets/img/img/partners-hero-img.a87bd4.jpg.webp" type="image/webp">
                        <img src="<?= THEME_PATH; ?>/assets/img/img/partners-hero-img.a87bd4.jpg" alt="">
                    </picture>
                </div>
            </div>
        </div>
    </section>
    <section class="partners-page__partners-knowledge">
        <div class="container-fluid">
            <h2 class="partners-knowledge__heading">
                <?php _e('Sometimes projects we do require multidisciplinary knowledge or razor sharp specific narrow competency that we do not have, but <span>our partners do</span>', 'neman'); ?>
            </h2>
            <div class="partners-knowledge__knowledge-scheme">
                <div class="knowledge-scheme__diagram">
                    <lottie-player id="diagram" mode="normal"></lottie-player>
                </div>
                <ul class="knowledge-scheme__list">
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title">
                            <?php _e('Technology and machinery leading developers and
                            manufacturers', 'neman'); ?>
                        </h3>
                        <div class="knowledge-scheme__item-description">
                            <?php _e('Materials, machinery and equipment
                            producers, leaders in aerospace, composite materials, electronics, chemicals, utilities,
                            energy and transport.', 'neman'); ?>
                        </div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Scientists and research institutions', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('Academic organizations and think tanks', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('A technological companies and service providers', 'neman'); ?>
                        </h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('Global leaders in digitalization,
                            environmental engineering, environmental services, data science, advanced technology
                            developers, global construction and engineering firms.', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Markets and industries experts and former
                            executives', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('Former board members, executives, advisory
                            companies and individuals.', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Technology experts', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('R&D experts, leading R&D companies, mining
                            consultants, engineers, former technology strategists and executives.', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Legal and taxadvisors', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('Chambers 500 international tax and legal
                            firms, audit companies.', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Software developers and data providers', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('Software companies, data and information
                            companies', 'neman'); ?></div>
                    </li>
                    <li class="knowledge-scheme__item">
                        <h3 class="knowledge-scheme__item-title"> <?php _e('Special services providers', 'neman'); ?></h3>
                        <div class="knowledge-scheme__item-description"> <?php _e('PPP advisors, appraisers, risk brokers,
                            financial institutions, risk management and investigation advisors, global construction
                            and engineering advisors, urban planners.', 'neman'); ?></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="partners-page__collaboration-case collaboration-case">
        <div class="container-fluid">
            <h2 class="collaboration-case__heading"><?php _e('Collabration <span>case</span>', 'neman'); ?></h2>

            <div class="collaboration-case__subheading"><?= rwmb_meta('collab_heading'); ?></div>
            <div class="collaboration-case__wrap">
                <div class="collaboration-case__part collaboration-case__part--investor">
                    <?php $investor = rwmb_meta('investor'); ?>
                    <div class="collaboration-case__part-title"><?php _e('Project investor', 'neman'); ?></div>
                    <div class="collaboration-case__part-head">
                        <div class="collaboration-case__partner-logo"><img src="<?= wp_get_attachment_image_url($investor['logo'][0], 'medium', false); ?>" alt="<?= $investor['name']; ?>" title="<?= $investor['name']; ?>"></div>
                        <div class="collaboration-case__partner-info"><?= $investor['name']; ?><a target="_blank" rel="nofollow" href="http://<?= $investor['link']; ?>"><?= $investor['link']; ?></a>
                        </div>
                    </div>
                    <div class="collaboration-case__partner-task"><?php _e('Client', 'neman'); ?></div>
                    <picture class="collaboration-case__img">
                        <source srcset="<?= wp_get_attachment_image_url($investor['project_img'][0], 'large', false); ?>.webp" type="image/webp">
                        <img src="<?= wp_get_attachment_image_url($investor['project_img'][0], 'large', false); ?>" alt="">
                    </picture>
                    <div class="collaboration-case__target"><?= $investor['project_excerpt']; ?></div>
                    <a href="<?= $investor['project_link']; ?>" class="collaboration-case__btn"><?php _e('Learn More', 'neman'); ?></a>
                </div>
                <div class="collaboration-case__part collaboration-case__part--team">
                    <div class="collaboration-case__part-title">
                        <?php _e('Joint project team <span>(Joint Cooperation Agreement)</span>', 'neman'); ?>
                    </div>
                    <ul class="collaboration-case__team">
                        <li class="collaboration-case__team-member">
                            <?php $partner = rwmb_meta('partner'); ?>
                            <div class="collaboration-case__part-head">
                                <div class="collaboration-case__partner-logo"><img src="<?= wp_get_attachment_image_url($partner['logo'][0], 'medium', false); ?>" alt="<?= $partner['name']; ?>" title="<?= $partner['name']; ?>"></div>
                                <div class="collaboration-case__partner-info"><?= $partner['name']; ?><a target="_blank" rel="nofollow" href="http://<?= $partner['link']; ?>"><?= $partner['link']; ?></a>
                                </div>
                            </div>
                            <div class="collaboration-case__partner-task"><?= $partner['role']; ?></div>
                            <div class="collaboration-case__partner-roles partner-roles">
                                <div class="partner-roles__title"><?php _e('Roles', 'neman'); ?></div>
                                <?php if (!empty($partner['tasks'])) : ?>
                                    <ul class="partner-roles__list">
                                        <?php foreach ($partner['tasks'] as $task) : ?>
                                            <li class="partner-roles__item"><?= $task['task']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($partner['team'])) : ?>
                                <div class="collaboration-case__partner-team partner-team">
                                    <div class="partner-team__title"><?php _e('Team', 'neman'); ?></div>
                                    <div class="partner-team__personal">
                                        <?php $num = $partner['team']['num'];
                                        foreach (range(0, $num) as $number) : ?>
                                            <img src="<?= THEME_PATH; ?>/assets/img/img/engineer.ca24a3.svg" alt="">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="partner-team__info"><?= $partner['team']['descr']; ?></div>
                                </div>
                            <?php endif; ?>
                        </li>
                        <li class="collaboration-case__team-member">
                            <?php $partner = rwmb_meta('our_company'); ?>
                            <div class="collaboration-case__part-head">
                                <div class="collaboration-case__partner-logo"><img src="<?= THEME_PATH; ?>/assets/img/img/neman.3e8401.svg" alt="Neman Group LLC" title="Neman Group LLC"></div>
                                <div class="collaboration-case__partner-info">Neman Group LLC <a href="http://nemanadvisors.com/">nemanadvisors.com</a></div>
                            </div>
                            <div class="collaboration-case__partner-task"><?= $partner['role']; ?></div>
                            <div class="collaboration-case__partner-roles partner-roles">
                                <div class="partner-roles__title"><?php _e('Roles', 'neman'); ?></div>
                                <?php if (!empty($partner['tasks'])) : ?>
                                    <ul class="partner-roles__list">
                                        <?php foreach ($partner['tasks'] as $task) : ?>
                                            <li class="partner-roles__item"><?= $task['task']; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <?php if (!empty($partner['team'])) : ?>
                                <div class="collaboration-case__partner-team partner-team">
                                    <div class="partner-team__title"><?php _e('Team', 'neman'); ?></div>
                                    <div class="partner-team__personal">
                                        <?php $num = $partner['team']['num'];
                                        foreach (range(0, $num) as $number) : ?>
                                            <img src="<?= THEME_PATH; ?>/assets/img/img/advisor.fbd532.svg" alt="">
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="partner-team__info"><?= $partner['team']['descr']; ?></div>
                                </div>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php pagesNav('partners-page'); ?>
</main>

<?php get_footer(); ?>