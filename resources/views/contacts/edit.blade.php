<!DOCTYPE html>
@extends('layouts.app')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
</head>
<body>
  <div class="container">
       <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><center>Modifier un contact</center></div>

                    <div class="card-body">
                        <form action="" method="POST">
                       <!-- <form action="/updateContact/{$contact->Ccontact_id}" method="POST"> -->
                        <button type="submit" class="btn btn-primary" style="float:right;">Créer</button>
                         <br>
                         @csrf
                         @method('PUT')
                            <input type="hidden" name="" value="">
                            @foreach($contacts as $contact)
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{$contact->nom}}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" id="prenom" name="prenom"  value="{{$contact->prenom}}"  required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <label for="categorie_id">Categorie</label>
                            <select class="form-select" aria-label="Default select example" id="pays_id" name="categorie_id">
                                <option selected value="" disabled>Famille</option>
                                @foreach ($categories as $categorie)
                                <option value="{{ $categorie->categorie_id}} ">{{ $categorie->nom }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"  value="{{$contact->email}}"  required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label for="pays_id">Pays</label>
                            <select class="form-select" aria-label="Default select example" id="pays_id" name="pays_id">
                                <option selected value="">selectez le pays</option>
                                @foreach ($pays as $pay)

                                <option value="{{ $pay->pays_id}} ">{{ $pay->nom }}{{ $pay->pays_id}}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-2">
                                <label for="telephone" >Pays</label>
                                <select class="form-select" aria-label="Default select example" id="pays">
                                <option selected value="+257">Burundi</option>
                        
                                <option value=" "> Tanzanie</option>
                              
                                </select>
                                </div>
                                <div class="col-10">
                                <div class="form-group ">
                                <label for="telephone" >Téléphone</label>
                                <input type="text" class="form-control form-control-sm @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ old('telephone') }}" required>
                                @error('telephone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                                </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse"  value="{{$contact->adresse}}"  required>
                                @error('adresse')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="anniversaire">Anniversaire</label>
                                <input type="date" class="form-control @error('anniversaire') is-invalid @enderror" id="anniversaire" name="anniversaire"  value="{{$contact->anniversaire}}"  required>
                                @error('anniversaire')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="entreprise">Nom de l'entreprise</label>
                                <input type="text" class="form-control @error('entreprise') is-invalid @enderror" id="entreprise" name="entreprise" value="{{$contact->entreprise}}"  required>
                                @error('entreprise')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="fonction">Votre fonction</label>
                                <input type="text" class="form-control @error('fonction') is-invalid @enderror" id="fonction" name="fonction" value="{{$contact->fonction}}"  required>
                                @error('fonction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="service">Service</label>
                                <input type="text" class="form-control @error('service') is-invalid @enderror" id="service" name="service" value="{{$contact->service}}"  required>
                                @error('service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="titre">Titre</label>
                                <input type="text" class="form-control @error('titre') is-invalid @enderror" id="titre" name="titre" v value="{{$contact->titre}}"  required>
                                @error('titre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="site_web">Site web</label>
                                <input type="text" class="form-control @error('site_web') is-invalid @enderror" id="site_web" name="site_web"  value="{{$contact->site_web}}" required>
                                @error('site_web')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="reseau_sociaux">Reseaux sociaux</label>
                                <input type="text" class="form-control @error('reseau_sociaux') is-invalid @enderror" id="reseau_sociaux" name="reseau_sociaux"  value="{{$contact->reseau_sociaux}}"  required>
                                @error('reseaux_sociaux')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="note">Note</label>
                                <input type="text" class="form-control @error('note') is-invalid @enderror" id="note" name="note" value="{{$contact->note}}"  required>
                                @error('note')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                               <label for="favori">Favori</label>
                               <select class="form-select" aria-label="Default select example" id="favori" name="favori">
                                   <option selected value="1">OUI</option>
                                   <option value="0">Non</option>
                               </select> 
                            </div>
                            @endforeach
                        </form>
                    </div>
                </div>
            </div>
</div>
</body>
</html>