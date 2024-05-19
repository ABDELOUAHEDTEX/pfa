@include('layouts.header')

<div class="container">
    <h1>Statistiques des courriers</h1>
    <div class="stats">
        <h2>Courriers déjà traités</h2>
        <p>Total des courriers traités : {{ $traites }}</p>
    </div>
    <div class="stats">
        <h2>Courriers non traités</h2>
        <p>Total des courriers non traités : {{ $nonTraites }}</p>
    </div>
</div>

@include('layouts.footer')
