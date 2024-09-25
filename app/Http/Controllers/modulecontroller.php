<?php

namespace App\Http\Controllers;

use App\Models\module;
use Intervention\Image\Exception\NotReadableException;
use Image;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Support\Facades\Artisan;

class modulecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules=module::all();// équivalent de select * from modules ;
        return view('admin.module.index', compact('modules'));// compact est la recup de la variable 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.module.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedDate=$request->validate([
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_modules ci dessous 
            //sont les name au niveau du formulaire add
            'nom_module'=>'required |string',
            'diminutif'=>'required |string',
            'detail'=>'required |string',
            'image'=>'required |image| mimes:jpeg,png,gif,svg,jpg| max:2048',
        ]);

        $save = new module; // ici module est notre modèl
        $save->nom_module=$request -> nom_module; 
        $nom_module=$request->nom_module;   // le 1er nom_module est celui de la table et le second pour le name du formulaire
        $save-> diminutif=$request -> diminutif;
        $save-> detail=$request -> detail;
        $save->url="/admin/".$request ->nom_module;
        
        // if($request->hasfile('image'))
        // {
        //     $file=$request->file('image');
        //     $extension=$file->getClientOriginalExtension(); //recup de l'extension du fichier
        //     $filename='courslaravel-'.time().'.'.$extension;
        //     $destinationpath=public_path('/upload/module');//destination des imgs dans le dossier public
        //     $resize_image=Image::make($file->getRealPath());
        //     $resize_image->resize(900,500)->save($destinationpath.'/'.$filename);
        //     $destinationpath=$request->file('image')->store('/upload/module');
        //     $save->image=$filename;
        // }
        // Else
        // {
        //     $save->image='';
        // }
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'courslaravel-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/module');
            $file->move($destinationPath, $filename);
            $save->image = $filename;
        } else {
            $save->image = '';
        }
        $save-> deletable=0;
        $save-> etat=0;
        Artisan::call("make:model {$nom_module} -m");
        Artisan::call("make:controller {$nom_module}controller --model {$nom_module} --resource");
        echo "Modèle et contrôleur créés avec succès !";
        
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"module enregistrer avec succes");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modules=module:: all()->where('id','=',$id)-> first();// équivalent de select * module where id =$id
        return view('admin.module.fiche', compact('modules'));
    }

    public function state($id)
    {
        $modules=Module::findOrFail($id);
        if($modules->etat==0)
        {
            $etat=1;
            $message='module activé';
        }
        elseif($modules->etat==1)
        {
            $etat=0;
            $message='module désactivé';
        }
        $modules->etat=$etat;
        $modules-> save();
        return BACK()->with('message',$message);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modules=module::findOrfail($id);// équivalent de select * module where id =$id
        return view('admin.module.edit', compact('modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $validatedDate=$request->validate([
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_modules ci dessous sont les name au niveau du formulaire add
            'nom_module'=>'required |string',
            'diminutif'=>'required |string',
            'detail'=>'required |string',
        ]);

        $save = module::find($id); // ici module est notre modèl
        $save->nom_module=$request -> nom_module;    // le 1er nom_module est celui de la table et le second pour le name du formulaire
        $save-> diminutif=$request -> diminutif;
        $save-> detail=$request -> detail;
        $save->url="/admin/".$request ->nom_module;
        

        $save-> save(); // enregistrement

        return BACK()->with('message',"Module modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\module  $module
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modules=module::findOrFail($id);
        $modules->delete();

        return BACK()->with('message',"Module supprimer avec succes");
    }
}
