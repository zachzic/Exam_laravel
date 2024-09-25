<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\groupe;
use App\Models\attribution;
use Illuminate\Http\Request;

class attributioncontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributions=attribution::all();// équivalent de select * from attributions ;
        $groupes= groupe::all();
        $users= User::all();
        return view('back.attribution.index', compact('attributions','users','groupes'));// compact est la recup de la variable
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groupes= groupe::all();
        $users= User::all();
        return view('back.attribution.add', compact('users','groupes'));

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
            // ici c'est pour les règle de gestion, les champs obligatoire. les id_users ci dessous sont les name au niveau du formulaire add
            'id_user'=>'required |integer',
            'id_groupe'=>'required |integer',
        ]);

        $save = new attribution; // ici attribution est notre modèl
        $save->User_id=$request -> id_user;    // le 1er id_user est celui de la table et le second pour le name du formulaire
        $save-> Groupe_id=$request -> id_groupe;
        $save-> deletable=0;
        $save-> etat=0;
        
        
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"attribution enregistrer avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attributions=attribution:: all()->where('id','=',$id)-> first();// équivalent de select * attribution where id =$id
        return view('back.attribution.fiche', compact('attributions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $attributions=attribution::findOrFail($id);
        if($attributions->etat==0)
        {
            $etat=1;
            $message='attribution activé';
        }
        elseif($attributions->etat==1)
        {
            $etat=0;
            $message='attribution désactivé';
        }
        $attributions->etat=$etat;
        $attributions-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $attributions=attribution::findOrfail($id);// équivalent de select * attribution where id =$id
        $groupes= groupe::all();
        $users= User::all();
        return view('back.attribution.edit', compact('attributions','users','groupes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedDate=$request->validate([
            // ici c'est pour les règle de gestion, les champs obligatoire. les id_users ci dessous sont les name au niveau du formulaire add
            'id_user'=>'required |integer',
            'id_groupe'=>'required |integer',
        ]);

        $save = attribution::find($id); // ici attribution est notre modèl
        $save->User_id=$request -> id_user;    // le 1er id_user est celui de la table et le second pour le name du formulaire
        $save-> Groupe_id=$request -> id_groupe;

        $save-> save(); // enregistrement

        return BACK()->with('message',"attribution modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\attribution  $attribution
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributions=attribution::findOrFail($id);
        $attributions->delete();

        return BACK()->with('message',"attribution supprimer avec succes");
    }
}
