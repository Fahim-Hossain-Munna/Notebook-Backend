<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class SettingController extends Controller
{
    public function index(){
        return view('dashboard.setting.index');
    }
    public function update_fname(Request $request){
        $request->validate([
            'firstname' => 'required',
        ]);

        User::find(auth()->user()->id)->update([
            'firstname' => $request->firstname,
            'created_at' => now(),
        ]);

        return back();
    }
    public function update_lname(Request $request){
        $request->validate([
            'lastname' => 'required',
        ]);

        User::find(auth()->user()->id)->update([
            'lastname' => $request->lastname,
            'created_at' => now(),
        ]);

        return back();
    }
    public function update_email(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);

        User::find(auth()->user()->id)->update([
            'email' => $request->lastname,
            'created_at' => now(),
        ]);

        return back();
    }
    public function update_password(Request $request){
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if(Hash::check($request->current_password, auth()->user()->password)){
            User::find(auth()->user()->id)->update([
            'password' => Hash::make($request->password),
            'created_at' => now(),
            ]);
        }else{
            return back()->withErrors(['current_password' => 'current password doesnot matched!!']);
        }
        return back();
    }
    public function update_picture(Request $request){
        $request->validate([
            "picture" => 'required|image',
        ]);

        if($request->hasFile('picture')){
            $manager = new ImageManager(new Driver());
            $image = auth()->id().'-'.auth()->user()->lastname.'-'.now()->format('Y-m-d').'.'.$request->file('picture')->getClientOriginalExtension();
            $img = $manager->read($request->file('picture'));
            $img->toJpeg(80)->save(base_path('public/uploads/profile_image/'.$image));

            User::find(auth()->id())->update([
                'picture' =>  $image,
                'created_at' => now(),
            ]);
            return back();
        }
    }
    public function update_biodata(Request $request){
        $request->validate([
            "biodata" => 'required|image',
        ]);
        User::find(auth()->user()->id)->update([
            'biodata' => $request->biodata,
            'created_at' => now(),
        ]);
        return back();
    }
    public function update_title(Request $request){
        $request->validate([
            "title" => 'required|image',
        ]);
        User::find(auth()->user()->id)->update([
            'title' => $request->title,
            'created_at' => now(),
        ]);
        return back();
    }
    public function update_address(Request $request){
        $request->validate([
            "address" => 'required|image',
        ]);
        User::find(auth()->user()->id)->update([
            'address' => $request->address,
            'created_at' => now(),
        ]);
        return back();
    }
    public function update_contact(Request $request){
        $request->validate([
            "contact" => 'required|image',
        ]);
        User::find(auth()->user()->id)->update([
            'contact' => $request->contact,
            'created_at' => now(),
        ]);
        return back();
    }
}
