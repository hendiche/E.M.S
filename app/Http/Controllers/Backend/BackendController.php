<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;

class BackendController extends Controller
{
	protected $client;

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

	public function googleIndex()
	{
		$client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;

        session_start();

		if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $this->store();
            // $service = new Google_Service_Calendar($this->client);
            // $calendarId = 'primary';
            // $results = $service->events->listEvents($calendarId);
            // return $results->getItems();
        } else {
        	return redirect()->route('back.oauth');
            // return redirect()->route('oauthCallback');
        }
	}

	public function oauth()
	{
		$client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        $client->addScope(Google_Service_Calendar::CALENDAR);
        $guzzleClient = new \GuzzleHttp\Client(array('curl' => array(CURLOPT_SSL_VERIFYPEER => false)));
        $client->setHttpClient($guzzleClient);
        $this->client = $client;

		session_start();
        $rurl = action('Backend\BackendController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect()->route('back.google');
        }
	}

	public function store()
	{
        $startDateTime = Carbon::now();
        $endDateTime = $startDateTime->addDays(1);
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => 'this is title',
                'description' => 'this is description',
                'start' => ['dateTime' => '2018-09-12T05:06:07-07:00'],
                'end' => ['dateTime' => '2018-09-14T05:06:07-07:00'],
                'reminders' => ['useDefault' => false],
            ]);
            $results = $service->events->insert($calendarId, $event);
            dd($results);
            if (!$results) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
            return redirect()->route('back.google');
        }
	}
}
