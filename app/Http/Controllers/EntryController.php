<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poster;

class EntryController extends Controller
{
    public function index() {
        $posters = Poster::select('id','name')->get();

        return View('Backend.index')
        ->with('posters', $posters);
    }

    public function submit(Request $request) {
        dd($request -> all());
    }
}
