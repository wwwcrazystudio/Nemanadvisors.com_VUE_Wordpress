<?php
add_action('rest_api_init', function () {
    register_rest_route('services/v1', '/type/(?P<id>\d+)', array(
        'methods'  => 'GET',
        'callback' => 'services_query',
        'permission_callback' => '__return_true'
    ));
});

// Обрабатывает запрос
function services_query(WP_REST_Request $request)
{

    $taxID = $request->get_param('id');
    $services = array();


    $args = array(
        'post_type' => 'service',
        'posts_per_page' => -1,
        'orderby' => 'menu_order',
        'tax_query' => array(
            array(
                'taxonomy' => 'types',
                'field' => 'id',
                'terms' => $taxID,
            )
        )
    );

    $query = new WP_Query($args);

    // Цикл
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $tasks = array();
            $exceptions = array();

            $tasksMeta = rwmb_meta('service_tasks');

            foreach ($tasksMeta as $task) {

                $parallels = array();

                if (!empty(($task['task_parallel']))) {
                    foreach ($task['task_parallel'] as $parallel) {
                        $parallels[] = $parallel;
                    }
                }

                $tasks[] = array(
                    'title' => $task['task_title'],
                    'duration' => !empty($task['task_duration_share']) ? floatval($task['task_duration_share']) : 0,
                    'title' => $task['task_title'],
                    'parallel' => !empty($parallels) ? $parallels : null,
                );
            }

            $exceptionsMeta = rwmb_meta('service_exceptions');

            if (!empty($exceptionsMeta)) {
                foreach ($exceptionsMeta as $exception) {
                    $exceptions[] = get_the_title($exception);
                }
            }
            $services[] = array(
                'icon' => rwmb_meta('service_icon', array('limit' => 1, 'size' => 'medium'))[0]['url'],
                'title' => html_entity_decode(get_the_title()),
                'descr' => rwmb_meta('service_description'),
                'forced' => boolval(rwmb_meta('service_forced')),
                'active' => false,
                'locked' => false,
                'highlighted' => false,
                'color' => rwmb_meta('service_color'),
                'team' => !empty(rwmb_meta('service_team')) ? floatval(rwmb_meta('service_team')) : 0,
                'durationEst' => !empty(rwmb_meta('service_duration')) ? floatval(rwmb_meta('service_duration')) : 0,
                'projectStage' => intval(rwmb_meta('service_stage')),
                'duration' => floatval(rwmb_meta('service_duration_share')),
                'exceptions' => $exceptions,
                'tasks' => $tasks,
                'managment' => rwmb_meta('service_managment')
            );
        }
    }
    wp_reset_postdata();

    if (empty($services))
        return new WP_Error('no_author_posts', 'Записей не найдено', array('status' => 404));

    return $services;
}
