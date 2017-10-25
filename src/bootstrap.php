<?php

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Setup;

require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../config/config.php';

$entityPath = array(__DIR__.'/TP/Entity');

$config = Doctrine\ORM\Tools\Setup::createAnnotationMetadataConfiguration($entityPath, $dev);
$config->setMetadataDriverImpl(
    new Doctrine\ORM\Mapping\Driver\AnnotationDriver(
        new Doctrine\Common\Annotations\CachedReader(
            new Doctrine\Common\Annotations\AnnotationReader(),
            new Doctrine\Common\Cache\ArrayCache()
        ),
        $entityPath
    )
);

$entityManager = EntityManager::create($dbParams, $config);
$repData = __DIR__.'/../data';