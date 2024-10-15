<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleControler extends Controller
{
       
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles=Role::all();
                
        return view('back.pages.super.role.index', compact('roles'));
    }

    // Role of user in admin

    public function userRole(){

        $roles=Role::all();
        $users=User::has('roles','>=',1)->get();

        return view('back.pages.admin.role.index', compact('roles', 'users'));
    }

    public function userShow(User $user){
        $roles=$user->roles;

        return view('back.pages.admin.role.show', compact('roles', 'user'));
    }

    public function addRole(Role $role){
        $admin_id=Auth::guard('admin')->user()->id;
        $data=User::where('admin_id', $admin_id);

        $users=$role->users()->where('admin_id', $admin_id)->get();
        
        $userSelected=$data->pluck('name_user', 'id');  

        return view('back.pages.admin.role.add', compact('users', 'role', 'userSelected'));
    }

    public function storeRole(Request $request, Role $role){
        
        $request->validate([
            'user_id'=>'required',
        ],[
            'user_id.required'=>'Ce champ est requis',
        ]);

        $user=User::find($request->user_id);

        $user->roles()->attach($role->id);
        
        return redirect()->back()->with('Utilisateur à été bien associer sur '.$role->label_role);
    }
    public function dettach(Role $role,User $user){      

        return view('back.pages.admin.role.delete', compact('role','user'));

    }
    public function storeDettach(Role $role, User $user){

        $user->roles()->detach($role->id);

        return redirect()->route('admin.user.add.role',['role'=>$role]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role= new Role();
        return view('back.pages.super.role.create', compact('role'));
    }

    // Checking data in base

    public function checkData(Request $request){

      
        // $label = $request->query('label_role');
        // $exists = Role::where('label_role', $label)->exists();
        
        // return response()->json($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    { 

        // Validation des données
        $request->validate([
            'label_role' => 'required|string|max:255|unique:roles,label_role',
            'describ_role' => 'required|string|max:255',
            'path_role' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Création du rôle
        $role = new Role();
        $role->label_role = $request->input('label_role');
        $role->describ_role = $request->input('describ_role');

        // Gestion du fichier uploadé
        if ($request->hasFile('path_role')) {
            $path = $request->file('path_role')->store('roles', 'public');
            $role->path_role = $path;
        }

        $role->save();

        return response()->json([
            'message' => 'Role created successfully!',
            'role' => $role
        ]);
        
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
    public function edit(Role $role)
    {
        
        return view('back.pages.super.role.create', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Validation des données
        $request->validate([
            'label_role' => 'required|string|max:255',
            'describ_role' => 'required|string|max:255',
            'path_role' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Mise à jour du rôle
        $role->label_role = $request->input('label_role');
        $role->describ_role = $request->input('describ_role');

        // Gestion du fichier uploadé
        if ($request->hasFile('path_role')) {
            $path = $request->file('path_role')->store('roles', 'public');
            $role->path_role = $path;
        }

        $role->save();

        return response()->json([
            'message' => 'Role updated successfully!',
            'role' => $role
        ]);
    
    }

    public function delete(Role $role){

        return view('back.pages.super.role.delete', compact('role'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        
        return redirect()->route('super.role.index')->with('success', "Fonctionalité à été bien suprimer");
    }
}
