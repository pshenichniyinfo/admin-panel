<?php

namespace Pshenichniyinfo\AdminPanel\View\Components;

use Illuminate\View\Component;

class Menu extends Component
{
    public function render()
    {
        $menus = config('admin-panel.menu');

        return view('admin-panel::components.menu', ['menus' => $menus]);
    }
}
