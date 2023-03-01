<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','DESC')->get();
        return view('backend.pages.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('backend.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'email'=>'required|unique:users,email,except,id',
            'phone'=>'required',
            'status'=>'required',
            'dob'=>'required',
            'address'=>'required|max:255',
            'image'=>'required',
        ]);
        if($validate->fails()){
            Alert::error('User Created failed');
            return back()->withErrors($validate->errors())->withInput();
        }
        $image_name = null;
        if ($request->hasFile('image')) {
            $image_name = date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/users', $image_name);
        }
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>$request->role_id,
            'username'=>str_replace('','_',$request->name),
            'status'=>$request->status,
            'dob'=>$request->dob,
            'address'=>$request->address,
            // 'password'=>bcrypt(Str::random(8)),
            'password'=>bcrypt('password'),
            'image'=>$image_name,
        ]);
        Alert::success('User Created Success');
        return to_route('backend.user.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.pages.user.edit',[
            'user'=>User::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $image_name = $user->image;
        $validate = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'email'=>'required',
            'phone'=>'required',
            'status'=>'required',
            'dob'=>'required',
            'address'=>'required|max:255',
        ]);
        if($validate->fails()){
            return back()->withErrors($validate->errors())->withInput();
        }
        if ($request->hasFile('image')) {
            $image_name = date('Ymdhsis').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads/doctors', $image_name);
        }
        if(request()->has('password')){
            $password = bcrypt($request->password);
        }else{
            $password = $user->password;
        }
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>$request->role_id,
            'username'=>str_replace('','_',$request->name),
            'status'=>$request->status,
            'dob'=>$request->dob,
            'address'=>$request->address,
            'password'=>$password,
            'image'=>$image_name,
        ]);
        Alert::success('User Updated Success');
        return to_route('backend.user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        Alert::success('User Deleted Success');
        return to_route('backend.user.index');
    }
}