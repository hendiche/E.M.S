<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Poster;
use App\Http\Controllers\Backend\BackendController;
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
    	$backendFunc = new BackendController();

        if ($request->facebook) {
        	$backendFunc->facebook($request->content);
        }
        if ($request->slack) {
        	$backendFunc->slack($request->content);
        }
        if ($request->googlecalendar) {
        	$backendFunc->googleIndex($request);
        }
        
        return redirect()->route('entry')
            ->withSuccess('Your Event has successfully Added!!!');
    }
}
