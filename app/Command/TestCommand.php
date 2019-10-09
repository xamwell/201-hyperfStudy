<?php

declare(strict_types=1);

namespace App\Command;

use App\Amqp\Producer\DemoProducer;
use Hyperf\Amqp\Producer;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Hyperf\Di\Annotation\Inject;
use Psr\Container\ContainerInterface;

/**
 * @Command
 */
class TestCommand extends HyperfCommand
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @Inject()
     * @var Producer
     */
    protected $producer;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct('t');
    }

    public function configure()
    {
        $this->setDescription('Hyperf Demo Command');
    }

    public function handle()
    {
        var_dump('success');
        $this->producer->produce(new DemoProducer('test'. date('Y-m-d H:i:s')));
    }
}