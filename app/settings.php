<?php
declare(strict_types=1);

use App\Application\Settings\Settings;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Monolog\Logger;

return function (ContainerBuilder $containerBuilder) {

    // Global Settings Object
    $containerBuilder->addDefinitions([
        SettingsInterface::class => function () {
            return new Settings([
                'displayErrorDetails' => true, // Should be set to false in production
                'logger' => [
                    'name' => 'slim-app',
                    'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
                    'level' => Logger::DEBUG,
                ],

                // Configuracion para la base de datos con eloquent
                'eloquent' => [
                    'driver' => 'mysql',
                    'host' => 'localhost',
                    'database' => 'pediatras_sos',
                    'username' => 'root',
                    'password' => '',
                    'charset' => 'utf8',
                    'collation' => 'utf8_unicode_ci',
                    'prefix' => '',
                    'options' => [
                        // Turn off persistent connections
                        PDO::ATTR_PERSISTENT => false,
                        // Enable exceptions
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        // Emulate prepared statements
                        PDO::ATTR_EMULATE_PREPARES => true,
                        // Set default fetch mode to array
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        // Set character set
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_general_ci'
                    ],
                ]
            ]);
        }
    ]);

};
