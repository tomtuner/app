<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'FreezeFest\Controller\IndexController' => 'FreezeFest\Controller\IndexController',
        ),
    ),
    'router' => array(
        'routes' => array(
            'FreezeFest-index' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/app/freezefest-request[/:action][/:id]',
		      'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                     ),
                      'defaults' => array(
                        'controller' => 'FreezeFest\Controller\IndexController',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ), 
    'view_manager' => array(
        'template_path_stack' => array(
            'clubs' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout' => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'display_not_found_reason' => true,
        'display_exceptions' => true,
    ),
);

?>