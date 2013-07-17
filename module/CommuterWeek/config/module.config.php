<?php

return array(
    'controllers' => array(
        'factories' => array(
            'IndexControllerFactory' => 'CommuterWeek\ControllerFactory\IndexControllerFactory',
            'RegistrationControllerFactory' => 'CommuterWeek\ControllerFactory\RegistrationControllerFactory',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'CommuterWeek-index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/app/commuter-week[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'IndexControllerFactory',
                        'action' => 'index',
                    ),
                ),
            ),
			'CommuterWeek-registration' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/app/commuter-week/manage[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'RegistrationControllerFactory',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'commuter-week' => __DIR__ . '/../view', //must have a unique key (usually modulename/modulename)
        ),
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'template_map' => array(
            'no_header_layout' => __DIR__ . '/../view/layout/no-header.phtml', //layout initializer refers to this key
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
    ),
    'assetic_configuration' => array(
		'baseUrl' => '/app',
        'modules' => array(
            'commuterweek' => array(
                'root_path' => __DIR__ . '/../../CommuterWeek/assets',
                'collections' => array(
                    'commuter_week_index_js' => array(
                        'assets' => array(
                            'js/commuter-index.js',
                        )
                    ),
                    'commuter_week_index_css' => array(
                        'assets' => array(
                            'css/commuter-index.css',
                        )
                    ),
                )
            ),
        ),
        'routes' => array(
            'CommuterWeek-index' => array(
                '@base_css',
                '@base_js',
                '@commuter_week_index_js',
                '@commuter_week_index_css',
            ),
			'CommuterWeek-registration' => array(
                '@base_css',
                '@base_js',
            )        
		),
    ),
);
?>
