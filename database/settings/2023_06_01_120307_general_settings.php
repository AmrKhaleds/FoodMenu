<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Food Menu');
        $this->migrator->add('general.about_us', null);
        $this->migrator->add('general.site_logo', 'default_logo.png');
        $this->migrator->add('general.email', null);
        $this->migrator->add('general.phone', null);
        $this->migrator->add('general.copyright', 'AKEiessa');
    }
};
