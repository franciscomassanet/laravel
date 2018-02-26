<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Google_Client;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;
use function PHPSTORM_META\type;

class classroomCreate extends Controller
{
    protected $client;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');

        // Google scopes
        $client->addScope( \Google_Service_Calendar::CALENDAR);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSES);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_PHOTOS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ROSTERS);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);



        $this->client = $client;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new \Google_Service_Classroom($this->client);
            $optParams = array();
            $postBody = new \Google_Service_Classroom_CourseWork(
                array(

                    'courseId'=> '9823550101',
                    'associatedWithDeveloper'=> true,
                    'description'=> "a test description with You tube video",
                    'state'=> "PUBLISHED",
                    'title'=> "test with youtube",
                    'maxPoints'=> 50,
                    'materials'=>[
                        'link'=>[
                            'url'=> 'http://blcg.innov8lcc.co.uk/lessons/childcare/c2b',
                        ],
                    ],
                    'workType'=> "ASSIGNMENT"
                )
            );


            $results = $service->courses_courseWork->create( '9823550101', $postBody, $optParams );
            dump($results);


        } else {
            return redirect()->route('oauthCallback');
        }

        //session_start();
        //if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
        //    $this->client->setAccessToken($_SESSION['access_token']);
        //    $service = new \Google_Service_Classroom($this->client);
        //    $optParams = array(
        //        'courseStates' => "ACTIVE",
        //        'pageSize' => 10
        //    );
        //    $results = $service->courses->listCourses($optParams);
        //    $items = $results->getCourses();

        //dump($items);
        //    return view('classrooms')->with('items',$items);
        //return $results->getItems();
        //} else {
        //    return redirect()->route('oauthCallback');
        //}
    }
    public function oauth()
    {
        session_start();
        $rurl = action('classroomController@oauth');
        $this->client->setRedirectUri($rurl);
        if (!isset($_GET['code'])) {
            $auth_url = $this->client->createAuthUrl();
            $filtered_url = filter_var($auth_url, FILTER_SANITIZE_URL);
            return redirect($filtered_url);
        } else {
            $this->client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $this->client->getAccessToken();
            return redirect('class_create');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session_start();
        $startDateTime = $request->start_date;
        $endDateTime = $request->end_date;
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $calendarId = 'primary';
            $event = new Google_Service_Calendar_Event([
                'summary' => $request->title,
                'description' => $request->description,
                'start' => ['dateTime' => $startDateTime],
                'end' => ['dateTime' => $endDateTime],
                'reminders' => ['useDefault' => true],
            ]);
            $results = $service->events->insert($calendarId, $event);
            if (!$results) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'message' => 'Event Created']);
        } else {
            return redirect()->route('oauthCallback');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $event = $service->events->get('primary', $eventId);
            if (!$event) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $event]);
        } else {
            return redirect()->route('oauthCallback');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $startDateTime = Carbon::parse($request->start_date)->toRfc3339String();
            $eventDuration = 30; //minutes
            if ($request->has('end_date')) {
                $endDateTime = Carbon::parse($request->end_date)->toRfc3339String();
            } else {
                $endDateTime = Carbon::parse($request->start_date)->addMinutes($eventDuration)->toRfc3339String();
            }
            // retrieve the event from the API.
            $event = $service->events->get('primary', $eventId);
            $event->setSummary($request->title);
            $event->setDescription($request->description);
            //start time
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($startDateTime);
            $event->setStart($start);
            //end time
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($endDateTime);
            $event->setEnd($end);
            $updatedEvent = $service->events->update('primary', $event->getId(), $event);
            if (!$updatedEvent) {
                return response()->json(['status' => 'error', 'message' => 'Something went wrong']);
            }
            return response()->json(['status' => 'success', 'data' => $updatedEvent]);
        } else {
            return redirect()->route('oauthCallback');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param $eventId
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($eventId)
    {
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            $service = new Google_Service_Calendar($this->client);
            $service->events->delete('primary', $eventId);
        } else {
            return redirect()->route('oauthCallback');
        }
    }
}
