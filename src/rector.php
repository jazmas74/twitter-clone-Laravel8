<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
// use Rector\Php74\Rector\Property\TypedPropertyRector;
// use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Core\ValueObject\PhpVersion;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(LaravelSetList::LARAVEL_80);

    // get parameters
    $parameters = $containerConfigurator->parameters();

    // $parameters->set(Option::SKIP, [
    //     // absolute directory
    //     // __DIR__ . '/some-path',

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
    // ]);

    $parameters->set(Option::PATHS, [

        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ .'/resources/views',
        __DIR__ . '/routes'
    ]);

    // Define what rule sets will be applied
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);
 // Path to phpstan with extensions, that PHPSTan in Rector uses to determine types
 $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, __DIR__ . '/phpstan.neon');

 $parameters->set(Option::AUTOLOAD_PATHS, [
    __DIR__ . '/config',
]);

$parameters->set(Option::BOOTSTRAP_FILES, [
    __DIR__ . '/bootstrap/app.php',
    // __DIR__ . '/rector-bootstrap.php',
]);
    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
