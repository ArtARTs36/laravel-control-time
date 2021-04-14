<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Factories;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Reports\Data\ReportsDict;
use ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound;
use Illuminate\Contracts\Container\Container;

class ReportFactory
{
    protected $container;

    protected $dict;

    public function __construct(Container $container, ReportsDict $dict)
    {
        $this->container = $container;
        $this->dict = $dict;
    }

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     * @throws ReportNotFound
     */
    public function factory(string $name, string $extension): Report
    {
        return $this->container->make($this->dict->get($name, $extension));
    }
}
