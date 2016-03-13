<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
 
$pathList[] = (__DIR__) . '/code/*/*/cli_commands.php';
$pathList[] = (__DIR__) . '/code/*/*/registration.php';
$pathList[] = (__DIR__) . '/design/*/*/*/registration.php';
$pathList[] = (__DIR__) . '/i18n/*/*/registration.php';
//var_dump($pathList);
foreach ($pathList as $path) {
    // Sorting is disabled intentionally for performance improvement
    $files = glob($path, GLOB_NOSORT);
    //var_dump($files);
    if ($files === false) {
        throw new \RuntimeException('glob() returned error while searching in \'' . $path . '\'');
    }
    foreach ($files as $file) {
        include $file;
    }
}
