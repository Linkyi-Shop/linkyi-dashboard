<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index()
    {
        $data = Store::latest()->get();
        return view('backoffice.store.index', compact('data'));
    }
    public function show($id)
    {
        $data = Store::findOrFail($id);
        return view('backoffice.store.show', compact('data'));
    }
}
