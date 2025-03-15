<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Biodata;
use App\Models\Produk;

class HomepageController extends Controller
{
    public function index()
    {
        $biodata = Biodata::all(); // Get all biodata records
        $produk = Produk::all(); // Get all products

        return view('homepage', compact('biodata', 'produk'));
    }
}