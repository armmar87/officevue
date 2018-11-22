<?php
/**
 * Created by PhpStorm.
 * User: ifix office
 * Date: 11/22/2018
 * Time: 12:42 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\View\View;
use KgBot\LaravelLocalization\Facades\ExportLocalizations;


class LocalizationComposer
{
    /**
     * The user repository implementation.
     *
     */
    protected $messages;

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->messages = ExportLocalizations::export()->toArray();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('messages', $this->messages);
    }
}
