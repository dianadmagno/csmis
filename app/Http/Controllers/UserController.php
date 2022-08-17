<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\UploadPhotoRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        return view('users.index', [
            'users' => User::where('lastname', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('firstname', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('middlename', 'LIKE', '%'.$keyword.'%')
                        ->orWhere('email', 'LIKE', '%'.$keyword.'%')
                        ->paginate(10)
        ]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(UserRequest $request)
    {
        User::create([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'email' => $request->email,
            'password' => Hash::make($request->lastname)
        ]);
        return redirect()->route('user.index')->with('status', 'User Created Successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $currentUser = auth()->user();
        return view('profile.edit', [
            'user' => !$currentUser->is_superadmin ? $currentUser : $user
        ]);
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->update([
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'email' => $request->email,
            'is_superadmin' => $request->has('is_superadmin')
        ]);
        return back()->with('status', 'User Updated Successfully');
    }

    public function changePassword(PasswordRequest $request, $id)
    {
        $user = User::find($id);
        $validate = Hash::check($request->old_password, $user->password);
        if (!$validate) {
            return back()->with('status', 'Password did not match');
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);
        return back()->with('status', 'User Password Updated Successfully');
    }

    public function uploadPhoto(UploadPhotoRequest $request, $id)
    {
        $user = User::find($id);
        if ($request->photo) {
            switch ($request->input('action')) {
                case 'upload':
                    $photo = $user->id.'_'.time().'.'.$request->photo->getClientOriginalExtension();

                    if ($user->photo) {
                        if (file_exists(public_path('/user images/'.$user->photo))) {
                            unlink(public_path('/user images/'.$user->photo));
                        }
                    }

                    $request->photo->move(public_path('user images'), $photo);
                    $user->update([
                        'photo' => $photo
                    ]);
                    return back()->with('status', 'User Photo Uploaded Successfully');
                    break;
                
                case 'remove':
                    unlink(public_path('/user images/'.$user->photo));
                    $user->update([
                        'photo' => null
                    ]);
                    return back()->with('status', 'User Photo Removed Successfully');
                    break;
            }
        } else {
            return back()->with('error', 'Please choose a file before upload');
        }
    }

    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return back()->with('status', 'User Deactivated Successfully');
    }

    public function deactivated()
    {
        $users = User::onlyTrashed()->get();
        return view('users.deactivated', [
            'users' => $users
        ]);
    }

    public function restore($id)
    {
        $user = User::where('id', $id)->restore();
        return back()->with('status', 'User Restored Successfully');
    }
}
