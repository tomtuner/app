<?php

return array(
    'router' => array(
        'routes' => array(
            'evr-rss-feed' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/app/evr/rss',
                    'defaults' => array(
                        'controller' => 'EVRRSSFeed\Controller\Index',
                        'action' => 'feed',
                    ),
                ),
            ),
            'evr-rss-feed-with-slash' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/app/evr/rss/',
                    'defaults' => array(
                        'controller' => 'EVRRSSFeed\Controller\Index',
                        'action' => 'feed',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(),
        'factories' => array(
            'EVRRSSFeed\Controller\Index' => 'EVRRSSFeed\ControllerFactory\IndexControllerFactory'
        )
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewFeedStrategy',
        )
    ),
);
