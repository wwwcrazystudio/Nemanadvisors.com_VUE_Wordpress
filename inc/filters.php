<?php

add_action('wp_ajax_filter_form', 'filter_query_process');
add_action('wp_ajax_nopriv_filter_form', 'filter_query_process');

function filter_query_process()
{

    $postType = !empty($_POST['post_type']) ? $_POST['post_type'] : 'post';
    $perpage = !empty($_POST['per_page']) ? $_POST['per_page'] : 4;
    $paged = !empty($_POST['paged']) ? $_POST['paged'] : 1;

    $projectTax = array_filter($_POST['categories']);
    $postTax = array_filter($_POST['category']);
    $faqTax = array_filter($_POST['theme']);
    $typesTax = array_filter($_POST['types']);
    $searchQuery = $_POST['s'];

    $isRelated = isset($_POST['related']);


    $args = array(
        'post_type'         => $postType,
        'orderby'        => 'menu_order',
        'posts_per_page' => $perpage,
        'paged' => $paged,
    );


    if (!empty($projectTax)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'categories',
                'field' => 'id',
                'terms' => $projectTax,
            )
        );
    };

    if (!empty($typesTax)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'types',
                'field' => 'id',
                'terms' => $typesTax,
            )
        );
    };

    if (!empty($postTax)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $postTax,
            )
        );
    };


    if (!empty($faqTax)) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'theme',
                'field' => 'id',
                'terms' => $faqTax,
            )
        );
    };

    if (!empty($searchQuery)) {
        $args['s'] = $searchQuery;
    };

    $filtered_query = new WP_Query($args);

    if ($filtered_query->have_posts()) : $found = $filtered_query->found_posts;
        echo '<var class="found">' . $found . '</var>';

        while ($filtered_query->have_posts()) : $filtered_query->the_post();


            if ($postType == 'post') {
                get_template_part('template-parts/content', 'post');
            } elseif ($postType == 'project' && !$isRelated) {
                get_template_part('template-parts/content', 'project');
            } elseif ($postType == 'faq') {
                get_template_part('template-parts/content', 'faq');
            } elseif ($postType == 'project' && $isRelated) {
                get_template_part('template-parts/content', 'project-related');
            }

        endwhile;

        wp_reset_postdata();

    else :

        $text = '';

        if ($postType == 'post') {
            $text = __('No insights found', 'neman');
        } elseif ($postType == 'project' && !$isRelated) {
            $text = __('No credentials found', 'neman');
        } elseif ($postType == 'faq') {
            $text = __('Nothing found', 'neman');
        } elseif ($postType == 'project' && $isRelated) {
            return;
        }

        if (!isset($_POST['append'])) {
            echo '<div class="notfound">' . $text . '</div>';
        }


    endif;

    wp_die();
}
