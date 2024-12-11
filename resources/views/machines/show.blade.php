<!-- resources/views/machines/show.blade.php -->

<h1>Détails de la machine</h1>
<ul>
    <li>Processeur : {{ $machine->processeur }}</li>
    <li>Mémoire : {{ $machine->memoire }} Go</li>
    <li>Système d'exploitation : {{ $machine->systeme_exploitation }}</li>
    <li>Date d'achat : {{ $machine->purchase_date->format('d/m/Y') }}</li>
    <li>Statut : {{ $machine->status }}</li>
</ul>
<a href="{{ route('machines.edit', $machine->id) }}">Modifier</a>
