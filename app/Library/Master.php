<?php

namespace App\Library;

use Illuminate\Support\Str;
use App\Library\Traits\ResponseTrait;
use App\Library\Traits\StringTrait;

class Master {

    use ResponseTrait;

    protected static $_instance = null;

    /**
     * Prevent direct object creation
     */
    final private function __construct()
    {
    }

    /**
     * Prevent object cloning
     */
    private function __clone()
    {
    }

    /**
     * Returns new or existing Singleton instance
     * @return Master
     */
    final public static function getInstance()
    {
        if (null !== static::$_instance) {
            return static::$_instance;
        }
        static::$_instance = new static();
        return static::$_instance;
    }

    public static function hasDebug()
    {
        return config('app.debug', false);
    }

    public static function getModelName($model)
    {
        return Str::afterLast(get_class($model), '\\');
    }

    public static function getEnv()
    {
        return request()->header('env');
    }

    public static function getPaginationCount()
    {
        return config('sysconfig.pagination_count');
    }
}