<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Models\ColorSize;
use App\Models\Size;
use Illuminate\Http\Request;

class AdditionalController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        $sizes = Size::all();
        return view('addition.color-size.index', compact('colors', 'sizes'));
    }
}
