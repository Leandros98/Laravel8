<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Categorie;
use App\Models\Pays;
use Symfony\Contracts\Service\Attribute\Required;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('welcome', compact('contacts'));

    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Categorie::all();
        $pays=Pays::all();
        return view('contacts.create',compact('pays','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $test=Contact::where('telephone',$request->telephone)->where('pays_id',$request->pays_id)->get();
    
        if($test->count()>0){
            return redirect('createContact')->with('erreur', 'ce numero a deja inscrit.');

        }else{
            $request->validate(['categorie_id=>required:contacts','categorie_id','pays_id=>required:contacts','pays_id','nom=>required:contacts','nom','prenom=> required:contacts','prenom','email=>required:contacts,email','telephone=>required:contacts,telephone','adresse=>required:contacts,adresse','anniversaire=>required:contacts,anniversaire','entreprise=> required:contacts,entreprise','fonction=>required:contacts,fonction','fonction','service=>required:contacts,service','service','titre=>required:contacts,titre','site_web=>required:contacts,site_web','reseaux_sociaux=>required:contacts,reseau_sociaux','note=>required:contacts,note','titre=>required:contacts,titre','favori']);
            $contact = Contact::create($request->all([ 'categorie_id','pays_id','nom','prenom','email','telephone','adresse','anniversaire','entreprise','fonction','service','titre','site_web','reseau_sociaux','note','favori']));
            $contacts = Contact::all();
            return view('welcome',compact('contacts'));
        }}

            

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {     $categories=Categorie::all();
          $pays=Pays::all();
          $editData =Contact::find($id);
        return view('contacts.edit', compact('pays','categories','editData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function contactupdate(Request $request, $id)
    {
        $data=Contact::find($id);
        $validateData=  $request->validate(['categorie_id=>required:contacts','categorie_id'.$data->id,'pays_id=>required:contacts','pays_id'.$data->id,'nom=>required:contacts','nom'.$data->id,'prenom=> required:contacts','prenom'.$data->id,'email=>required:contacts,email'.$data->id,'telephone=>required:contacts,telephone'.$data->id,'adresse=>required:contacts,adresse'.$data->id,'anniversaire=>required:contacts,anniversaire'.$data->id,'entreprise=> required:contacts,entreprise'.$data->id,'fonction=>required:contacts,fonction','fonction'.$data->id,'service=>required:contacts,service','service'.$data->id,'titre=>required:contacts,titre'.$data->id,'site_web=>required:contacts,site_web'.$data->id,'reseaux_sociaux=>required:contacts,reseau_sociaux'.$data->id,'note=>required:contacts,note'.$data->id,'titre=>required:contacts,titre'.$data->id,'favori=>required:contacts,favori']);
        $data->categorie_id=$request->categorie_id;
        $data->pays_id=$request->pays_id;
        $data->nom=$request->nom;
        $data->prenom=$request->prenom;
        $data->email=$request->email;
        $data->telephone=$request->telephone;
        $data->adresse=$request->adresse;
        $data->anniversaire=$request->anniversaire;
        $data->entreprise=$request->entreprise;
        $data->fonction=$request->fonction;
        $data->service=$request->service;
        $data->titre=$request->titre;
        $data->site_web=$request->site_web;
        $data->reseau_sociaux=$request->reseau_sociaux;
        $data->note=$request->note;
        $data->favori=$request->favori;
        $data->save();
        $notification=array('message'=>'Le contact a ete modifie avec success',
        'arlet_type'=>'success');
        $contacts = Contact::all();
        return view('welcome',compact('contacts'))->with($notification);
        //return redirect()->route('welcome'->with($notification));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function contactdelete($id)
    {   $contact=Contact::find($id);
        $contact->delete();
        $notification=array('message'=>'Le contact a ete supprime avec success',
        'arlet_type'=>'success');
        $contacts = Contact::all();
        return view('welcome',compact('contacts'))->with($notification);

        //return redirect()->route('contacts.index')
                       // ->with('success', 'Contact supprimé avec succès.');

    }
}
