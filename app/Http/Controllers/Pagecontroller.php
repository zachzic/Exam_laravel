<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\admin;
use App\Models\Partenaire;
use App\Models\Programme;
use App\Models\Service;
use Illuminate\Http\Request;

class Pagecontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirection_service($id)
    {
         $Services= Service::find($id);
        /*$Pages=Page::all();// équivalent de select * from Pages ; */
        return view('adepme.page.page_service',compact('Services'));// compact est la recup de la variable 
    }


    public function redirection_partenaire()
    {
        $partenaires= Partenaire::where('etat', 1)->get();
        /*$Pages=Page::all();// équivalent de select * from Pages ; */
        return view('adepme.page.page_partenaire',compact('partenaires'));// compact est la recup de la variable 
    }


    public function redirection_part_detail($id)
    {
        $partenaires= Partenaire::find($id);
        /*$Pages=Page::all();// équivalent de select * from Pages ; */
        return view('adepme.page.page_partenaire_detail',compact('partenaires'));// compact est la recup de la variable 
    }



    public function redirection_programme($id)
    {
        $programmes= Programme::find($id);
        /*$Pages=Page::all();// équivalent de select * from Pages ; */
        return view('adepme.page.page_programme',compact('programmes'));// compact est la recup de la variable 
    }



    public function redirection_contact()
    {
        return view('adepme.page.page_contact');// compact est la recup de la variable 
    }



    public function redirection_mots_directeur()
    {
        return view('adepme.page.page_mots_directeur');// compact est la recup de la variable 
    }



    
    public function redirection_chef_etat()
    {
        return view('adepme/page/page_chef_etat');// compact est la recup de la variable 
    }
    
}
