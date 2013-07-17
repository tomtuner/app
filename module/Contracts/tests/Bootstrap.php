<?php

/**
 * Autoloader Script for PHPUnit 
 */
include_once('AutoLoader.php');

/**
 * Register ArtRequest Models
 */
AutoLoader::registerDirectory('../src/ArtRequest/Model');

/**
 * Register Propel Models 
 */
AutoLoader::registerDirectory('../../../vendor/Propel/models');

/**
 * Register Exceptions
 */
AutoLoader::registerDirectory('../../../vendor/AppCore/Exception');

/**
 * Register Model Tests and Associated Files (fixtures, base test model, etc..) 
 */
AutoLoader::registerDirectory('../tests/Model');

/**
 * Registery Factory Tests and Associated Files 
 */
AutoLoader::registerDirectory('../tests/Factory');

/**
 * Register Propel Runtime
 */
AutoLoader::registerDirectory('../../../vendor/Propel/runtime/lib');

/**
 * Register Propel Generator 
 */
AutoLoader::registerDirectory('C:\Propel\generator\lib\util');

?>
