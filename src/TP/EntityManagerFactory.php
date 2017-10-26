<?php
/**
 * Auteur: F. Hémery 25/10/2017 16:26
 *
 */

namespace TP;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\CachedReader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory {
    private static $instance;
    private static $entityManager;

    /**
     * EntityManagerFactory constructor.
     */
    public function __construct(array $dbParams,array $entityPath, bool $dev) {
        $config = Setup::createAnnotationMetadataConfiguration($entityPath, $dev);
        $config->setMetadataDriverImpl(
            new AnnotationDriver(new CachedReader(new AnnotationReader(), new ArrayCache()), $entityPath)
        );
        self::$entityManager = EntityManager::create($dbParams, $config);
    }

    public static function getEntityManager(array $dbParams,array $entityPath, bool $dev): EntityManager {
        if (!isset(self::$instance)) {
            self::$instance = new EntityManagerFactory($dbParams,$entityPath,$dev);
        }

        return self::$entityManager;
    }

    /**
     * rend impossible le clonage de la connexion avec la base de données
     */
    private function __clone() {
    }
}