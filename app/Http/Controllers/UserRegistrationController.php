<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Validator;
use Image;

class UserRegistrationController extends Controller
{
    public function showRegistrationForm()
    {
        if (Auth::User()->role=='Admin') {
            return view('admin.user.register');
        }else{
            return redirect('/home');
        }
    	
    }

    public function userSave(Request $request)
    {
    	 $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $users = User::all();
        return view('admin.user.user-list',['users'=>$users]);

      
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:11','max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userList(){
    	if (Auth::User()->role=='Admin') {
            $users = User::all();
        return view('admin.user.user-list',['users'=>$users]);
        }else{
            return redirect('/home');
        }
    	 
    }

    public function userProfile($userId){

        $user = User::find($userId);
        return view('admin.user.profile',['user'=>$user]);
        //return $user;
    }

    public function changeUserInfo($id){
         $user = User::find($id);
        return view('admin.user.changeUserInfo',['user'=>$user]);

    }

    public function userInfoUpdate(Request $request){

        $this->validate($request,[
            'name'=>"required|string|max:255",
            'mobile'=>"required|string|max:13|min:11",
            'email'=>"required|string|max:255|email"
        ]);

        $user = User::find($request->user_id);
        $user -> name = $request -> name;
        $user -> mobile = $request -> mobile;
        $user -> email = $request -> email;

        $user->save();

        return redirect("/userProfile/$request->user_id")->with('message','Oparation Successful');

    }

    public function changeUserAvatar($id){
        $user = User::find($id);
         return view('admin.user.changeUserAvatar',['user'=>$user]);

    }

    public function updateUserPhoto(Request $request){
        $user = User::find($request->user_id);
        $file = $request->file('avatar');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/avatar/';
        $imageUrl = $directory.$imageName;
        //$file->move($directory,$imageUrl);

        Image::make($file)->resize(300, 300)->save($imageUrl);

        $user->avatar = $imageUrl;
        $user->save();
        return redirect("/userProfile/$request->user_id")->with('message','Photo Upload Successful');
    }

    public function changeUserPassword($id){
        $user = User::find($id);
        return view('admin.user.changeUserPassword',['user'=>$user]);
    }

    public function userPasswordUpdate(Request $request){

        $this->validate($request,[
            'new_password' => 'required|string|min:8'
        ]);

        $oldPassword = $request->password;
        $user = User::find($request->user_id);

        if (Hash::check($oldPassword,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect("/userProfile/$request->user_id")->with('message','password Update Successful');
        }else{
            return back()->with('error_message','Old password dose not match, please try again');
        }

    }

}
