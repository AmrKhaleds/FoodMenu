<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class GeneralSettings extends Settings
{
    public $site_name;
    public $about_us;
    public $site_logo;
    public $email;
    public $phone;
    public $copyright;

    public static function group(): string
    {
        return 'general';
    }

    public function getAllSettings(): array
    {
        return [
            'site_name' => $this->site_name,
            'about_us' => $this->about_us,
            'sit_logo' => $this->site_logo,
            'email' => $this->email,
            'phone' => $this->phone,
            'copyright' => $this->copyright,
        ];
    }
}