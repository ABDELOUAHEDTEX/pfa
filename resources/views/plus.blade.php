@include('layouts.header')
@extends('layouts.app')
<div class="container">
    <h1>Panneau de contrôle</h1>
    <div class="options">
        <h2>Options:</h2>
        <div class="button-options">
            <form action="{{ route('supprimer-utilisateur') }}" method="GET">
                <button type="submit" class="btn btn-danger">Supprimer un utilisateur</button>
            </form>
            <form action="{{ route('archiver') }}" method="GET">
                <button type="submit" class="btn btn-primary">Archiver</button>
            </form>
            <form action="{{ route('statistiques') }}" method="GET">
                <button type="submit" class="btn btn-success">Statistiques</button>
            </form>
        </div>
    </div>
</div>


