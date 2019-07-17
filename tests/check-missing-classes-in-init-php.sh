#!/bin/sh

missingFiles="$(find lib/ -type f -name '*.php' | while read f; do grep -q -F "$f" init.php || echo "$f"; done)"

if [[ -n "$missingFiles" ]]; then
	echo "There are missing php files in init.php:"
	echo "$missingFiles"
	exit 1
fi
