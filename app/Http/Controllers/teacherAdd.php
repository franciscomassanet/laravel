<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Google_Client;
use DB;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use phpDocumentor\Reflection\Types\Null_;
use function PHPSTORM_META\type;

class teacherAdd extends Controller
{
    protected $client;

    public function __construct()
    {
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');

        // Google scopes
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSES);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_PHOTOS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ROSTERS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);


        $this->client = $client;
    }

    public function index()
    {
        session_start();

        $client = new Google_Client();
        $client->setAuthConfig('client_secrets.json');
        $client->setRedirectUri('http://blcg.innov8lcc.co.uk/teacher/add');
        // Google scopes
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSES);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_PHOTOS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ROSTERS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);
        $client->addScope(\Google_Service_Drive::DRIVE);

        if (! isset($_GET['code'])) {
            $auth_url = $client->createAuthUrl();
            header('Location: ' . filter_var($auth_url, FILTER_SANITIZE_URL));
        } else {
            $client->authorize($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            $redirect_uri = 'http://' . $_SERVER['HTTP_HOST'] . '/';
            header('Location: ' . filter_var($redirect_uri, FILTER_SANITIZE_URL));
        }

    }

    public function teacherAdd (){

        session_start();
        $details = 'nothing';
        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');
        // Google scopes
        $client->addScope(\Google_Service_Calendar::CALENDAR);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSES);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_EMAILS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_PROFILE_PHOTOS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ROSTERS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);
        $client->addScope(\Google_Service_Drive::DRIVE);

        $client->setRedirectUri('http://blcg.innov8lcc.co.uk/teacher/add');
        $client->setAccessType('offline');
        $client->setIncludeGrantedScopes(true);
        $client->setApprovalPrompt('force');

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);

        } else {
            $service = new \Google_Service_Classroom($this->client);
            $details = $service->userProfiles->get('me');
        }

        dump($details);
    }



}
