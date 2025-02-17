<?php

declare(strict_types=1);

namespace LaravelHyperf\Bus;

use Hyperf\Contract\ConfigInterface;
use Hyperf\Database\ConnectionResolverInterface;
use Psr\Container\ContainerInterface;

class DatabaseBatchRepositoryFactory
{
    public function __invoke(ContainerInterface $container): DatabaseBatchRepository
    {
        $config = $container->get(ConfigInterface::class);

        return new DatabaseBatchRepository(
            $container->get(BatchFactory::class),
            $container->get(ConnectionResolverInterface::class),
            $config->get('queue.batching.table', 'job_batches'),
            $config->get('queue.batching.database')
        );
    }
}
