<?php

namespace ArtARTs36\ControlTime\Reports\Infrastructure\Factories;

use ArtARTs36\ControlTime\Contracts\Report;
use ArtARTs36\ControlTime\Reports\Exceptions\ReportNotFound;
use Illuminate\Contracts\Container\Container;

class ReportFactory
{
    protected $container;

    protected $dict;

    /**
     * @param array<string, string>
     */
    public function __construct(Container $container, array $dict)
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
        if (! $this->has($name, $extension)) {
            throw new ReportNotFound($name, $extension);
        }

        return $this->container->make($this->dict[$name][$extension]);
    }

    public function has(string $name, string $extension): bool
    {
        return isset($this->dict[$name][$extension]);
    }
}
