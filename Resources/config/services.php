<?php

declare(strict_types=1);

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Tetranz\Select2EntityBundle\Form\Type\Select2EntityType;
use Tetranz\Select2EntityBundle\Service\AutocompleteService;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

return static function (ContainerConfigurator $container): void {
    $services = $container->services();

    $services
        ->set('tetranz_select2entity.select2entity_type', Select2EntityType::class)
        ->tag('form.type', ['alias' => 'tetranz_select2entity'])
        ->arg(0, service('doctrine'))
        ->arg(1, service('router'))
        ->arg(2, '%tetranz_select2_entity.config%');

    $services
        ->set('tetranz_select2entity.autocomplete_service', AutocompleteService::class)
        ->arg(0, service('form.factory'))
        ->arg(1, service('doctrine'));
};
