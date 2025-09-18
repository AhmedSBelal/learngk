<?php

use App\Models\Setting;
use App\Models\SiteLanguage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

function settingText($key, $value): string
{
    $setting = Cache::rememberForever(Str::slug($key), function () use ($key) {
        return Setting::query()->where('key', $key)->first();
    });
    if (!$setting) {
        return '';
    }

    if ($setting->$value == null) {
        return '';
    }

    return $setting->$value;
}

function settingDate($key): string
{
    $setting = Cache::rememberForever(Str::slug($key), function () use ($key) {
        return Setting::query()->where('key', $key)->first();
    });
    if (!$setting) {
        return '';
    }
    return Carbon::make($setting->date)->format('Y/m/d');
}

function settingImage($key): string
{
    $setting = Cache::rememberForever(Str::slug($key), function () use ($key) {
        return Setting::query()->where('key', $key)->first();
    });

    if (empty($setting)) {
        return '';
    }

    if ($setting && $setting->image == null) {
        return '';
    }
    return $setting->image->url;
}

function settingMultiple($key)
{
    $setting = Cache::rememberForever(Str::slug($key), function () use ($key) {
        return Setting::query()->where('key', $key)->first();
    });

    if (empty($setting)) {
        return '';
    }

    return $setting->multi_image;
}

function settingFile($key): string
{
    $file = Cache::rememberForever(Str::slug($key), function () use ($key) {
        return Setting::query()->where('key', $key)->first();
    });

    if ($file == null) {
        return '';
    }

    if ($file->file == null) {
        return '';
    }

    return $file->file->getUrl();
}

function siteLanguages(): array
{
    $langs = Cache::remember('site-languages', 24 * 60 * 60, function () {
        return SiteLanguage::orderBy('id', 'asc')->pluck('locale')->toArray();
    });

    if (count($langs) == 0) {
        return config('translatable.locales');
    }

    return $langs;
}
