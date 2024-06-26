<!DOCTYPE html>
@extends('layouts.app')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
    @section('content')
    <div class="container">
    <br>
    <div class="row">
        <div class="col-3">

        </div>
        <div class="col-9">
        <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <br>
        </div>
    </div>
        <div class="row justify-content-center">
          <div class="col-md-3">
             <div class="card">
                <nav class="nav flex-column">
                    <br>
                    <a href="{{URL::to('/createContact')}}" class="btn btn-info btn-sm">+ Créer un contact</a>
                    <a class="nav-link "href="#" style="color: black;">Fréquents</a>
                    <a class="nav-link" href="#"style="color: black;">Autres contacts</a> 
                    <a class="nav-link" href="#"style="color: black;">Corriger et gérer</a> 
                    <a class="nav-link" href="#"style="color: black;">Fusionner et gérer</a>
                    <a class="nav-link" href="#"style="color: black;">Importer</a>  
                    <a class="nav-link" href="#"style="color: black;">Corbeille</a> 
                    <br>
                    <a class="nav-link" href="{{URL::to('/createCategorie')}}"style="color: black;">Ajouter un categorie</a> 
                    <a class="nav-link" href="{{URL::to('/createPays')}}"style="color: black;">Ajouter un pays</a> 
                </nav>
               </div>
            </div>
            <div class="col-md-9">
               <div class="card">
             

                <p class="h4">Contacts</p>
                <table class="table">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Email</th>
                                    <th>Actions</th>
                                   
                                    
                                </tr>
                            </thead>
                            <tbody>
                           <tr>
                           <p class="load">Contacts</p>
                           </tr>
                            @foreach ($contacts as $contact)
                           <tr>
                           <td>{{ $contact->prenom }}{{" "}}{{ $contact->nom }}</td>
                           <td>{{ $contact->email }}</td>
                           <td> 
                                <a class="btn btn-info "href="{{route('contacts.edit', $contact->id)}}">:</a>
                                <a class="btn btn-danger "href="{{route('contacts.delete', $contact->id)}}">X</a>
                           </td>
                           </tr>
                            @endforeach

                            </tbody>
                        </table>
               </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </body>
</html>
