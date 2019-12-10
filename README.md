Hopenergie
==========

Symfony project 3.4
-------------------

# Installation

* Install external packaged
``` bash
$ composer install
```
  * **NOTE**
  composer update should be done only by project **technical lead**
  ``` bash
  $ composer update
  ```

## Setup Sonata Page manually

* **1) Create Site**
``` bash
$ sudo -u www-data bin/console sonata:page:create-site --enabled=true --name=hopenergie --locale=- --host=vagrant.hopenergie.com --relativePath=/ --enabledFrom=now --enabledTo="+10 years" --default=true
```

* **2) Update routes**
``` bash
$ sudo -u www-data bin/console sonata:page:update-core-routes --site=all
```

* **3) Create snapshots**
``` bash
$ sudo -u www-data bin/console sonata:page:create-snapshots --site=all
```

# Continuous Integration

* **Install Git Hook**
``` bash
$ bash dev-tools/install-hooks.sh
```
This will install an hook in your local .git `.git/hooks/pre-commit`. Each time you make a commit, the `ci-integration.sh` script will be executed.

# PHP Unit Test

* Composer dump autoload
``` bash
$ composer dump-autoload
```
* Run tests for the specific class
``` bash
$ ./vendor/bin/simple-phpunit tests/Hopenergie/Components/Enedis/Api/EnedisServicesTest.php
```
