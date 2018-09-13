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
use DateTime;

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

	public function slack($content)
	{
		$url = "https://hooks.slack.com/services/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";
		$client = new Client();
		$res = $client->request('POST', $url, [
			RequestOptions::JSON => ['text' => $content]
		]);
	}

	public function facebook($content)
	{
		$url = "https://graph.facebook.com/v3.1/956851531155391/feed";
		$fb_token = "EAAc6g5KyLsgBAIUdZAmj1L6ph8iBoQBBV6csnMSzAKPA4K4ZBtqOvFFYyyH0Bs37CgNRZCdyzHgvIVqDHXOVGxpnGBtORIPF9vxAn2pSLyzSgdgG9AvhNti3RZB4TYyVZAEbFWEXR0bvVbF6RZBqpWPx8tPCrunE9cAaDd240nXNuiWyPzAZCYdSfwt7Idfk349NycT3ovyDQZDZD";
		$message = $content;

		$url = $url . "?access_token=" . $fb_token;
		$url = $url . "&message=" . $message;

		$client = new Client();
		$res = $client->request('POST', $url);
	}

	public function googleIndex($request)
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
            $this->store($request);
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
            return redirect()->route('entry');
        }
	}

	public function store($request)
	{
        $startDateTime = new DateTime($request->datetime_start);
        $endDateTime = new DateTime($request->datetime_end);

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->title,
                'description' => $request->content,
                'start' => ['dateTime' => $startDateTime->format(DateTime::ISO8601)],
                'end' => ['dateTime' => $endDateTime->format(DateTime::ISO8601)], //2018-09-14T05:06:07-07:00
                'reminders' => ['useDefault' => false],
            ]);
            $results = $service->events->insert($calendarId, $event);
            // dd($results);
            // if (!$results) {
            //     return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            // }
            // return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
            return redirect()->route('back.google');
        }
	}
}
