<?php

namespace Fereloper\LaravelQuestionnaire;

use Fereloper\Models\QuestionnaireForm;

class LaravelQuestionnaire
{
    public static function test() {
        QuestionnaireForm::all();
        return "Hello world";
    }
}
