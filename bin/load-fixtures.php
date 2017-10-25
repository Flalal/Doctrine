<?php
/**
 * Auteur: F. Hémery 19/09/2017 10:20
 *
 */

require_once __DIR__.'/../src/bootstrap.php';

use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;

$loader = new Loader();
$loader->loadFromDirectory(__DIR__.'/../src/TP/DataFixtures');
$purger = new ORMPurger();
$executor = new ORMExecutor($entityManager, $purger);
$executor->execute($loader->getFixtures());