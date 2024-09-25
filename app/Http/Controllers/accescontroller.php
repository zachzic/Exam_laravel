<?php

namespace App\Http\Controllers;
use App\Models\module;
use App\Models\groupe;
use App\Models\acces;
use Illuminate\Http\Request;

class accescontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $access=acces::all();// équivalent de select * from access ;
        $modules= module::all();
        $groupes= groupe::all();
        return view('back.acces.index', compact('access','groupes','modules'));// compact est la recup de la variable
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modules= module::all();
        $groupes= groupe::all();
        return view('back.acces.add', compact('groupes','modules'));
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
            // ici c'est pour les règle de gestion, les champs obligatoire. les groupe_ids ci dessous sont les name au niveau du formulaire add
            'id_groupe'=>'required |integer',
            'id_module'=>'required |integer',
        ]);

        $save = new acces; // ici acces est notre modèl
        $save->groupe_id=$request -> id_groupe;    // le 1er groupe_id est celui de la table et le second pour le name du formulaire
        $save-> module_id=$request -> id_module;
        $save-> deletable=0;
        $save-> etat=0;
        
        
        
        $save-> save(); // enregistrement

        return BACK()->with('message',"acces enregistrer avec succes");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $access=acces:: all()->where('id','=',$id)-> first();// équivalent de select * acces where id =$id
        $modules= module::all();
        $groupes= groupe::all();
        return view('back.acces.fiche', compact('access','modules','groupes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $access=acces::findOrFail($id);
        if($access->etat==0)
        {
            $etat=1;
            $message='acces activé';
        }
        elseif($access->etat==1)
        {
            $etat=0;
            $message='acces désactivé';
        }
        $access->etat=$etat;
        $access-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $access=acces::findOrfail($id);// équivalent de select * acces where id =$id
        $modules= module::all();
        $groupes= groupe::all();
        return view('back.acces.edit', compact('access','groupes','modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedDate=$request->validate([
            // ici c'est pour les règle de gestion, les champs obligatoire. les groupe_ids ci dessous sont les name au niveau du formulaire add
            'groupe_id'=>'required |integer',
            'module_id'=>'required |integer',
        ]);

        $save = acces::find($id); // ici acces est notre modèl
        $save->groupe_id=$request -> groupe_id;    // le 1er groupe_id est celui de la table et le second pour le name du formulaire
        $save-> module_id=$request -> module_id;

        $save-> save(); // enregistrement

        return BACK()->with('message',"acces modifier avec succes");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\acces  $acces
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $access=acces::findOrFail($id);
        $access->delete();

        return BACK()->with('message',"acces supprimer avec succes");
    }
}
