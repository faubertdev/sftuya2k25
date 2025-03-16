#!/bin/bash

echo "## install symfony dependencies ##"
composer install

echo "## install node dependencies ##"
npm i @popperjs/core
npm install file-loader@^6.0.0 --save-dev

echo "## Compile scripts ##"
npm run dev

echo "## Cleaning cash##"
php bin/console c:c

exec "$@"