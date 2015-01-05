Core Component
==============

![Build status](https://travis-ci.org/wearebase/base-core.svg?branch=master)

What is Core?
-------------

The Base Core provides PHP classes that are strictly non-application-specific and either non-domain-specific or cross multiple domains.

Requirements
------------

Supported on PHP 5.5 and up and HHVM 3.2 and up.

Install in projects
-------------------

    $ composer require wearebase/base-core dev-master

Test classes are autoloaded by default. These can be disabled with the `--no-dev` option


Running tests
-------------

You can run the unit tests with the following command:

    $ composer install
    $ ./vendor/bin/phpunit

To run tests on a different PHP version, you can use Docker:

    $ docker run -it --rm -v "$(pwd)":/home/test -w /home/test php:5.6-cli php ./vendor/bin/phpunit

To run QA tools such as code coverage

    $ ant


Contributing
------------

Follow PSR-1, PSR-2 and PSR-4.
