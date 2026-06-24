<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        // Changed 'Panel' to 'panel' to match resources/views/panel.blade.php
        return view('panel');
    }
}