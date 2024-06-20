<!DOCTYPE html>
@extends('layouts.app')
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau categorie</title>
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
  <center>
  <div class="container">
       <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Créer un nouveau categorie</div>

                    <div class="card-body">
                        <form action='storeCategorie' method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nom">Nom du categorie</label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" value="{{ old('nom') }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <!--<div class="mb-3">-->
                            <div class="form-group">
                           <label for="description" class="form-label">Description</label>
                           <textarea class="form-control  @error('code') is-invalid @enderror" id="description" name="description" rows="3" value="{{ old('description') }}" required></textarea>
                           @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                             </div>
                             <div class="form-group">
                                <br>
                             <button type="submit" class="btn btn-primary" style="float:right;">Créer</button>
                             </div>
                        </form>
                    </div>
                </div>
            </div>
</div>
</center>
</body>
</html>