<?php

declare(strict_types=1);

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Rector\Laravel\Set\LaravelSetList;
use Rector\Core\ValueObject\PhpVersion;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(LaravelSetList::LARAVEL_80);

    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/app'
    ]);

    // Define what rule sets will be applied
    $parameters->set(Option::PHP_VERSION_FEATURES, PhpVersion::PHP_80);
 // Path to phpstan with extensions, that PHPSTan in Rector uses to determine types
 $parameters->set(Option::PHPSTAN_FOR_RECTOR_PATH, getcwd() . '/phpstan.neon');
    // get services (needed for register a single rule)
    // $services = $containerConfigurator->services();

    // register a single rule
    // $services->set(TypedPropertyRector::class);
};
