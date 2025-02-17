<?php

declare(strict_types=1);

namespace LaravelHyperf\Bus;

use LaravelHyperf\Queue\Contracts\Factory as QueueFactoryContract;
use Psr\Container\ContainerInterface;

class DispatcherFactory
{
    public function __invoke(ContainerInterface $container): Dispatcher
    {
        return new Dispatcher(
            $container,
            fn (?string $connection = null) => $container->get(QueueFactoryContract::class)->connection($connection)
        );
    }
}
