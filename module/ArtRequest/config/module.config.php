<?php

return array(
    'controllers' => array(
        'factories' => array(
            'ArtRequest\ControllerFactory\ArtRequestControllerFactory' => 'ArtRequest\ControllerFactory\ArtRequestControllerFactory',
            'ArtRequest\ControllerFactory\ArtRequestManageControllerFactory' => 'ArtRequest\ControllerFactory\ArtRequestManageControllerFactory',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'ArtRequest-index' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/app/art-request[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ArtRequest\ControllerFactory\ArtRequestControllerFactory',
                        'action' => 'index',
                    ),
                ),
            ),
            'ArtRequest-manage' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/app/art-request/manage[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'ArtRequest\ControllerFactory\ArtRequestManageControllerFactory',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'art-request' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'art-layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
    ),
    'assetic_configuration' => array(
        'modules' => array(
            'artrequest' => array(
                'root_path' => __DIR__ . '/../../ArtRequest/assets',
                'collections' => array(
                    'art_request_js' => array(
                        'assets' => array(
							'js/jquery.maskedinput-1.3.min.js',
							'js/jquery.timepicker.min.js',
							'js/bootbox.min.js',
                            'js/bootstrap_fileupload_plugin.js',
                            'js/art-request.js',
                        )
                    ),
                    'art_request_css' => array(
                        'assets' => array(
							'css/jquery.timepicker.css',
                            'css/bootstrap_fileupload_plugin.css',
                            'css/art-request.css',
							'css/rit-header.css',
                        )
                    ),
                    'art_request_img' => array(
                        'assets' => array(
                            'img/background.jpg',
							'img/idbar-orange-search-magnify.gif',
							'img/idbar-orange-search.gif',
							'img/idbar-orange.gif',
                        ),
                        'options' => array(
                            'move_raw' => true,
                        ),
                    ),
                )
            ),
        ),
        'routes' => array(
            'ArtRequest-index' => array(
                '@base_js',
                '@base_css',
                '@art_request_js',
                '@art_request_css',
            ),
            'ArtRequest-manage' => array(
                '@base_js',
                '@base_css',
                '@art_request_js',
                '@art_request_css',
            ),
        ),
    ),
);
?>