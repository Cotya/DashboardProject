<?php
/**
 * recipe for http://deployer.org/
 */


/**
 * Update project code
 */
task('package:create', function () {
    $basePath = env('deploy_path');

    $packageSourcePath = __DIR__.'/../../';
    $packageName     = 'deploy_package_'.date('Ymd').'_'.time().'.tar.gz';
    $packageLocation = $packageSourcePath.'../deployer-dashboard/'.$packageName;

    $excludes = " --exclude=build/var --exclude=build/pub";
    foreach (get('not_packaged') as $exclude) {
        $excludes .= " --exclude={$exclude} ";
    }
    runLocally("tar --exclude-vcs --exclude=vendor {$excludes} -czf {$packageLocation}  -C {$packageSourcePath} ./");
    //runLocally("tar --exclude-vcs {$excludes} -czf {$packageLocation}  -C {$packageSourcePath} ./");

    env()->set('packageLocation', $packageLocation);
    env()->set('packageName', $packageName);

})->desc('create package');

/**
 * Update project code
 */
task('package:upload', function () {
    $basePath = env('deploy_path');

    $release = date('Ymd') . substr((string)time(), -5);
    $releasePath = "$basePath/releases/$release";
    $releasePath = env('release_path');
    
    $packageLocation = env()->get('packageLocation');
    $packageName = env()->get('packageName');


    upload($packageLocation, $packageName);
    run("tar -xzf {$packageName}  -C {$releasePath} ./");

    env('release_path', $releasePath);
    env()->set('is_new_release', true);


})->desc('upload package');
