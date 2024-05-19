@extends('layouts.app')

@include('layouts.header')


@section('content')

<div class="container mt-5">
    <h1 class="text-center mb-4">Supprimer un utilisateur</h1>
    <div class="users-list">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Service</th>
                    <th>Fonction</th>
                    <th>Email</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nom }}</td>
                    <td>{{ $user->prenom }}</td>
                    <td>{{ $user->service }}</td>
                    <td>{{ $user->fonction }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                    <form action="{{ route('supprimer-utilisateur1', ['id' => $user->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">
        <i class="fas fa-trash-alt"></i> Supprimer
    </button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 mb-5">
        <button type="button" style="background-color: green; color: white" onclick="window.history.back()">Retour</button>
        </div>

    </div>
</div>
@endsection
