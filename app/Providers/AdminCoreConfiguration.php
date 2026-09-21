<?php

namespace App\Providers;

use Blaze\AdminCore\AdminCoreConfiguration as BaseAdminCoreConfiguration;

class AdminCoreConfiguration extends BaseAdminCoreConfiguration
{
    /**
     * @return array<string, bool>
     */
    public function modules(): array
    {
        return parent::modules();
    }

    /**
     * @return array<string, bool>
     */
    public function features(): array
    {
        return array_merge(parent::features(), [
            'hero_highlighted_text' => true,
        ]);
    }
}
