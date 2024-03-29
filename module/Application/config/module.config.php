<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/app',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'translator' => 'Zend\I18n\Translator\TranslatorServiceFactory',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController'
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
	'assetic_configuration' => array(
		/*'default' => array(
			'assets' => array(
				'@base_css',
				'@base_js',
			),
			'options' => array(
				'mixin' => true
			),
		),*/
		
		'baseUrl' => '/app',

		'modules' => array(
			/*
			 * Application moodule - assets configuration
			 */
			'application' => array(

				# module root path for yout css and js files
				'root_path' => __DIR__ . '/../assets',

				# collection od assets
				'collections' => array(

					'base_css' => array(
						'assets' => array(
                            'css/bootstrap-rit.min.css',
							'css/bootstrap-responsive.min.css',
                            'css/font-awesome.min.css',
							'css/font-awesome-ie7.min.css',
                            'css/jquery-ui-1.8.23.custom.css'
						),
						'filters' => array(
							'CssRewriteFilter' => array(
								'name' => 'Assetic\Filter\CssRewriteFilter'
							)
						),
						'options' => array(),
					),

					'base_js' => array(
						'assets' => array(
							'js/jquery-1.8.0.min.js',
                            'js/jquery-ui-1.8.23.custom.min.js',
							'js/jquery.validate.js',
                            'js/jquery.ui.datepicker.validation.min.js',
							'js/bootstrap.min.js',
                            'js/html5placeholder.jquery.js',
                            'js/html5.js',
						)
					),
					
					'base_images' => array(
						'assets' => array(
							'img/*.png',
							'img/*.ico',
						    'css/images/*.png',
                            'css/images/*.ico',
                            'font/*.woff', //work around - for some move_raw doesn't work twice??
                            'font/*.ttf', //work around - for some move_raw doesn't work twice??
						),
						'options' => array(
							'move_raw' => true,
						)
					),
					
				),
			),
		)
	),
);
