<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

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

	public function slack()
	{
		$url = "https://hooks.slack.com/services/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";
		$client = new Client();
		$res = $client->request('POST', $url, [
			RequestOptions::JSON => ['text' => 'bar']
		]);
		dd($res->getBody());
	}

	public function facebook()
	{
		$url = "https://graph.facebook.com/v3.1/956851531155391/feed";
		$fb_token = "EAAc6g5KyLsgBAAAlG8v78warLxplNljeckzqBckKlz3RGZAb8O1wrqzeDZBOw5yXL1FtjhDmG8cRDtBxIqFXGHcPKJ6YtdbEMiuanvpXPhnTWzXkjGX0yeuOqqEc89IvrvOeBzQYBBMsG3nrES5bMhEWtoBx0BhP65WQasBwwZA7ZCgWujVFH5KbczpXJh9I2jQKesX7HgZDZD";
		$message = "test post message";

		$url = $url . "?access_token=" . $fb_token;
		$url = $url . "&message=" . $message;

		$client = new Client();
		$res = $client->request('POST', $url);
		dd($res->getBody());
	}
}
