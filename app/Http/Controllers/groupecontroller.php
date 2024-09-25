<?php

namespace App\Http\Controllers;

use App\Models\groupe;
use Illuminate\Http\Request;

class groupecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groupes=groupe::all();// équivalent de select * from groupes ;
        return view('back.groupe.index', compact('groupes'));// compact est la recup de la variable 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.groupe.add');
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
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_groupes ci dessous sont les name au niveau du formulaire add
            'nom_groupe'=>'required |string',
            'diminutif'=>'required |string',
            'description'=>'required |string',
        ]);

        $save = new groupe; // ici groupe est notre modèl
        $save->nom_groupe=$request -> nom_groupe;    // le 1er nom_groupe est celui de la table et le second pour le name du formulaire
        $save-> diminutif=$request -> diminutif;
        $save-> description=$request -> description;
        $save-> deletable=0;
        $save-> etat=0;
        
        
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"groupe enregistrer avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $groupes=groupe:: all()->where('id','=',$id)-> first();// équivalent de select * groupe where id =$id
        return view('back.groupe.fiche', compact('groupes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $groupes=groupe::findOrFail($id);
        if($groupes->etat==0)
        {
            $etat=1;
            $message='groupe activé';
        }
        elseif($groupes->etat==1)
        {
            $etat=0;
            $message='groupe désactivé';
        }
        $groupes->etat=$etat;
        $groupes-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $groupes=groupe::findOrfail($id);// équivalent de select * groupe where id =$id
        return view('back.groupe.edit', compact('groupes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedDate=$request->validate([
            // ici c'est pour les règle de gestion, les champs obligatoire. les nom_groupes ci dessous sont les name au niveau du formulaire add
            'nom_groupe'=>'required |string',
            'diminutif'=>'required |string',
            'description'=>'required |string',
        ]);

        $save = groupe::find($id); // ici groupe est notre modèl
        $save->nom_groupe=$request -> nom_groupe;    // le 1er nom_groupe est celui de la table et le second pour le name du formulaire
        $save-> diminutif=$request -> diminutif;
        $save-> description=$request -> description;
        

        $save-> save(); // enregistrement

        return BACK()->with('message',"groupe modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\groupe  $groupe
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $groupes=groupe::findOrFail($id);
        $groupes->delete();

        return BACK()->with('message',"groupe supprimer avec succes");
    }
}
