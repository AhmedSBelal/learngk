<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingTranslationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locales = ['en', 'ar'];
        $translations = [];

        // Get all settings with their timestamps
        $settings = DB::table('settings')->get();

        foreach ($settings as $setting) {
            foreach ($locales as $locale) {
                $translations[] = [
                    'text' => null,
                    'locale' => $locale,
                    'short_description' => null,
                    'long_description' => null,
                    'setting_id' => $setting->id,
                ];
            }
        }

        DB::table('setting_translations')->insert($translations);
    }
}
