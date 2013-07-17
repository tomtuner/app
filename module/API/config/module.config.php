<?php

return array(
    'controllers' => array(
        'invokables' => array(
            'ldap' => 'API\Controller\LdapController', //key here is the /:controller name
            'organization' => 'API\Controller\OrganizationController',
            //'index' =>//change to proper format
        ),
        'factories' => array(
            'user' => 'API\ControllerFactory\UserControllerFactory',
        ),
    ),
    // The following section is new and should be added to your file
    'router' => array(
        'routes' => array(
            'api-route' => array(
                'type' => 'segment',
                'options' => array(
                    'route' => '/app/api[/:controller][/:action][.:format][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id' => '[0-9]+',
                        'format' => '(json)',
                    ),
                    'defaults' => array(
                        'controller' => 'IndexController', //must reference something in the controller array
                    ),
                ),
            ),
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'clubs' => __DIR__ . '/../view',
        ),
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),
);
?>