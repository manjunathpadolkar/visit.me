<?php

namespace App\Http\Controllers;

use App\Models\SocialLinks;
use App\Models\User;
use App\Models\UserProfile;
use App\Notifications\SendEmailMessage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Notification;
use Inertia\Inertia;

class VisitorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    
    //Update state here
    public function getVisitorProfile($id)
    {   
        $registeredUser = true;
        $user = auth()->user();
        if(!$user){
            $registeredUser = false;
        }
        $userProfile = UserProfile::where('user_id', $id)->first();
        $socialLinks = SocialLinks::where('user_id', $id)->get();
        return response()->json([
            'userProfile' => $userProfile,
            'socialLinks' => $socialLinks,
            'registeredUser' => $registeredUser
        ], Response::HTTP_OK);
    }

    public function showUser($username)
    {
        $user = User::where('user_name',$username)->first();
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        return Inertia::render('Visitor', ['userProfile' => $userProfile]);
    }

    public function sendVisitorMessage(Request $request)
    {
        $registeredUser = auth()->user();
        $user = User::where('id',$request->userId)->first();
        
        if($registeredUser){
            $sendMessageData = [
                'body'=>'You received a new notification',
                'sendMessageText'=>$request->visitorMessage,
                'visitorFirstName'=>$user->first_name,
                'visitorLastName'=>$user->last_name,
                'visitorEmail'=>$user->email,
                'url'=>url('/'),
                'thankyou'=>'You can reply back to the user.',
            ];
        }
        else{
            $sendMessageData = [
                'body'=>'You received a new notification',
                'sendMessageText'=>$request->visitorMessage,
                'visitorFirstName'=>$request->visitorFirstName,
                'visitorLastName'=>$request->visitorLastName,
                'visitorEmail'=>$request->visitorEmail,
                'url'=>url('/'),
                'thankyou'=>'You can reply back to the user.',
            ];
        }
        

        $user->notify(new SendEmailMessage($sendMessageData));
        // Notification::send($user, new SendEmailMessage($sendMessageData));

        return response()->json([
            'message' =>'Message sent successfully!' 
        ], Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
