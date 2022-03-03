<?php
add_action('rest_api_init', function () {
    register_rest_route('map/v1', '/cities/(?P<lang>\w+)', array(
        'methods'  => 'GET',
        'callback' => 'cities_query',
        'permission_callback' => '__return_true'
    ));
});

// Обрабатывает запрос
function cities_query(WP_REST_Request $request)
{
    $lang = $request->get_param('lang');
    do_action( 'wpml_switch_language', $lang );


    $cities = array();
    $pageId = function_exists('pll_get_post') ? pll_get_post(16) : 16;

    $locale_cities = rwmb_meta('city', '', $pageId);

    foreach($locale_cities as $city) {

        $projects = array();

        if (!empty($city['projects'])) {
            foreach ($city['projects'] as $project) {
                $projects[] = array(
                    'title' => get_the_title( $project ),
                    'img' => get_the_post_thumbnail_url( $project, 'medium' ),
                    'url' => get_permalink( $project ),
                );
            }
        }

        $cities[] = array(
            'name' => $city['name'],
            'region' => $city['region'],
            'description' => $city['excerpt'],
            'position' => explode(',', $city['position']),
            'flag' => wp_get_attachment_image_src( $city['flag'][0], 'thumbnail' )[0],
            'projects' => !empty($projects) ? $projects : null,
        );
    }


    if (empty($cities))
        return new WP_Error('no_author_posts', 'Записей не найдено', array('status' => 404));

    return $cities;
}
