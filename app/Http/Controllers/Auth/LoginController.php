<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Illuminate\Support\Facades\Auth;

//use App\Http\Controllers\Auth;

use Carbon\Carbon;
use Google_Client;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    protected $client;

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
	
	public function redirectToProvider(){

        $client = new Google_Client();
        $client->setAuthConfig('client_secret.json');

        // Google scopes
        $client->addScope( \Google_Service_Calendar::CALENDAR);
        $client->addScope(\Google_Service_Classroom::CLASSROOM_COURSES);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_ANNOUNCEMENTS);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_ME_READONLY);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS);
        $client->addScope( \Google_Service_Classroom::CLASSROOM_COURSEWORK_STUDENTS_READONLY);

        $this->client = $client;
        session_start();
        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $this->client->setAccessToken($_SESSION['access_token']);
            return Socialite::driver('google')->redirect();

        } else {
            return Socialite::driver('google')->redirect();
        }

    }

    /**
     * Obtain the user information from google.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();
		$findUser = User::where('email', $user->getEmail())->first();
		
		if($findUser){
			Auth::login($findUser);
		}else {
			$newUser = new User;
			$newUser->email = $user->getEmail();
			$newUser->name = $user->getName();
			$newUser->password = bcrypt(123456);
			$newUser-> save();
			Auth::login($newUser);
		}
		
		//return view('home');
        return redirect('/home');
    }
}
