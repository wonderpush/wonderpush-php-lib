#!/usr/bin/env php
<?php

const VERSION_FILENAME = 'lib/WonderPush.php';
const VERSION_REGEX = '/^(?P<prefix>\s*const\s*VERSION\s*=\s*(?P<quotes>[\'"]))(?P<version>.+)(?P<suffix>(?P=quotes)\s*;.*)$/m';
$root = __DIR__;

//
// Check git status
//

echo "Checking the filesystem is clean…\n";
$uncleanFiles = system('git status --porcelain');
if ($uncleanFiles !== '') {
  echo "Stash your changes before.\n";
  exit(1);
}
echo "\n";

//
// Check tests pass
//

echo "Ensuring tests pass…\n";
passthru("$root/test");
echo "\n";

//
// Read current version
//

$versionFileContent = file_get_contents(VERSION_FILENAME);
if (preg_match(VERSION_REGEX, $versionFileContent, $matches) !== 1) {
  echo "Cannot find version!\n";
  exit(1);
}
$currentVersion = $matches['version'];
echo "Current version: $currentVersion\n";

//
// Ask new version
//

/** @noinspection PhpComposerExtensionStubsInspection */
$newVersion = readline('Enter new version: ');
echo "New version: $newVersion\n";
echo "\n";

//
// Release
//

echo "Making release commit…\n";

// Change version in file
$versionFileContent = preg_replace_callback(VERSION_REGEX, function($matches) use ($newVersion) {
  return $matches['prefix'] . $newVersion . $matches['suffix'];
}, $versionFileContent);
file_put_contents(VERSION_FILENAME, $versionFileContent);

// Commit and tag
passthru("git commit -m 'Release $newVersion' " . VERSION_FILENAME);
passthru("git tag -a -m 'Release $newVersion' v$newVersion");

echo "\n";

//
// Update documentation
//

echo "Updating documentation site…\n";

passthru("$root/doc/generate");
passthru('git checkout gh-pages');
rename("$root/doc/generated", "$root/$newVersion");
copy("$root/latest/api.html", "$root/$newVersion/api.html");
unlink("$root/latest");
symlink($newVersion, "$root/latest");
passthru("git add latest $newVersion");
passthru("git commit -m \"Documentation site for v$newVersion\"");
passthru('git checkout master');

echo "\n";

//
// Prepare next release
//

echo "Preparing next release…\n";

if (strpos($newVersion, '-') !== FALSE) {
  /** @noinspection PhpComposerExtensionStubsInspection */
  $nextVersion = readline('Enter next version: ');
} else {
  $nextVersion = explode('.', $newVersion);
  $nextVersion[count($nextVersion)-1] = (int)$nextVersion[count($nextVersion) - 1] + 1;
  $nextVersion = implode('.', $nextVersion);
  $nextVersion .= '-dev';
}

// Change version in file
$versionFileContent = preg_replace_callback(VERSION_REGEX, function($matches) use ($nextVersion) {
  return $matches['prefix'] . $nextVersion . $matches['suffix'];
}, $versionFileContent);
file_put_contents(VERSION_FILENAME, $versionFileContent);

// Commit and tag
passthru("git commit -m 'Prepare next release' " . VERSION_FILENAME);

echo "\n";

//
// Publish instructions
//

echo "\n";
echo "The GitHub Packagist integration will work for you.\n";
echo "In order to publish the release, please do:\n";
echo "\n";
echo "    git push origin master gh-pages v$newVersion\n";
echo "\n";
