<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Harimayco\Menu\Models\Menus;
use Harimayco\Menu\Models\MenuItems;
use Harimayco\Menu\Facades\Menu;
use DB;
class DashboardController extends Controller
{
    //Index
    public function index()
    {
        return view('admin.index');
    }

    //Menu
     public function menu()
    {
        $menu = Menu::render();
        //$menu = DB::table('admin_menus')->get();
        $mscript = Menu::scripts();
        return view('admin.layouts.menu', compact('menu', 'mscript'));
    }
}
