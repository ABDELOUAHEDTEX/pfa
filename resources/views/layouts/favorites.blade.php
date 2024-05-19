<!-- resources/views/favorites.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container2">
        @include('layouts.header')
        <div class="inbox-phrases">
            <h1 class="inbox-message">Favoris</h1>
        </div>
        <div>
            <table class="inbox-table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Référence</th>
                        <th>Date de réception</th>
                        <th>Expéditeur</th>
                        <th>Type</th>
                        <th>Contenu</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($favorites as $favorite)
                        <tr>
                            <td>{{ $favorite->id }}</td>
                            <td>{{ $favorite->reference }}</td>
                            <td>{{ $favorite->date }}</td>
                            <td>{{ $favorite->envoye_depuis }}</td>
                            <td>{{ $favorite->objet }}</td>
                            <td>{{ $favorite->message }}</td>
                            <td class="modefication">
                                <div class="buttons-inbox">
                                    <form action="{{ route('favorites.remove', ['id' => $favorite->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            style="width: 24px; height: 24px; padding: 0; margin-right: 5px"
                                            onclick="return confirm('Êtes-vous sûr de vouloir retirer ce courrier des favoris?')">
                                            <img src="images/removefromfavoris.png" style="width: 100%; height: 100%"
                                                title="Retirer des favoris" />
                                        </button>
                                    </form>
                                    <button style="width: 24px; height: 24px; padding: 0;">
                                        <img src="images/3221845.png" style="width: 100%; height: 100%"
                                            title="Modifier le courrier" />
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
