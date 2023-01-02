<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render("Admin/layout/AdminLayout");
    }


    public function myProfilePage(){

        $id =auth()->user()->id;//this is id is so important// this id is get from user

      $data =  User::where('id',$id)->first();



        return Inertia::render("Admin/AdminPage",[
            'data'=>$data
        ]);
    }

    public function passwordPage($id){

        $password_data =User::where("id",$id)->first();

        $getOldPassword =$password_data->password;

        return Inertia::render("Admin/passwordPage",[
            "password"=>$getOldPassword,
            'user_data' =>$password_data
        ]);
    }


    public function updatePassword($id ,Request $request)
    {

        $request->validate([
            'newPassword'=>['required','min:6'],
            'oldPassword'=>['required','min:6']
        ]);

        $userPassword =User::where("id",$id)->first();

        $getOldPassword =$userPassword->password;


        $newPassword =$request->newPassword;
        $oldPassword =$request->oldPassword;

        $hashPassword =password_hash($newPassword,PASSWORD_BCRYPT);


         if(strlen($oldPassword) >= 6 && strlen($newPassword) >=6)
           {
            if(password_verify($oldPassword,$getOldPassword))
            {
                if(password_verify($newPassword,$hashPassword))
                {
                  User::where("id",$id)->update([
                    'password'=>$hashPassword
                  ]);
                 return redirect()->route('admin#myProfilePage')->with("passwordUpdateSuccess","Your password updated successfully!");
                }
                else
                {
                   return back()->with('wrong',"Do not match our recorded.Try again!");
                }
            }
            else
            {
                return back()->with('notSame',"You old password is do not match our recorded.Try again!");
            }
           }
           else
           {
                dd("your password need to 6 character more than!");
           }




    }


    public function categoryPage(){
        return Inertia::render('Admin/CategoryPage');
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
