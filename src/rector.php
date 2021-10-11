<?php

declare(strict_types=1);

use Rector\Core\ValueObject\PhpVersion;

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelSetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
// use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    // get parameters
    $containerConfigurator->import(LaravelSetList::LARAVEL_80);
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::SKIP, [
    //     // absolute directory
         __DIR__ . '/vendor',

    //     // absolute file
    //     // __DIR__ . '/some-path/some-file.php',

    //     // with mask
    //     // '*/Fixture/*',

    //     // specific class
    //     Orchestra\Testbench\Concerns\CreatesApplication::class,
    //     // SomeClass::class,

    //     // specific class specific path
    //     // NarrowedClass::class => [__DIR__ . '/src/OnlyHere'],

    //     // class code in paths
    //     // AnotherSniff::class . '.SomeCode' => ['*Sniff.php', '*YamlFileLoader.php'],
    ]);
    $parameters->set(Option::PATHS, [
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ .'/resources/views',
        __DIR__ . '/routes'
        ]);
        $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);
    // // Define what rule sets will be applied
    $containerConfigurator->import(SetList::PHP_80);

    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
