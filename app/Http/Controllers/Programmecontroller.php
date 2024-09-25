<?php

namespace App\Http\Controllers;

use Intervention\Image\Exception\NotReadableException;
use App\Models\Programme;
use App\Models\Partenaire;
use Image;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Http\Request;

class Programmecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Partenaires= Partenaire::all();
        $Programmes=Programme::all();// équivalent de select * from Programmes ;
        
        return view('admin.Programme.index', compact('Programmes','Partenaires'));// compact est la recup de la variable 
        return view('admin.index', compact('countProgrammes'));// compact est la recup de la variable 
    }

    public function getProgrammesEtat1()
    {
        $programmes = Programme::where('etat', 1)->get();

        return $programmes;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Partenaires= Partenaire::all();
        return view('admin.Programme.add', compact('Partenaires'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_programme' => 'required|string',
            
            'partenaire_ids.*' => 'exists:partenaires,id',
            'image' => 'required|image|mimes:jpeg,png,gif,svg,jpg|max:4048',
        ]);

        $save = new Programme; // ici Programme est notre modèl
        $save->nom_programme=$request -> nom_programme; 
        $save->Partenaire_id=$request -> Partenaire_ids;
        $save->description=$request -> description;
        
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'nom_programme-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/Programme');
            $file->move($destinationPath, $filename);
            $save->image = $filename;
        } else {
            $save->image = '';
        }
        $save-> deletable=0;
        $save-> etat=0;
        
        $save-> save(); // enregistrement

        // Enregistrer les associations programme-partenaire dans la table programme_partenaire
        $save->partenaire()->attach($request->partenaire_ids);
        return BACK()->with('message',"Programme enregistrer avec succes");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Programme  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Programmes= Programme::all()->where('id','=',$id)-> first();;
        $Partenaires=Partenaire::all();
        
        return view('admin.Programme.fiche', compact('Programmes','Partenaires'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Programme  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $Programmes=Programme::findOrFail($id);
        if($Programmes->etat==0)
        {
            $etat=1;
            $message='Programme activé';
        }
        elseif($Programmes->etat==1)
        {
            $etat=0;
            $message='Programme désactivé';
        }
        $Programmes->etat=$etat;
        $Programmes-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $Programmes= Programme::findOrfail($id);
        $Partenaires=Partenaire::all();
        return view('admin.Programme.edit', compact('Programmes','Partenaires'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Programme  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        {
            $validatedData = $request->validate([
                'nom_programme' => 'required|string',
                'partenaire_ids.*' => 'exists:partenaires,id',
                'image' => 'nullable|image|mimes:jpeg,png,gif,svg,jpg|max:2048',
            ]);
    
            $Programmes = Programme::find($id);
            $Programmes->nom_programme = $request->nom_programme;
            $Programmes->Partenaire_id=$request -> Partenaire_ids;
            $Programmes->description=$request -> description;
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'nom_programme-' . time() . '.' . $extension;
                $destinationPath = public_path('/upload/Programme');
                $file->move($destinationPath, $filename);
                $Programmes->image = $filename;
            }
    
            $Programmes->save();
            // Enregistrer les associations programme-partenaire dans la table programme_partenaire
            $Programmes->partenaire()->attach($request->partenaire_ids);
            return back()->with('message', "Programme modifié avec succès");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Programme  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Programmes=Programme::findOrFail($id);
        $Programmes->delete();

        return BACK()->with('message',"Module supprimer avec succes");
    }
}
