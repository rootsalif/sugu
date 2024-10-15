<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;

class UserControler extends Controller
{

    public function userIndex(){
        $roles=Role::all();
        if(Auth::guard('admin')->check()){
            Auth::guard('admin')->logout();
            session(['key'=>'user']);
        }
        return view('back.pages.user.enterprise.login-user', compact('roles'));
    }
    /**
     * Display a listing of the resource.
     */
    public function login(Role $role)
    {
        return view('back.pages.user.auth.login', compact('role'));
    }


    // public function index()
    // {
    //     
    // }

    /** shos all user */
    public function index()
    {
        $users=User::all();
     
        return view('back.pages.admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $user=new User();
        return view('back.pages.admin.user.create', compact('user'));
    }

    public function store(UserRequest $request)
    {
        // Création du rôle
        $data=collect($request->all())->put('admin_id',Auth::guard('admin')->user()->id);
        $user=User::create($data->toArray());

        return response()->json([
            'message' => $user->name_user.'à été bien crée !',
            'data' => $user
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store_(Request $request, Role $role)
    {
        $admin=session()->has('key');
        $table=$admin?'admins':'users';
        $request->validate([
            'email'=>"required|email|exists:$table,email",
            'password'=>'required|min:8',
        ],[
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'email.exists'=>'Cet email n\'existe pas. veillez verifier',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'caractère minumum est 8',
        ]);       

        $credentials = $request->only('email', 'password'); 
 
        if (Auth::guard('user')->attempt($credentials) || Auth::guard('admin')->attempt($credentials)) {
            $user=Auth::guard('user')->user();
            $roles=$admin?[$role]:$user?->roles;
            $i=$admin?1:$roles->count();
            foreach($roles as $value){
                $i--;
                if($value->label_role === $role->label_role){
                    switch($role->label_role){
                        
                        case 'Dirigeant':
                            return view('back.pages.user.management.index', compact('role', 'user'));
                        case 'Comptable':
                            return view('back.pages.user.accounting.index', compact('role', 'user'));
                        case 'Caissier':
                            return view('back.pages.user.cashier.index', compact('role', 'user'));
                        case 'Gestionnaire':
                            return view('back.pages.user.manager.index', compact('role', 'user'));
                        case 'Magasinier':
                            return view('back.pages.user.storekeeper.index', compact('role', 'user'));
                        case 'Commandeur':
                            return view('back.pages.user.commander.index', compact('role', 'user'));
                        case 'Enregistreur':
                            return view('back.pages.user.recorder.index', compact('role', 'user'));
                        case 'Courssier':
                            return view('back.pages.user.steed.index', compact('role', 'user'));
                        case 'Client':
                            return view('back.pages.user.customer.index', compact('role', 'user'));

                        default : return redirect()->back()->with($role->label_role);

                    }

                    return redirect()->route('user.home');
                }else if($i===0){

                    return redirect()->back()->with('Vous n\'êtes pas incrit en tant que'.$role->label_role);
                } 

            }
            return redirect()->back()->with('Informer au sein de votre administrateur');            
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        if(session()->has('key')){
            session()->forget('key');
            return redirect()->route('admin.login');
        }
        return redirect()->route('user.role.enterprise.index');
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
    public function edit(User $user)
    {

        return view('back.pages.admin.user.create', compact('user'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('admin.user.index');      
    }

    public function delete(User $user){

        return view('back.pages.admin.user.delete', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $user=User::findOrfail($id);
        $user->delete();
        if($request->ajax()){
            return response()->json(['success'=>true]);
        }else{
            return redirect()->route('admin.user.index');
        }
    }
}
