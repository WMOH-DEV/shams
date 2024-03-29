<?php

namespace App\View\Components;

use App\Models\admin\Setting;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Sidebar extends Component
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
        $setting = Setting::first();
       // dd($setting);
        return view('components.sidebar', compact('setting'));
    }
}
