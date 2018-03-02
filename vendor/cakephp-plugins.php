<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'Cake/ElasticSearch' => $baseDir . '/vendor/cakephp/elastic-search/',
        'CkEditor' => $baseDir . '/vendor/cakecoded/ckeditor/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'Search' => $baseDir . '/vendor/friendsofcake/search/',
        'TinyMCE' => $baseDir . '/vendor/cakedc/tiny-mce/'
    ]
];