<!-- resources/views/machines/edit.blade.php -->

<h1>Modifier la machine</h1>
<form action="{{ route('machines.update', $machine->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="processeur">Processeur</label>
        <input type="text" name="processeur" id="processeur" value="{{ $machine->processeur }}" required>
    </div>
    <div>
        <label for="memoire">Mémoire</label>
        <input type="number" name="memoire" id="memoire" value="{{ $machine->memoire }}" required>
    </div>
    <div>
        <label for="systeme_exploitation">Système d'exploitation</label>
        <input type="text" name="systeme_exploitation" id="systeme_exploitation" value="{{ $machine->systeme_exploitation }}" required>
    </div>
    <div>
        <label for="purchase_date">Date d'achat</label>
        <input type="date" name="purchase_date" id="purchase_date" 
            value="{{ \Carbon\Carbon::parse($machine->purchase_date)->format('Y-m-d') }}" required>
    </div>
    <div>
        <label for="status">Statut</label>
        <select name="status" id="status" required>
            <option value="disponible" {{ $machine->status == 'disponible' ? 'selected' : '' }}>Disponible</option>
            <option value="en maintenance" {{ $machine->status == 'en maintenance' ? 'selected' : '' }}>En maintenance</option>
            <option value="reservé" {{ $machine->status == 'reservé' ? 'selected' : '' }}>Réservé</option>
        </select>
    </div>
    <button type="submit">Sauvegarder</button>
</form>
