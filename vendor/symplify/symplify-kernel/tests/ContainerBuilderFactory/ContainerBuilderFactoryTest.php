<?php

declare (strict_types=1);
namespace RectorPrefix20220218\Symplify\SymplifyKernel\Tests\ContainerBuilderFactory;

use RectorPrefix20220218\PHPUnit\Framework\TestCase;
use RectorPrefix20220218\Symplify\SmartFileSystem\SmartFileSystem;
use RectorPrefix20220218\Symplify\SymplifyKernel\Config\Loader\ParameterMergingLoaderFactory;
use RectorPrefix20220218\Symplify\SymplifyKernel\ContainerBuilderFactory;
final class ContainerBuilderFactoryTest extends \RectorPrefix20220218\PHPUnit\Framework\TestCase
{
    public function test() : void
    {
        $containerBuilderFactory = new \RectorPrefix20220218\Symplify\SymplifyKernel\ContainerBuilderFactory(new \RectorPrefix20220218\Symplify\SymplifyKernel\Config\Loader\ParameterMergingLoaderFactory());
        $container = $containerBuilderFactory->create([__DIR__ . '/config/some_services.php'], [], []);
        $hasSmartFileSystemService = $container->has(\RectorPrefix20220218\Symplify\SmartFileSystem\SmartFileSystem::class);
        $this->assertTrue($hasSmartFileSystemService);
    }
}