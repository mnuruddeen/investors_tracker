<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Program;
use App\Models\Student;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view user',['only'=>['index']]);
        $this->middleware('permission:create user',['only'=>['create','store']]);
        $this->middleware('permission:update user',['only'=>['edit','update']]);
        $this->middleware('permission:delete user',['only'=>['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Users";
        $users = User::where('is_admin',1)->get();
        $roles = Role::pluck('name','name')->all();
        return view('user.index', compact('title','users','roles'));
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
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'mdas' => 'required',
            'roles' => 'required'
        ]);

        //dd($request->mdas);

        DB::transaction(function() use ($data, $request) {

            /*  CREATE THE USER  */
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'is_admin' => 1,
                'password' => Hash::make($request->password),
            ]);

            /*  CREATE ASSIGNED MDAs    */
            if($data['mdas'][0] == "all"){
                //dd("Executing All MDAs");
                $mdas = Mda::all();
                foreach($mdas As $mda){
                    $assigned_mdas = AssignedMda::create([
                        'user_id'=>$user->id,
                        'mda_id'=>$mda->id,
                    ]);
                }

            }else{
                //dd("Executing Else Block");
                foreach($data['mdas'] As $mda_id){
                    $assigned_mdas = AssignedMda::create([
                        'user_id'=>$user->id,
                        'mda_id'=>$mda_id,
                    ]);
                }

            }

            // All current roles will be removed from the user and replaced by the array given
            $user->syncRoles($request->roles);

        });

        return redirect('users')->with('success','User Added Successfully');


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
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'roles' => 'required',

        ]);

        $update = $user->update([
            'name'=>$request->name,
            'email' => $request->email,
        ]);
        // All current roles will be removed from the user and replaced by the array given
        $user->syncRoles($request->roles);

        if($update){
            return redirect()->back()->with('success','User Updated Successfully');
        }else{
            return redirect()->back()->with('error','Sorry Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail(decrypt($id));
        $user->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }

    //CHANGE PASSWORD
    public function change_password(){
        $title = "Change Password";
        return view('user.change_password',compact('title'));
    }
    public function change_password_save(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            // Current password and new password same
            return redirect()->back()->with("error","New Password cannot be same as your current password.");
        }

        $data = request()->validate([
            'current-password'=>'required',
            'new-password'=>'required|string|min:8|confirmed',
            'new-password_confirmation'=>'required',
        ]);

         //Change Password
        $user = Auth::user();
        $user->password = Hash::make($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success","Password successfully changed!");

    }

    //STUDENTS
    public function student(){
        $title = "View students";
        $schools = School::all();
        return view('user.student',compact('title','schools'));
    }  

    public function students(Request $request){

        $data = $request->validate([
            'school' => 'required',
            'department' => 'required',
            'program' => 'required',
            'level' => 'required',
        ]);

        $title = Program::where('id','=',$data['program'])->first();
        $title = $title->program ." Students";
        $students = Student::where('program_id','=',$data['program'])->where('current_level','=',$data['level'])->orderBy('fullname','ASC')->get();

        return view('user.students',compact('title','students'));
    }  
}
