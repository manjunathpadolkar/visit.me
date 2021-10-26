<?php

namespace App\Http\Controllers;

use App\Models\SocialLinks;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserProfile;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function getNotifications()
    {
        $notifications = auth()->user()->unreadNotifications;
        return response()->json([
            'notifications' => $notifications,
        ], Response::HTTP_OK);
    }

    public function markNotification(Request $request)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }

    public function getUser()
    {
        $user = auth()->user(); 
        return response()->json([
            'user_name' => $user->user_name,
        ], Response::HTTP_OK);
    }

    public function getProfile()
    {
        $user = auth()->user(); 
        $userProfile = UserProfile::where('user_id', $user->id)->first();
        return response()->json([
            'userProfile' => $userProfile,
        ], Response::HTTP_OK);
    }

    public function getSocialLinks()
    {
        $user = auth()->user(); 
        $socialLinks = SocialLinks::where('user_id', $user->id)->get();
        return response()->json([
            'socialLinks' => $socialLinks,
        ], Response::HTTP_OK);
    }

    //*************************UPDATE FIRST NAME******************************
    public function updateProfile(Request $request)
    {
        try
        {
            // Get User id
            $user = auth()->user();
            //Get Profile
            $user_id = UserProfile::where('user_id', $user->id)->first();
            //Update Profile
            UserProfile::find($user_id->id)->update($request->all());  
            return response()->json(['message' => 'User Updated Successfully.']);
        }
        catch(Exception $errors)
        {
            return response()->json(['errors' => $errors]);
        }
    }

    public function addSocialLinks(Request $request)
    {
        $user = auth()->user();
        $inputs = json_decode($request->my_prop_name);
        if(!$inputs){
            return response()->json(['error' => 'Incorrect Link.']);
        }
        // $link_type="";
        // $link_source="";
        foreach($inputs as $input) 
        {
            if(strpos($input->name, "facebook") !== false){
                $link_type="facebook";
                $link_source = "/images/social_icons/facebook.png";
            } 
            else if(strpos($input->name, "instagram") !== false){
                $link_type="instagram";
                $link_source = "/images/social_icons/instagram.png";
            }
            else if(strpos($input->name, "linkedin") !== false){
                $link_type="linkedin";
                $link_source = "/images/social_icons/linkedin.png";
            }
            else if(strpos($input->name, "twitter") !== false){
                $link_type="twitter";
                $link_source = "/images/social_icons/twitter.png";
            }
            else{
                return response()->json(['error' => 'Incorrect Link.']);
            }
            // youtube
            $data = array(
                'user_id' => $user->id,
                'name' => $input->name,
                'link_type' => $link_type,
                'source' => $link_source
            );
            SocialLinks::create($data);
        }   
        return response()->json(['message' => 'links added Successfully.']);
    }

    public function upload(Request $request)
    {
        $rules = array(
            'user_image' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $user = auth()->user();

        
        if($request->file()) {
            $fileName = time().'.'.request()->user_image->getClientOriginalExtension(); 
            $request->user_image->move(public_path('storage/images'), $fileName); 

            $data = array(
                'user_image' => $fileName 
            );
            UserProfile::whereId($user->id)->update($data);
            return response()->json(['success'=>'File uploaded successfully.']);
        }
   }

   public function uploadBg(Request $request)
    {
        $rules = array(
            'bg_image' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
        );

        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }

        $user = auth()->user();

        
        if($request->file()) {
            $fileName = time().'.'.request()->bg_image->getClientOriginalExtension(); 
            $request->bg_image->move(public_path('storage/images'), $fileName); 

            $data = array(
                'bg_image' => $fileName 
            );
            UserProfile::whereId($user->id)->update($data);
            return response()->json(['success'=>'File uploaded successfully.']);
        }
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
        $rules = array(
            'user_id' => 'required',
            'first_name' => 'required', 
            'last_name' => 'required', 
            'full_name_font' => 'required',
            'full_name_color' => 'required',
            'full_name_font_size' => 'required',
            'location' => 'required',
            'location_color' => 'required',
            'location_font' => 'required',
            'location_font_size' => 'required',
            'skill_tag' => 'required',
            'skill_tag_font' => 'required',
            'skill_tag_bg_color' => 'required',
            'skill_tag_text_color' => 'required',
            'website' => 'required',
            'website_font' => 'required',
            'website_color' => 'required',
            'description' => 'required',
            'description_color' => 'required',
            'description_font' => 'required'
        );
        $error = Validator::make($request->all(), $rules);

        if($error->fails())
        {
            return response()->json(['errors' => $error->errors()->all()]);
        }     
        
        if(UserProfile::Where('user_id', $request->user_id)->exists())
        {
            UserProfile::find($request->input('user_id'))->update($request->all());
            return response()->json(['message' => 'User Updated Successfully.']);
        }
        else
        {  
            UserProfile::create($request->all());  
            return response()->json(['message' => 'Details Updated.']); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
