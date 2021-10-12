<?php

declare(strict_types=1);

use Rector\Core\ValueObject\PhpVersion;

use Rector\Core\Configuration\Option;
use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\Laravel\Set\LaravelSetList;

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $containerConfigurator->import(SetList::PHP_74);
    $containerConfigurator->import(LaravelSetList::LARAVEL_80);
    // get parameters
    $parameters = $containerConfigurator->parameters();
    $parameters->set(Option::PATHS, [
        __DIR__ . '/app',
        __DIR__ . '/bootstrap',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ .'/resources/views',
        __DIR__ . '/routes'
    ]);

    $parameters->set(Option::SKIP, [
    __DIR__ . '/vendor',
    // __DIR__ . '/codeception',

    TypedPropertyRector::class ,

    ]);

    // Define what rule sets will be applied
    $parameters->set(Option::PHP_VERSION_FEATURES,  PhpVersion::PHP_74); // 適宜変更
    // $parameters->set(Option::AUTOLOAD_PATHS, [
    //     __DIR__ . '/vendor'

    // ]);

};



