<?php
namespace Delivery\Module\Configuration;

$config = [
    'controllers' => [
        'factories' => [
            //'Delivery\Controller\DeliveryController' => 'Delivery\Controller\AbstractBaseFactory',
            'Delivery\Controller\DeliveryController' => 'VuFind\Controller\AbstractBaseFactory',
        ],
        'aliases' => [
            'Delivery' => 'Delivery\Controller\DeliveryController',
            'delivery' => 'Delivery\Controller\DeliveryController',
            'VuFind\Controller\DeliveryController' => 'Delivery\Controller\DeliveryController',
        ],
    ],
    'service_manager' => [
        'allow_override' => true,
        'factories' => [
            'Delivery\Db\Table\PluginManager' => 'VuFind\ServiceManager\AbstractPluginManagerFactory',
            'Delivery\Db\Row\PluginManager' => 'VuFind\ServiceManager\AbstractPluginManagerFactory',
            'Delivery\Auth\DeliveryAuthenticator' => 'Delivery\Auth\DeliveryAuthenticatorFactory',
        ],
        'aliases' => [
            'VuFind\Db\Table\PluginManager' => 'Delivery\Db\Table\PluginManager',
            'VuFind\Db\Row\PluginManager' => 'Delivery\Db\Row\PluginManager',
            'VuFind\ILSAuthenticator' => 'Delivery\Auth\DeliveryAuthenticator',
        ],
    ],
/*
   'vufind' => [
        'plugin_managers' => [
            'db_table' => [
                'factories' => [
                    'userdelivery' => 'Delivery\Db\Table\Factory::getUserDelivery',
                ],
            ],
            'recorddriver' => [
//                'abstract_factories' => ['VuFind\RecordDriver\PluginFactory'],
                'factories' => [
                    'solrmarc' => 'Delivery\RecordDriver\Factory::getSolrMarc',
//                    'findex' => 'Libraries\RecordDriver\Factory::getSolrMarc',
                ],
            ],
        ],
    ],
*/
];

// Define static routes -- Controller/Action strings
$staticRoutes = [
   'Delivery/Home', 'Delivery/Edit', 'Delivery/Order'
];

$routeGenerator = new \VuFind\Route\RouteGenerator();
$routeGenerator->addStaticRoutes($config, $staticRoutes);

return $config;
