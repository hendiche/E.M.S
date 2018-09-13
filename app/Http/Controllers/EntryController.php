<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Poster;
use App\Post;

class EntryController extends Controller
{
    public function index() {
        $posters = Poster::select('id','name')->get();

        return View('Backend.index')
        ->with('posters', $posters);
    }

    public function submit(Request $request) {

        Post::create([
            'message' => $request -> content,
            'name' => $request -> name,
            'start_date' => \Carbon\Carbon::parse($request -> start_date)->format('Y-m-d'),
            'end_date' => \Carbon\Carbon::parse($request -> end_date)->format('Y-m-d'),
            
        ]);

        dd("Saved to DB!");
    }
}
