<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Session;
use Auth;
use Hash;

class AdminController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect('/admin/dashboard');
        }

        if($request->isMethod('POST'))
        {
            $data = $request->all();
            // echo "<pre>"; print_r($data);die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required',
            ];

            $customMessage = [
                'email.required' => 'Email is required.',
                'email.email' => 'A valid email is required.',
                'password.required' => 'Password is required.',
            ];

            $this->validate($request, $rules, $customMessage);

            if(Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']]))
            {
                $notification = array(
                    'message' => 'Login Successfully!',
                    'alert-type' => 'success',
                );
                return redirect()->route('adminDashboard')->with($notification);
            }else{
                // Session::flash('error_message','Invalid Email or Password!');
                
                $notification = array(
                    'message' => 'Invalid Email or Password!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        }
        return view('admin.auth.login');
    }

    // Admin Dashboard
    public function dashboard()
    {
        $metaTitle = "Deshboard | ".config('app.name');

        return view('admin.dashboard', compact('metaTitle'));
    }

    // Admin Profile
    public function profile()
    {
        $adminData = Auth::guard('admin')->user();

        $metaTitle = "Profile | ".config('app.name');

        return view('admin.profile.profile', compact('adminData','metaTitle'));
    }

    // Edit Admin profile
    public function editAdminProfile(Request $request)
    {
        $adminData = Auth::guard('admin')->user();
        // dd($adminData);

        if($request->isMethod('POST'))
        {
            $data = $request->except(['_token']);;
            // dd($data);

            Admin::where('id',Auth::guard('admin')->user()->id)->update($data);

            $notification = array(
                'message' => 'Profile updated successfully!',
                'alert-type' => 'success',
            );

            return redirect()->route('adminProfile')->with($notification);

        }

        $metaTitle = "Update Profile | ".config('app.name');

        return view('admin.profile.edit_profile', compact('adminData', 'metaTitle'));
    }

    // Change admin password
    public function changePassword(Request $request)
    {
        // dd(Auth::guard('admin')->user());

        if($request->isMethod('POST'))
        {
            $data = $request->all();
            // dd($data);
            if(Hash::check($data['currentPassword'], Auth::guard('admin')->user()->password))
            {
                // Check is newPassword and confirmPassword is matching
                if($data['newPassword'] == $data['confirmPassword'])
                {
                    Admin::where('id',Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['newPassword'])]);

                    $notification = array(
                        'message' => 'Password has been updated successfully!',
                        'alert-type' => 'success',
                    );
                    return redirect()->back()->with($notification);
                }else {
                    $notification = array(
                        'message' => 'New password and Confirm password did not match!',
                        'alert-type' => 'error',
                    );
                    return redirect()->back()->with($notification);
                }
            }else {
                $notification = array(
                    'message' => 'Your Current Password is incorrect!',
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        }

        $metaTitle = "Update Password | ".config('app.name');

        return view('admin.profile.update_password', compact('metaTitle'));
    }

    // Check Admin Password
    public function checkAdminPassword(Request $request)
    {
        $data = $request->all();

        // echo Auth::guard('admin')->user()->password; die;

        if(Hash::check($data['currentPassword'],Auth::guard('admin')->user()->password))
        {
            echo "true";
        }else {
            echo "false";
        }

    }

    // Admin Logout
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('adminLogin');
    }
}
