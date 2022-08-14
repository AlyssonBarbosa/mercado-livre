<?php

namespace App\Enums;

abstract class EnumAbstract
{
    public static function getConstants()
    {
        $reflectionClass = new \ReflectionClass(static::class);
        return $reflectionClass->getConstants();
    }
}
