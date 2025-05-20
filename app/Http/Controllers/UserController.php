<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::select('id','name','email','mobile','created_at')->get();
        // dd($users);

        return view('admin.user.index', compact('users'));
    }

    public function create(){

        return view('admin.user.create');
    }

    public function store(Request $request){
        // dd($request->all());

        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'mobile' => 'required|digits:10',
        ]);
        try{
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'mobile' => $request->mobile,
            ]);
            if($user->id){
                notify()->success('User Created Successfully', 'Success');
                return redirect()->route('user_listing');
            }else{
                notify()->error('User Creation Failed', 'Error');
                return redirect()->back()->withInput($request->all());
            }
        }catch(Exception $e){
            notify()->error("User Creation Failed $e-getMessage()", 'Error');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function edit($id){
        // dd($id);
        $user = User::findOrFail($id);
        // dd($user);

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id){
        // dd($id);
        $request->validate([
            'name' => 'required|string|min:2|max:255|unique:users,name,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|digits:10',
        ]);
        try{
            $user = User::findOrFail($id);  // this is perfectly fine.
            //$user->update($request->all());  // this thing you should avoid doing it! it is one of the worst thing ever.

            $is_updated = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
            ]);
            // dd($is_updated);
            if($is_updated){
                notify()->success('User Updated Successfully', 'Success');
                return redirect()->route('user_listing');
            }else{
                notify()->error('User Updation Failed', 'Error');
                return redirect()->back()->withInput($request->all());
            }
        }catch(Exception $e){
            notify()->error("User Updation Failed $e-getMessage()", 'Error');
            return redirect()->back()->withInput($request->all());
        }
    }

    public function destroy(int $id){
        // dd($id);
        $user = User::findOrFail($id);
        $is_deleted = $user->delete();
        // dd($is_deleted);

        if($is_deleted){
            notify()->success('User Deleted Successfully', 'Success');
            return redirect()->route('user_listing');
        }else{
            notify()->error('User Deletion Failed', 'Error');
            return redirect()->route('user_listing');
        }
    }
}
