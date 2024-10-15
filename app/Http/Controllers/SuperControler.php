<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Enterprise;
use App\Models\Familie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\arrayHasKey;

class SuperControler extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('back.pages.super.auth.login');
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required|email|exists:superadmins,email',
            'password'=>'required|min:8',
        ],[
            'email.required'=>'Ce champ est requis',
            'email.email'=>'Email non valide',
            'email.exists'=>'Cet email n\'existe pas. veillez verifier',
            'password.required'=>'Ce champ est requis',
            'password.min'=>'caractère minumum est 8',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::guard('superadmin')->attempt($credentials)) {
            return redirect()->route('super.home');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('super.login');
    }
        /**
     * Show the form for creating a new resource.
     */
    public function add()
    {

        $admins=Admin::where('status_admin', '!=','desable')->get();

        return view('back.pages.super.admin.index', compact('admins'));
    }

    public function adminCreate(){
        $admin= new Admin();
        $families= Familie::all();
        $familySelected=$families->pluck('label_family', 'id');
        
        return view('back.pages.super.admin.create', compact('admin', 'familySelected'));
    }


    public function adminStore(AdminRequest $request){
        $admin = new Admin();
        $enterprise = new Enterprise();
        $data = $request->all();
    
        // Function Perso
        $data = $this->store_($admin, $enterprise, $data, $request);
      
        // Hashing the password before storing
        $data['password'] = Hash::make($request->password);
    
        // Creating admin and enterprise records
        $data['admin']['superadmin_id']=Auth::guard('superadmin')->user()->id;
       
        $dbAdmin=$admin->create($data['admin']);
        $data['enterprise']['admin_id']=$dbAdmin->id;
       
        $enterprise->create($data['enterprise']);
    
        return redirect()->route('super.add')->with('success', $admin->name_admin . ' a été bien créé!');
    }
    
    // Function de gestion administrateur et son entreprise
    public function store_(Admin $admin, Enterprise $enterprise, $data, AdminRequest $request){
        foreach($data as $key => $d){
            if(in_array($key, $admin->getFillable())){
                if($key==='path_admin'){
                    if($data->hasFile($key)){
                        $data['admin'][$key] = $this->image_($admin, $enterprise,$key, $data, $request, 'profil');

                    }else{
                        $data['admin'][$key] = $admin->key;
                    }

                }else{
                    $data['admin'][$key] = $d;
                }                
            } else if(in_array($key, $enterprise->getFillable())){
                if($key === 'logo_enterprise' || $key === 'font_path_enterprise'){
                    $data['enterprise'][$key] = $this->image_($admin, $enterprise, $key, $data, $request, 'enterprise');
                
                }else{
                    $data['enterprise'][$key] = $d;
                }
            }
        }
        return $data;
    }
    
    // Function sur la gestion des images
    private function image_(Admin $admin, Enterprise $enterprise, string $key, array $data, AdminRequest $request, string $dir){
        if($request->hasFile($key)){    
 
            $image = $request->file($key);

            if($image && !$image->getError()){
                // Contrainte de modification d'image
               
                if($enterprise->$key){
                    Storage::disk('public')->delete($enterprise->$key);
                
                }    
                if($admin->$key){
                    Storage::disk('public')->delete($admin->$key);                   

                }    
                $data[$key] = $image->store($dir, 'public');

            }
        }
        return $data[$key];
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
    public function adminEdit(Admin $admin)
    {
        $families= Familie::all();
        $familySelected=$families->pluck('label_family', 'id');
        return view('back.pages.super.admin.create', compact('admin', 'familySelected'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function adminUpdate(AdminRequest $request, Admin $admin)
    {        
        $data=$request->all();

        $enterprise=$admin->enterprise;        
       
        // Function Perso
        $data = $this->store_($admin, $enterprise, $data, $request);

        // Hashing the password before storing
        $data['password'] = Hash::make($request->password);
        $admin->update($data['admin']);
        $enterprise->update($data['enterprise']);          

        return redirect()->route('super.add')->with('success', $admin->name_admin.' à été bien modifier!');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function adminDelete(Admin $admin)
     {

        return view('back.pages.super.admin.delete', compact('admin'));
     }

    public function adminDestroy(Admin $admin)
    {
        $admin->status_admin='desable';
        $admin->save();
        return redirect()->route('super.add')->with('success', $admin->name_admin.' à été bien supprimer!');
    }
}
