<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

if (file_exists(__DIR__ . '/vendor/')) {
    require_once __DIR__ . '/vendor/autoload.php';
} elseif (class_exists('Cundd\\CunddComposer\\Autoloader')) {
    \Cundd\CunddComposer\Autoloader::register();
}

if (!class_exists('Cundd\\Rest\\Bootstrap')) {
    echo('Could not find class "\\Cundd\\Rest\\Bootstrap". Maybe the Composer dependencies have not been installed.'
        . PHP_EOL
        . 'See https://rest.cundd.net/Installation/ for details');
    exit(1);
}

$bootstrap = new \Cundd\Rest\Bootstrap;
$bootstrap->init();
/** @var \Cundd\Rest\Dispatcher $dispatcher */
$dispatcher = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('Cundd\\Rest\\ObjectManager')->get('Cundd\\Rest\\Dispatcher');
$dispatcher->dispatch();
