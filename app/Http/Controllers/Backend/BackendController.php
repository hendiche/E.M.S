<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;


class BackendController extends Controller
{
	public function index()
	{
		return view('Backend.index');
	}

	public function showForm()
	{
		return view('Backend.form');
	}
}
