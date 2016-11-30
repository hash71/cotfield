<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function ajaxCreateOption(\Illuminate\Http\Request $request, $module)
    {
        $valid_option_name = \App\Option::where('name', $module)->first();
        $duplicate = \App\OptionList::where('option', $module)->where('list', $request->input('value'))->first();

        if ($valid_option_name && !$duplicate && $request->input('value')) {
            \App\OptionList::create([
                'option' => $module,
                'list' => $request->input('value')
            ]);
            return 1;
        } else {
            return 0;
        }
    }
}
