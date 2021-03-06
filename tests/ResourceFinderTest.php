<?php

namespace Orchid\Crud\Tests;

use Orchid\Crud\Tests\Fixtures\ExampleAbstractResource;
use Orchid\Crud\Tests\Fixtures\PostResource;

class ResourceFinderTest extends TestCase
{
    public function testFindResourceInDirectory(): void
    {
        $resources = $this
            ->getResourceFinder()
            ->setNamespace('Orchid\Crud\Tests\Fixtures')
            ->find(__DIR__ . '/Fixtures');

        $this->assertIsArray($resources);
        $this->assertContains(PostResource::class, $resources);
        $this->assertNotContains(ExampleAbstractResource::class, $resources);
    }

    public function testFindResourceInNotCreatedDirectory(): void
    {
        $resources = $this
            ->getResourceFinder()
            ->setNamespace('Orchid\Crud\Tests\Fixtures')
            ->find(__DIR__ . '/'.time());

        $this->assertIsArray($resources);
        $this->assertEmpty($resources);
    }
}
