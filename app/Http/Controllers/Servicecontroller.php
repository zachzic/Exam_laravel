<?php

namespace App\Http\Controllers;

use Intervention\Image\Exception\NotReadableException;
use App\Models\Service;
use Image;
use PhpParser\Node\Stmt\Else_;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; //création de fichier


class Servicecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Services=Service::all();// équivalent de select * from Services ;
        
        return view('admin.Service.index', compact('Services'));// compact est la recup de la variable 
       
    }

    public function getServicesEtat1()
    {
        $services = Service::where('etat', 1)->get();

        return $services;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Service.add');
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
            'nom_service' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,gif,svg,jpg|max:4048',
        ]);

        $save = new Service; // ici Service est notre modèl
        $save->nom_service=$request -> nom_service; ;
        $save->description=$request -> description;
        $save->url="/adepme/page".$request ->nom_service;
        
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = 'nom_Service-' . time() . '.' . $extension;
            $destinationPath = public_path('/upload/Service');
            $file->move($destinationPath, $filename);
            $save->image = $filename;
        } else {
            $save->image = '';
        }
        $save-> deletable=0;
        $save-> etat=0;
        
        $save-> save(); // enregistrement
         // Créer le fichier .blade.php correspondant
       /*  $filename = $save->nom_service . '.blade.php';
        $fileContent =@include("adepme/page/Entete");
        $filePath = public_path('/adepme/page/' . $filename);
        File::put($filePath, $fileContent); */
        
        return BACK()->with('message',"Service enregistrer avec succes");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Services= Service::all()->where('id','=',$id)-> first();;
        
        return view('admin.Service.fiche', compact('Services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function state($id)
    {
        $Services=Service::findOrFail($id);
        if($Services->etat==0)
        {
            $etat=1;
            $message='Service activé';
        }
        elseif($Services->etat==1)
        {
            $etat=0;
            $message='Service désactivé';
        }
        $Services->etat=$etat;
        $Services-> save();
        return BACK()->with('message',$message);
    }
    public function edit($id)
    {
        $Services= Service::findOrfail($id);
        return view('admin.Service.edit', compact('Services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        {
            $validatedData = $request->validate([
                'nom_service' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,gif,svg,jpg|max:2048',
            ]);
    
            $Services = Service::find($id);
            $Services->nom_service = $request->nom_service;
        $Services->url="/adepme/page".$request ->nom_service;
        $Services->description=$request -> description;
            
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $extension = $file->getClientOriginalExtension();
                $filename = 'nom_Service-' . time() . '.' . $extension;
                $destinationPath = public_path('/upload/Service');
                $file->move($destinationPath, $filename);
                $Services->image = $filename;
            }
    
            $Services->save();
            
            return back()->with('message', "Service modifié avec succès");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $temoignage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Services=Service::findOrFail($id);
        $Services->delete();

        return BACK()->with('message',"Module supprimer avec succes");
    }
}
