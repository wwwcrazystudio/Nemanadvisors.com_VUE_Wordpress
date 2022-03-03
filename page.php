<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Neman
 */

get_header();
?>

<main class="simple-page">
	<div class="container-fluid">
		<?php the_breadcrumbs('simple-page'); ?>
	</div>
	<section class="simple-page__content">
		<div class="container-fluid">
			<article class="simple-page__article">
				<h1 class="simple-page__heading"><?php the_title() ?></h1>

				<?php the_content();?>
			</article>
		</div>
	</section>
	<?php pagesNav('faq-archive'); ?>
</main>


<?php
get_footer();
