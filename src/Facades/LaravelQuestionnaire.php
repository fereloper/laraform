<?php

namespace Fereloper\LaravelQuestionnaire\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelQuestionnaire extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-questionnaire';
    }
}
