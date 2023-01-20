<?php

use Mono\View\View;
use Mono\Http\Request;
use Mono\Support\Hash;
use Mono\Http\Response;
use Mono\Validation\Validator;

if (!function_exists('env')) {
    function env($key, $default = null)
    {
        if (array_key_exists($key, $_ENV)) {
            return $_ENV[$key];
        }

        return $default;
    }
}

if (!function_exists('base_path')) {
    function base_path()
    {
        return dirname(__DIR__) . '/../';
    }
}

if (!function_exists('class_basename')) {
    function class_basename($class)
    {
        $class = is_object($class) ? get_class($class) : $class;

        return basename(str_replace('\\', '/', $class));
    }
}

if (!function_exists('view_path')) {
    function view_path()
    {
        return  base_path() . 'views/';
    }
}


if (!function_exists('config_path')) {
    function config_path()
    {
        return base_path() . 'config/';
    }
}

if (!function_exists('value')) {
    function value($value)
    {
        return $value instanceof Closure ? $value() : $value;
    }
}

if (!function_exists('public_path')) {
    function public_path()
    {
        return base_path() . 'public/';
    }
}

if (!function_exists('view')) {
    function view($view, $params = [])
    {
        echo View::make($view, $params);
    }
}


if (!function_exists('database_path')) {
    function database_path()
    {
        return base_path() . 'database/';
    }
}
