<?php
// This file generated by Propel 1.6.7 convert-conf target
// from XML runtime conf file /home/cclweb/docs/dev/app/vendor/AppDatabase/Configs/runtime-conf.xml
$conf = array (
  'datasources' => 
  array (
    'art_request' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=art_request',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
    'commuter_week' => 
      array (
        'adapter' => 'mysql',
        'connection' => 
        array (
          'dsn' => 'mysql:host=127.0.0.1;port=3306;dbname=commuter_week',
          'user' => 'cclwww',
          'password' => 'EatYourDat4',
          'attributes' => 
          array (
            'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
            array (
              'value' => true,
            ),
          ),
          'settings' => 
          array (
            'queries' => 
            array (
              'query' => 'SET NAMES utf8',
            ),
          ),
        ),
      ),
      'clubs' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;port=3306;dbname=clubs',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
    'newclubs' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;port=3306;dbname=newclubs',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
    'users' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;port=3306;dbname=users',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
    'organizations' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;port=3306;dbname=organizations',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
    'evr' => 
    array (
      'adapter' => 'mysql',
      'connection' => 
      array (
        'dsn' => 'mysql:host=localhost;port=3306;dbname=evr',
        'user' => 'cclwww',
        'password' => 'EatYourDat4',
        'attributes' => 
        array (
          'MYSQL_ATTR_USE_BUFFERED_QUERY' => 
          array (
            'value' => true,
          ),
        ),
        'settings' => 
        array (
          'queries' => 
          array (
            'query' => 'SET NAMES utf8',
          ),
        ),
      ),
    ),
  ),
  'generator_version' => '1.6.7',
);
$conf['classmap'] = include(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'classmap-orm-conf.php');
return $conf;