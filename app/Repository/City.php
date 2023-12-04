<?php

namespace App\Repository;

use App\Models\City as ModelsCity;

class City
{
    CONST CACHE_KEY = 'CITIES';
    public function all($orderBy){
        $key = "all.{$orderBy}";
        $cachKey = $this->getCacheKey($key);
        return cache()->remember($cachKey,now()->addMinutes('5'),function()use($orderBy){
            return ModelsCity::orderBy($orderBy)->get();
        });
    }

    public function getCacheKey($key)
    {
        $key = strtoupper($key);
        return self::CACHE_KEY . '.' .$key;
    }
}