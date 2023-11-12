<?php

declare(strict_types=1);

namespace App;

use DI\Container;
use DI\ContainerBuilder;
use Exception;

final class Kernel
{
    public const DEFAULT_CONFIG = __DIR__ . '/../config/container.php';

    /**
     * @param string|null $configFile
     * @return Container
     * @throws Exception
     */
    public static function createContainer(string $configFile = null): Container
    {
        $configFile = $configFile ?: self::DEFAULT_CONFIG;

        return (new ContainerBuilder())
            ->addDefinitions($configFile)
            ->useAutowiring(false)
            ->build()
        ;
    }
}
