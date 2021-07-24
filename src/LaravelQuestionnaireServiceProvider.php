<?php

namespace Fereloper\LaravelQuestionnaire;

use Illuminate\Support\ServiceProvider;

class LaravelQuestionnaireServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot(): void
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'fereloper');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'fereloper');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        $this->bootMigrations();

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/laravel-questionnaire.php', 'laravel-questionnaire');

        // Register the service the package provides.
        $this->app->singleton('laravel-questionnaire', function ($app) {
            return new LaravelQuestionnaire;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laravel-questionnaire'];
    }

    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole(): void
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__ . '/../config/laravel-questionnaire.php' => config_path('laravel-questionnaire.php'),
        ], 'laravel-questionnaire.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/fereloper'),
        ], 'laravel-questionnaire.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/fereloper'),
        ], 'laravel-questionnaire.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/fereloper'),
        ], 'laravel-questionnaire.views');*/

        // Registering package commands.
        // $this->commands([]);
    }

    function bootMigrations() {
        if (! class_exists('CreateQuestionnaireFormsTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/../migrations/create_questionnaire_forms_table.php.stub' => database_path("/migrations/{$timestamp}_create_questionnaire_forms_table.php"),
            ], 'migrations');
        }

        if (! class_exists('CreateQuestionnaireFormQuestionsTable')) {
            $timestamp = date('Y_m_d_His', time() + 1);

            $this->publishes([
                __DIR__ . '/../migrations/create_questionnaire_form_questions_table.php.stub' => database_path("/migrations/{$timestamp}_create_questionnaire_form_questions_table.php"),
            ], 'migrations');
        }

        if (! class_exists('CreateQuestionnaireFormResponsesTable')) {
            $timestamp = date('Y_m_d_His', time() + 2);

            $this->publishes([
                __DIR__ . '/../migrations/create_questionnaire_form_responses_table.php.stub' => database_path("/migrations/{$timestamp}_create_questionnaire_form_responses_table.php"),
            ], 'migrations');
        }
    }
}
