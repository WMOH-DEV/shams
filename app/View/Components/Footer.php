<?php

namespace App\View\Components;

use App\Models\admin\Setting;
use Illuminate\View\Component;

class Footer extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $site_name = Setting::first()->site_name;
        $site_web = Setting::first()->site_web;
        return view('components.footer', compact('site_name','site_web'));
    }
}
