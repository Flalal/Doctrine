<?php
/**
 * Auteur: F. Hémery 07/09/2017 19:38
 *
 */

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/config.php';

$entitiesPath = array(__DIR__.'/TP/Entity');
$config = Setup::createAnnotationMetadataConfiguration
($entitiesPath, $dev);
$entityManager = EntityManager::create($dbParams, $config);
$repData = __DIR__.'/../data';