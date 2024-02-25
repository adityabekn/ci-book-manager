<?php
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->checkVersion(2);
$serviceContainer->setAdapterClass('ci-book', 'pgsql');
$manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('ci-book');
$manager->setConfiguration(array (
    'classname' => 'Propel\\Runtime\\Connection\\ConnectionWrapper',
    'dsn' => 'pgsql:host=localhost;dbname=ci-book',
    'user' => 'postgres',
    'password' => '',
    'settings' =>
        array (
            'charset' => 'utf8',
            'queries' =>
                array (
                ),
        ),
    'attributes' =>
        array (
            'ATTR_EMULATE_PREPARES' => false,
            'ATTR_TIMEOUT' => 30,
        ),
    'model_paths' =>
        array (
            0 => 'src',
            1 => 'vendor',
        ),
));
$serviceContainer->setConnectionManager($manager);
$serviceContainer->setDefaultDatasource('ci-book');
$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
$serviceContainer->initDatabaseMapFromDumps(array (
    'ci-book' =>
        array (
            'tablesByName' =>
                array (
                    'author' => '\\Ormodel\\Map\\AuthorTableMap',
                    'book' => '\\Ormodel\\Map\\BookTableMap',
                    'publisher' => '\\Ormodel\\Map\\PublisherTableMap',
                ),
            'tablesByPhpName' =>
                array (
                    '\\Author' => '\\Ormodel\\Map\\AuthorTableMap',
                    '\\Book' => '\\Ormodel\\Map\\BookTableMap',
                    '\\Publisher' => '\\Ormodel\\Map\\PublisherTableMap',
                ),
        ),
));

