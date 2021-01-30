<?php

namespace App\Http\Controllers;

//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Hash;
//use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {

        /**
         * fetching the user model
         **/
        $user = Auth::user();
        //var_dump($user);

        /**
         * Passing the user data to profile view
         */
        return view('old-layouts.profile', compact('user'));
    }

    public function update(Request $request)
    {
        /**
         * fetching the user model
         */
        $user = Auth::user();


        /**
         * Validate request/input 
         **/
        $this->validate($request, [
            'name' => 'required|max:255|unique:users,name,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
        ]);

        /**
         * storing the input fields name & email in variable $input
         * type array
         **/
        $input = $request->only('name', 'email');



        /**
         * Accessing the update method and passing in $input array of data
         **/
        $user->update($input);

        /**
         * after everything is done return them pack to /profile/ uri
         **/
        return back();
    }

    // public function admin_credential_rules(array $data)
    // {
    //     $messages = [
    //         'current-password.required' => 'Please enter current password',
    //         'password.required' => 'Please enter password',
    //     ];

    //     $validator = Validator::make($data, [
    //         'current-password' => 'required',
    //         'password' => 'required|same:password',
    //         'password_confirmation' => 'required|same:password',
    //     ], $messages);

    //     return $validator;
    // }

    // public function postCredentials(Request $request)
    // {
    //     if (Auth::Check()) {
    //         $request_data = $request->All();
    //         $validator = $this->admin_credential_rules($request_data);
    //         if ($validator->fails()) {
    //             return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
    //         } else {
    //             $current_password = Auth::User()->password;
    //             if (Hash::check($request_data['current-password'], $current_password)) {
    //                 $user_id = Auth::User()->id;
    //                 $obj_user = User::find($user_id);
    //                 $obj_user->password = Hash::make($request_data['password']);
    //                 $obj_user->save();
    //                 return "ok";
    //             } else {
    //                 $error = array('current-password' => 'Please enter correct current password');
    //                 return response()->json(array('error' => $error), 400);
    //             }
    //         }
    //     } else {
    //         return redirect()->to('old-layouts.profile');
    //     }
    // }
}
