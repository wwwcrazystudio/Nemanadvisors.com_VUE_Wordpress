<?php

add_filter('rwmb_meta_boxes', 'neman_metafields');
function neman_metafields($meta_boxes)
{

    $meta_boxes[] = array(
        'title'      => 'Изображение',
        'taxonomies' => 'categories',
        'fields' => array(
            array(
                'id'     => 'tax_img',
                'image_size'       => 'thumbnail',
                'max_file_uploads' => 1,
                'type'   => 'image_advanced',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => 'Опции',
        'taxonomies' => 'types',
        'fields' => array(
            array(
                'name'  => 'Продолжительность 1 этапа (доля)',
                'id'     => 'stage1_duration',
                'type'   => 'number',
                'step'  => 0.1
            ),
            array(
                'name'  => 'Продолжительность 2 этапа (доля)',
                'id'     => 'stage2_duration',
                'type'   => 'number',
                'step'  => 0.1
            ),
            array(
                'name'  => 'Продолжительность 3 этапа (доля)',
                'id'     => 'stage3_duration',
                'type'   => 'number',
                'step'  => 0.1
            ),
            array(
                'name'  => 'Изображение',
                'id'     => 'type_img',
                'image_size'       => 'thumbnail',
                'max_file_uploads' => 1,
                'type'   => 'image_advanced',
            ),
            array(
                'name'  => 'Факты',
                'id'     => 'type_highlights',
                'type'   => 'group',
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить факт',
                'fields' => array(
                    array(
                        'id'     => 'icon',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name'   => 'Название',
                        'id'     => 'title',
                        'type'   => 'text',
                    ),
                    array(
                        'name'   => 'Краткое описание',
                        'id'     => 'excerpt',
                        'type'   => 'textarea',
                    ),
                )
            ),
        )
    );



    $meta_boxes[] = array(
        'title'      => 'Клиенты',
        'post_types' => 'page',
        'include' => array(
            'template' => array('tpl-about.php'),
        ),
        'tabs'      => array(
            'clients' => array(
                'label' => 'Клиенты',
            ),
            'map'  => array(
                'label' => 'Карта',
            ),
        ),
        'tab_style' => 'box',
        'fields' => array(
            array(
                'name'   => 'Клиент',
                'id'     => 'client',
                'type'   => 'group',
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить клиента',
                'tab'       => 'clients',
                'fields' => array(
                    array(
                        'name' => 'Логотип',
                        'id'   => 'logo',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Название',
                        'id'   => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Краткое описание',
                        'id'   => 'excerpt',
                        'type' => 'textarea',
                    ),
                ),
            ),
            array(
                'name'   => 'Город',
                'id'     => 'city',
                'type'   => 'group',
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить город',
                'tab'       => 'map',
                'fields' => array(
                    array(
                        'name' => 'Флаг',
                        'id'   => 'flag',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Регион',
                        'id'   => 'region',
                        'type'    => 'radio',
                        'options' => array(
                            'na' => 'Северная Америка',
                            'ru' => 'Россия / Европа',
                            'au' => 'Австралия',
                            'algeria' => 'Алжир',
                            'mauritania' => 'Мавритания',
                        ),
                    ),
                    array(
                        'name' => 'Позиция (через запятую)',
                        'id'   => 'position',
                        'type'   => 'text',
                    ),
                    array(
                        'name' => 'Название',
                        'id'   => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Краткое описание',
                        'id'   => 'excerpt',
                        'type' => 'textarea',
                    ),
                    array(
                        'name'  => 'Проекты',
                        'id'     => 'projects',
                        'type'        => 'post',
                        'post_type'   => 'project',
                        'placeholder' => 'Выберите проекты',
                        'field_type' => 'checkbox_list',
                    ),
                ),
            )
        ),
    );

    $meta_boxes[] = array(
        'title'      => 'Пример проекта',
        'post_types' => 'page',
        'include' => array(
            'template' => array('tpl-partners.php'),
        ),
        'fields' => array(
            array(
                'name'   => 'Заголовок',
                'id'     => 'collab_heading',
                'type'   => 'textarea',
            ),
            array(
                'name'   => 'Инвестор',
                'id'     => 'investor',
                'type'   => 'group',
                'fields' => array(
                    array(
                        'name' => 'Логотип',
                        'id'   => 'logo',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Название',
                        'id'   => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ссылка на инвестора',
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Изображение проекта',
                        'id'   => 'project_img',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Описание проекта',
                        'id'   => 'project_excerpt',
                        'type'   => 'textarea',
                    ),
                    array(
                        'name' => 'Ссылка на проект',
                        'id'   => 'project_link',
                        'type' => 'text',
                    ),
                ),
            ),
            array(
                'name'   => 'Партнер',
                'id'     => 'partner',
                'type'   => 'group',
                'fields' => array(
                    array(
                        'name' => 'Логотип',
                        'id'   => 'logo',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Название',
                        'id'   => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Ссылка',
                        'id'   => 'link',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Роль',
                        'id'   => 'role',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Задачи',
                        'id'   => 'tasks',
                        'type'   => 'group',
                        'clone' => true,
                        'sort_clone' => true,
                        'fields' => array(
                            array(
                                'id'   => 'task',
                                'type'   => 'text',
                            ),
                        )
                    ),
                    array(
                        'name' => 'Команда',
                        'id'   => 'team',
                        'type'   => 'group',
                        'fields' => array(
                            array(
                                'name' => 'Кол-во',
                                'id'   => 'num',
                                'type'   => 'number',
                            ),
                            array(
                                'name' => 'Описание',
                                'id'   => 'descr',
                                'type'   => 'textarea',
                            ),
                        )
                    ),

                ),
            ),
            array(
                'name'   => 'Наша компания',
                'id'     => 'our_company',
                'type'   => 'group',
                'fields' => array(
                    array(
                        'name' => 'Роль',
                        'id'   => 'role',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Задачи',
                        'id'   => 'tasks',
                        'type'   => 'group',
                        'clone' => true,
                        'sort_clone' => true,
                        'fields' => array(
                            array(
                                'id'   => 'task',
                                'type'   => 'text',
                            ),
                        )
                    ),
                    array(
                        'name' => 'Команда',
                        'id'   => 'team',
                        'type'   => 'group',
                        'fields' => array(
                            array(
                                'name' => 'Кол-во',
                                'id'   => 'num',
                                'type'   => 'number',
                            ),
                            array(
                                'name' => 'Описание',
                                'id'   => 'descr',
                                'type'   => 'textarea',
                            ),
                        )
                    ),

                ),
            )
        ),
    );

    $meta_boxes[] = array(
        'title'      => 'Данные',
        'post_types' => 'project',
        'tabs'      => array(
            'main' => array(
                'label' => 'Общее',
            ),
            'gallery'  => array(
                'label' => 'Галерея',
            ),
        ),
        'tab_style' => 'box',
        'fields' => array(
            array(
                'name'  => 'Клиент',
                'id'     => 'proj_client',
                'type'   => 'text',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Тип сервиса',
                'id'     => 'proj_type',
                'type'   => 'taxonomy',
                'taxonomy'   => 'types',
                'placeholder' => 'Выберите тип сервиса',
                'field_type' => 'radio_list',
                'tab'  => 'main',
                'admin_columns' => 'after title',
            ),
            array(
                'name'  => 'Сервисы',
                'id'     => 'proj_services',
                'type'   => 'post',
                'post_type'   => 'service',
                'placeholder' => 'Выберите сервисы',
                'field_type' => 'checkbox_list',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Задача',
                'id'     => 'proj_task',
                'type'   => 'textarea',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Задача 2',
                'id'     => 'proj_task_2',
                'type'   => 'textarea',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Проблема',
                'id'     => 'proj_problem',
                'type'   => 'textarea',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Решение',
                'id'     => 'proj_decision',
                'type'   => 'textarea',
                'tab'  => 'main',
            ),
            array(
                'name'  => 'Результат',
                'id'     => 'proj_result',
                'type'   => 'textarea',
                'tab'  => 'main',
            ),
            array(
                'name' => 'Видео',
                'id'    => 'proj_video',
                'type' => 'group',
                'tab'  => 'gallery',
                'fields' => array(
                    array(
                        'name'  => 'Ссылка',
                        'id'     => 'link',
                        'type'   => 'text',
                    ),
                    array(
                        'name'  => 'Постер',
                        'id'     => 'poster',
                        'image_size'       => 'medium',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name'  => 'Подпись',
                        'id'     => 'caption',
                        'type'   => 'textarea',
                    ),
                ),
            ),
            array(
                'name' => 'Фото',
                'id'    => 'proj_photo',
                'type'   => 'image_advanced',
                'tab'  => 'gallery',
                'image_size'       => 'thumbnail',
            ),
        )
    );

    $meta_boxes[] = array(
        'title'      => 'Сервис',
        'post_types' => 'service',
        'tabs'      => array(
            'main' => array(
                'label' => 'Общее',
            ),
            'tasks'  => array(
                'label' => 'Задачи',
            ),
        ),
        'tab_style' => 'box',
        'fields' => array(
            array(
                'name'   => 'Forced',
                'id'     => 'service_forced',
                'type' => 'checkbox',
                'std'  => 0,
                'tab'  => 'main',
                'admin_columns' => 'after title',
            ),
            array(
                'name'   => 'Иконка',
                'id'     => 'service_icon',
                'image_size' => 'thumbnail',
                'max_file_uploads' => 1,
                'type'   => 'image_advanced',
                'tab'  => 'main',
                'hidden' => array('service_forced', '!=', false)
            ),
            array(
                'name'   => 'Описание',
                'id'     => 'service_description',
                'type'   => 'textarea',
                'tab'  => 'main',
                'hidden' => array('service_forced', '!=', false)
            ),
            array(
                'name'   => 'Цвет',
                'id'     => 'service_color',
                'type'   => 'color',
                'tab'  => 'main',
            ),
            array(
                'name'   => 'Команда',
                'id'     => 'service_team',
                'type'   => 'number',
                'tab'  => 'main',
                'hidden' => array('service_forced', '!=', false)
            ),
            array(
                'name'   => 'Продолжительность (месяцев)',
                'id'     => 'service_duration',
                'type'   => 'number',
                'tab'  => 'main',
                'step'  => 0.1,
                'hidden' => array('service_forced', '!=', false)
            ),
            array(
                'name'   => 'Стадия',
                'id'     => 'service_stage',
                'type'    => 'radio',
                'options' => array(
                    '1' => '1',
                    '2' => '2',
                    '3' => '3',
                ),
                'inline' => true,
                'tab'  => 'main',
                'admin_columns' => 'after title',
            ),
            array(
                'name'   => 'Доля продолжительности',
                'id'     => 'service_duration_share',
                'type'   => 'number',
                'tab'  => 'main',
                'step'  => 0.1
            ),
            array(
                'name'   => 'Менеджмент',
                'id'     => 'service_managment',
                'type'   => 'text',
                'tab'  => 'main',
                'hidden' => array('service_forced', '!=', false)
            ),
            array(
                'name'   => 'Исключения',
                'id'     => 'service_exceptions',
                'type'   => 'post',
                'post_type'   => 'service',
                'placeholder' => 'Выберите исключения',
                'field_type' => 'checkbox_list',
                'hidden' => array('service_forced', '!=', false),
                'tab'  => 'main',
            ),
            array(
                'name'   => 'Задачи',
                'id'     => 'service_tasks',
                'type'   => 'group',
                'tab'  => 'tasks',
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить задачу',
                'fields' => array(
                    array(
                        'name'   => 'Название',
                        'id'     => 'task_title',
                        'type'   => 'text',
                    ),
                    array(
                        'name'   => 'Доля продолжительности',
                        'id'     => 'task_duration_share',
                        'type'   => 'number',
                        'step'  => 0.1
                    ),
                    array(
                        'name'   => 'Параллельные',
                        'id'     => 'task_parallel',
                        'type'   => 'text',
                        'clone' => true,
                        'add_button' => 'Добавить параллельную задачу'
                    ),
                )
            ),

        ),
    );

    $meta_boxes[] = array(
        'title'      => 'Кооперация',
        'post_types' => 'page',
        'include' => array(
            'template' => array('tpl-csr.php'),
        ),
        'fields' => array(
            array(
                'name'   => 'Партнер',
                'id'     => 'csr_partner',
                'type'   => 'group',
                'clone' => true,
                'sort_clone' => true,
                'add_button' => 'Добавить партнера',
                'fields' => array(
                    array(
                        'name' => 'Логотип',
                        'id'   => 'logo',
                        'image_size'       => 'thumbnail',
                        'max_file_uploads' => 1,
                        'type'   => 'image_advanced',
                    ),
                    array(
                        'name' => 'Название',
                        'id'   => 'name',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Краткое описание',
                        'id'   => 'excerpt',
                        'type' => 'wysiwyg',
                    ),
                ),
            )
        ),
    );

    $meta_boxes[] = array(
        'title'      => 'Команда',
        'post_types' => 'page',
        'include' => array(
            'template' => array('tpl-team.php'),
        ),

        'fields' => array(
            array(
                'id'   => 'team',
                'type'   => 'group',
                'clone' => true,
                'sort_clone' => true,
                'collapsible' => true,
                'group_title' => array( 'field' => 'person_name' ),
                'add_button' => 'Добавить',
                'fields' => array(
                    array(
                        'name' => 'Имя',
                        'id'   => 'person_name',
                        'type' => 'text',
                    ),
                    array(
                        'id'   => 'slider',
                        'type'   => 'group',
                        'fields' => array(
                            array(
                                'name' => 'Фото',
                                'id'   => 'img',
                                'image_size'       => 'medium',
                                'max_file_uploads' => 1,
                                'type'   => 'image_advanced',
                            ),
                            array(
                                'name' => 'Должность',
                                'id'   => 'job',
                                'type' => 'text',
                            ),
                            array(
                                'name' => 'Экспертиза',
                                'id'   => 'exp',
                                'type' => 'text',
                            ),
                        ),
                    ),
                    array(
                        'id'   => 'modal',
                        'type'   => 'group',
                        'fields' => array(
                            array(
                                'name' => 'Фото',
                                'id'   => 'team_img_modal',
                                'image_size'       => 'thumbnail',
                                'max_file_uploads' => 1,
                                'type'   => 'image_advanced',
                            ),
                            array(
                                'name' => 'Подзаголовок',
                                'id'   => 'team_subheading_modal',
                                'type' => 'text',
                            ),
                            array(
                                'name' => 'Контент',
                                'id'   => 'team_content_modal',
                                'type' => 'wysiwyg',
                            ),
                        )
                    )
                )
            ),
        ),
    );

    $meta_boxes[] = array(
        'title'      => 'Главная',
        'post_types' => 'page',
        'include' => array(
            'ID' => function_exists('pll_get_post') ? pll_get_post(get_option( 'page_on_front' )) : get_option( 'page_on_front' ),
        ),
        'tabs'      => array(
            'about' => array(
                'label' => 'О компании',
            ),
            'products'  => array(
                'label' => 'Продукты',
            ),
            'projects'  => array(
                'label' => 'Проекты',
            ),
            'contacts'  => array(
                'label' => 'Контакты',
            ),
        ),
        'tab_style' => 'box',
        'fields' => array(
            array(
                'id'   => 'about_heading',
                'name' => 'Заголовок',
                'type'   => 'textarea',
                'tab'   => 'about'
            ),
            array(
                'id'   => 'about_content',
                'name' => 'Контент',
                'type'   => 'wysiwyg',
                'tab'   => 'about'
            ),
            array(
                'id'   => 'about_url',
                'name' => 'Ссылка',
                'type'   => 'text',
                'tab'   => 'about'
            ),
            array(
                'id'   => 'products_heading',
                'name' => 'Заголовок',
                'type'   => 'textarea',
                'tab'   => 'products'
            ),
            array(
                'id'   => 'products_content',
                'name' => 'Контент',
                'type'   => 'wysiwyg',
                'tab'   => 'products'
            ),
            array(
                'id'   => 'products_url',
                'name' => 'Ссылка',
                'type'   => 'text',
                'tab'   => 'products'
            ),
            array(
                'id'   => 'projects_heading',
                'name' => 'Заголовок',
                'type'   => 'textarea',
                'tab'   => 'projects'
            ),
            array(
                'id'   => 'projects_content',
                'name' => 'Контент',
                'type'   => 'wysiwyg',
                'tab'   => 'projects'
            ),
            array(
                'id'   => 'projects_url',
                'name' => 'Ссылка',
                'type'   => 'text',
                'tab'   => 'projects'
            ),
            array(
                'id'   => 'contacts_heading',
                'name' => 'Заголовок',
                'type'   => 'textarea',
                'tab'   => 'contacts'
            ),
            array(
                'id'   => 'contacts_content',
                'name' => 'Контент',
                'type'   => 'wysiwyg',
                'tab'   => 'contacts'
            ),
            array(
                'id'   => 'contacts_url',
                'name' => 'Ссылка',
                'type'   => 'text',
                'tab'   => 'contacts'
            ),
        ),
    );



    return $meta_boxes;
}
