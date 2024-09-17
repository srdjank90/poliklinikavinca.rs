<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingsController extends BackendController
{
    public function index()
    {
        $options = getOptions('_opt');
        return view('backend.settings.index', compact('options'));
    }

    public function seo()
    {
        $options = getOptions('_opt');
        return view('backend.settings.seo', compact('options'));
    }

    public function theme()
    {
        $themes = listThemes();
        $options = getOptions('_opt');
        return view('backend.settings.theme', compact('options', 'themes'));
    }
}
