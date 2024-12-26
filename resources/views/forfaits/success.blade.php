<!-- resources/views/forfaits/success.blade.php -->
<h1>Achat réussi</h1>
<p>Félicitations ! Vous avez acheté le forfait : {{ $forfait->nom }}.</p>
<a href="{{ route('dashboard') }}">Retour au Dashboard</a>
