<?php

use App\Providers\AdminCoreConfiguration;

return [
    'configuration' => AdminCoreConfiguration::class,

    /**
     * Optional custom homepage section definitions.
     * When left null, defaults to AdminCoreConfiguration::homepageSectionDefinitions().
     */
    'homepage_sections' => null,
];
