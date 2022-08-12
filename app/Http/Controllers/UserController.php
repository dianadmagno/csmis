<?php

namespace App\Http\Controllers;

use App\Models\User;
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
    public function index(User $model)
    {
        return view('users.index', [
            'users' => $model->paginate(10)
        ]);
    }

    public function edit($id)
    {
        return view('profile.edit', [
            'user' => User::find($id)
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
        switch ($request->input('action')) {
            case 'upload':
                $user = User::find($id);
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
                $user = User::find($id);
                unlink(public_path('/user images/'.$user->photo));
                $user->update([
                    'photo' => null
                ]);
                return back()->with('status', 'User Photo Removed Successfully');
                break;
        }
    }
}
