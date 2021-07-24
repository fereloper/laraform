<?php

namespace Fereloper\LaravelQuestionnaire\Http\Controllers;

use App\Http\Controllers\Controller;
use Fereloper\LaravelQuestionnaire\Models\QuestionnaireForm;

class FormController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $forms = QuestionnaireForm::all();

        return view('fereloper::forms.index', compact('forms'));
    }
}
