<?php

namespace App\Http\Controllers;

use Intervention\Image\Exception\NotReadableException;
use App\Models\Temoignage;
use App\Models\admin;
use Image;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Http\Request;

class Temoignagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins= admin::all();
        $Temoignages=Temoignage::all();// équivalent de select * from Temoignages ;
        return view('admin.Temoignage.index', compact('Temoignages','admins'));// compact est la recup de la variable 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins= admin::all();
        return view('admin.Temoignage.add', compact('admins'));
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
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_Temoignages ci dessous 
            //sont les name au niveau du formulaire add
            'titre'=>'required |string',
            'entreprise'=>'required |string',
            'detail'=>'required |string',
            'post'=>'required |string',
            'image'=>'required |image| mimes:jpeg,png,gif,svg,jpg| max:2048',
        ]);

        $save = new Temoignage; // ici Temoignage est notre modèl
        $save->titre=$request -> titre; 
        $save->admin_id=$request -> admin_id;
        $save-> entreprise= $request->entreprise;   // le 1er nom_Temoignage est celui de la table et le second pour le name du formulaire
        $save-> detail=$request -> detail;
        $save-> post=$request -> post;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'courslaravel_temoi-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/Temoignage');
            $file->move($destinationPath, $filename);
            $save->image = $filename;
        } else {
            $save->image = '';
        }
        $save-> deletable=0;
        $save-> etat=0;
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"Temoignage enregistrer avec succes");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Temoignages= Temoignage::all()->where('id','=',$id)-> first();;
        $admins=admin::all();
        return view('admin.Temoignage.fiche', compact('Temoignages','admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $Temoignages=Temoignage::findOrFail($id);
        if($Temoignages->etat==0)
        {
            $etat=1;
            $message='Temoignage activé';
        }
        elseif($Temoignages->etat==1)
        {
            $etat=0;
            $message='Temoignage désactivé';
        }
        $Temoignages->etat=$etat;
        $Temoignages-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $Temoignages= Temoignage::findOrfail($id);
        $admins=admin::all();
        return view('admin.Temoignage.edit', compact('Temoignages','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $validatedDate=$request->validate([
        //     // ici c'est pour les règle de gestion, les champs obligatoire. les nom_Temoignages ci dessous sont les name au niveau du formulaire add
        //     'titre'=>'required |string',
        //     'entreprise'=>'required |string',
        //     'detail'=>'required |string',
        //     'post'=>'required |string',
        //     'image'=>'required |image| mimes:jpeg,png,gif,svg,jpg| max:2048',
        // ]);

        // $save = Temoignage::find($id); // ici Temoignage est notre modèl
        // $save->titre = $request -> titre; 
        // $save->admin_id = $request -> admin_id;
        // $save-> entreprise = $request-> entreprise;   // le 1er nom_Temoignage est celui de la table et le second pour le name du formulaire
        // $save-> detail = $request -> detail;
        // $save-> post = $request -> post;
        // if ($request->hasFile('image')) 
        // {
        //     $file = $request->file('image');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = 'courslaravel_temoi-' . time() . '.' . $extension;
        //     $destinationPath = public_path('/upload/Temoignage');
        //     $file->move($destinationPath, $filename);
        //     $save->image = $filename;
        // } else {
        //     $save->image = '';
        // }

        // $save-> save(); // enregistrement

        // return BACK()->with('message',"Temoignage modifier avec succes");
        //public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'titre' => 'required|string',
                'entreprise' => 'required|string',
                'detail' => 'required|string',
                'post' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,gif,svg,jpg|max:2048',
            ]);
    
            $temoignage = Temoignage::find($id);
            $temoignage->titre = $request->titre;
            $temoignage->entreprise = $request->entreprise;
            $temoignage->detail = $request->detail;
            $temoignage->post = $request->post;
    
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'courslaravel_temoi-' . time() . '.' . $extension;
                $destinationPath = public_path('/upload/Temoignage');
                $file->move($destinationPath, $filename);
                $temoignage->image = $filename;
            }
    
            $temoignage->save();
    
            return back()->with('message', "Temoignage modifié avec succès");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Temoignage  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Temoignages=Temoignage::findOrFail($id);
        $Temoignages->delete();

        return BACK()->with('message',"Module supprimer avec succes");
    }
}
