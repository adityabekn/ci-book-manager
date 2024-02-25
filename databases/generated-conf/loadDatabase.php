<?php
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
