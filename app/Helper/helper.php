<?php

use Illuminate\Support\Facades\Storage;

if (!function_exists('logoImage')) {
    function logo($logoFileName)
    {
        $logoPath = 'storage/settings/logo/' . $logoFileName;
        if (file_exists(public_path($logoPath)) && !empty($logoFileName)) {
            $logoUrl = asset($logoPath);
        } else {
            $logoUrl = asset('assets/images/logo/logo.png'); // Replace with your default image path
        }
        return $logoUrl;
    }
}