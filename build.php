#!/usr/bin/env php
<?php
chdir(__DIR__);

$autoload = (int)$argv[1];
$returnStatus = null;

$composerOriginalRaw = file_get_contents('composer.json');
if (!$autoload) {
  // Modify composer to not autoload WonderPush
  $composer = json_decode($composerOriginalRaw, true);
  unset($composer['autoload']);
  file_put_contents('composer.json', json_encode($composer));
}

passthru('composer install', $returnStatus);
if (!$autoload) {
  // Revert rewrite
  file_put_contents('composer.json', $composerOriginalRaw);
}
if ($returnStatus !== 0) {
  exit(1);
}


$config = $autoload ? 'phpunit.xml' : 'phpunit.no_autoload.xml';
passthru("./vendor/bin/phpunit -c $config", $returnStatus);
if (!$autoload) {
  // Revert autoloader modifications made earlier
  passthru('composer dump-autoload');
}
if ($returnStatus !== 0) {
  exit(1);
}
