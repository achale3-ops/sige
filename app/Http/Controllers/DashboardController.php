<?php

namespace App\Http\Controllers;

use App\Models\Expediente;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $expedientes = Expediente::with('criador')
            ->latest()
            ->get();

        return view('dashboard', compact('expedientes'));
    }
}