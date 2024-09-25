<?php

namespace App\Http\Controllers;

use Intervention\Image\Exception\NotReadableException;
use App\Models\Partenaire;
use App\Models\admin;
use Image;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Http\Request;

class Partenairecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins= admin::all();
        $Partenaires=Partenaire::all();// équivalent de select * from Partenaires ;
        return view('admin.Partenaire.index', compact('Partenaires','admins'));// compact est la recup de la variable 
    }

    public function getPartenairesEtat()
    {
        $Partenaires = Partenaire::where('etat', 1)->get();

        return $Partenaires;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $admins= admin::all();
        return view('admin.Partenaire.add', compact('admins'));
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
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_Partenaires ci dessous 
            //sont les name au niveau du formulaire add
            'nom_partenaire'=>'required |string',
            'mots_partenaire'=>'required |text',
            'admin_id'=>'required',
            'image'=>'required |image| mimes:jpeg,png,gif,svg,jpg| max:4048',
        ]);

        $save = new Partenaire; // ici Partenaire est notre modèl
        $save->nom_partenaire=$request -> nom_partenaire; 
        $save->mots_partenaire=$request -> mots_partenaire; 
        $save->admin_id=$request -> admin_id;
        
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'nom_partenaire_parte-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/Partenaire');
            $file->move($destinationPath, $filename);
            $save->image = $filename;
        } else {
            $save->image = '';
        }
        $save-> deletable=0;
        $save-> etat=0;
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"Partenaire enregistrer avec succes");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Partenaire  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Partenaires= Partenaire::all()->where('id','=',$id)-> first();;
        $admins=admin::all();
        return view('admin.Partenaire.fiche', compact('Partenaires','admins'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Partenaire  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $Partenaires=Partenaire::findOrFail($id);
        if($Partenaires->etat==0)
        {
            $etat=1;
            $message='Partenaire activé';
        }
        elseif($Partenaires->etat==1)
        {
            $etat=0;
            $message='Partenaire désactivé';
        }
        $Partenaires->etat=$etat;
        $Partenaires-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $Partenaires= Partenaire::findOrfail($id);
        $admins=admin::all();
        return view('admin.Partenaire.edit', compact('Partenaires','admins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Partenaire  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'nom_partenaire' => 'required|string',
            'mots_partenaire'=>'required |text',
            'image' => 'nullable|image|mimes:jpeg,png,gif,svg,jpg|max:2048',
        ]);

        $Partenaires = Partenaire::find($id);
        $Partenaires->mots_partenaire=$request -> mots_partenaire; 
        $Partenaires->nom_partenaire = $request->nom_partenaire;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'nom_partenaire_parte-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/Partenaire');
            $file->move($destinationPath, $filename);
            $Partenaires->image = $filename;
        }

        $Partenaires->save();

        return back()->with('message', "Partenaire modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Partenaire  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Partenaires=Partenaire::findOrFail($id);
        $Partenaires->delete();

        return BACK()->with('message',"Module supprimer avec succes");
    }
}
