<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateContactRequest;
use App\Models\Categorie;
use App\Models\Pays;

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
    public function edit(Contact $contact)
    {     $categories=Categorie::all();
          $pays=Pays::all();
          $contacts = Contact::all();
        return view('contacts.edit', compact('contact','pays','categories','contacts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContactRequest  $request
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContactRequest $request, Contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts.index')
                        ->with('success', 'Contact supprimé avec succès.');

    }
}
