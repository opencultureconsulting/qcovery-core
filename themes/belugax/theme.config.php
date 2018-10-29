<?php

return [
    'extends' => 'bootstrap3',
    'css' => [
        'jquery.qtip.min.css',
        'uikit.min.css',
        'compiled.css',
        'belugino.css',
        'belugax.css',
    ],
    'js' => [
        'jquery.qtip.min.js',
        'uikit.min.js',
        'belugax.js',
    ],
    'mixins' => [
        'paia',
        'daiaplus',
        'belugaconfig',
        'delivery',
        'libraries',
        'searchkeys',
        'dependentworks',
        'recorddriver',
        'beluga-core-base',
    ],
    "less" => [
        "active" => false,
        "compiled.less"
    ],
];
