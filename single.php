<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Neman
 */

get_header(); ?>

<main class="post-single">
	<section class="post-single__hero">
		<div class="hero__wrap">
			<div class="container-fluid hero__container">
				<a href="<?= get_post_type_archive_link( 'post' ); ?>" class="hero__link-back">
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
						<?php $terms = get_the_terms(get_the_ID(), 'category');
						if (!empty($terms)) : ?>
							<div class="meta-info__block">
								<div class="meta-info__block-title"><?php _e('Tags', 'neman'); ?></div>
								<ul class="meta-info__meta-list">
									<?php foreach ($terms as $term) : ?>
										<li class="meta-info__meta-item">
											<a href="<?= get_term_link($term->term_id, 'category'); ?>" class="meta-info__meta-link"><?= $term->name; ?></a>
										</li>
									<?php endforeach; ?>
								</ul>
							</div>
						<?php endif; ?>
						<div class="meta-info__block">
							<div class="meta-info__block-title"><?php _e('Description'); ?></div>
							<div class="meta-info__meta-description">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</div>
					<div class="post-single__post-date post-single__post-date--xs">
						<div class="post-date__title"><?php _e('Date', 'neman'); ?></div>
						<time timedate="<?= get_the_date('Y-m-d'); ?>" class="post-date__date"><?= get_the_date('j F Y'); ?></time>
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
	<section class="post-single__content">
		<div class="container-fluid">
			<div class="post-single__content-wrap">
				<div class="post-single__col project-single__col--left">
					<div class="post-single__post-content">
						<?php the_content(); ?>
					</div>
				</div>
				<div class="post-single__col project-single__col--right">
					<div class="post-single__post-date">
						<div class="post-date__title"><?php _e('Date', 'neman'); ?></div>
						<time timedate="<?= get_the_date('Y-m-d'); ?>" class="post-date__date"><?= get_the_date('j F Y'); ?></time>
					</div>
					<div class="post-single__share share">
						<?php get_template_part('template-parts/content', 'share'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php postsNav('project-single', 'post'); ?>
</main>

<?php get_footer();
