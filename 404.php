<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Neman
 */

get_header();
?>

	<main class="error">
		<div class="container-fluid">
			<h1 class="error__heading">
				404
			</h1>
			<a href="<?=site_url();?>" class="error__btn">Back to home page</a>
		</div>
	</main>

<?php
get_footer();
