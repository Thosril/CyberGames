<!-- resources/views/machines/create.blade.php -->

<h1>Ajouter une nouvelle machine</h1>
<form method="POST" action="{{ route('machines.store') }}">
    @csrf

    <div>
        <label for="processeur">Processeur</label>
        <input id="processeur" type="text" name="processeur" required>
    </div>

    <div>
        <label for="memoire">Mémoire</label>
        <input id="memoire" type="number" name="memoire" required>
    </div>

    <div>
        <label for="systeme_exploitation">Système d'exploitation</label>
        <input id="systeme_exploitation" type="text" name="systeme_exploitation" required>
    </div>

    <div>
        <label for="purchase_date">Date d'achat</label>
        <input id="purchase_date" type="date" name="purchase_date" required>
    </div>

    <div>
        <label for="install_games">Jeux installés</label>
        <textarea id="install_games" name="install_games"></textarea>
    </div>

    <div>
        <label for="status">Statut</label>
        <select id="status" name="status" required>
            <option value="disponible">Disponible</option>
            <option value="en maintenance">En maintenance</option>
            <option value="reservé">Réservé</option>
        </select>
    </div>

    <div>
        <label for="last_maintenance">Dernière maintenance</label>
        <input id="last_maintenance" type="date" name="last_maintenance">
    </div>

    <button type="submit">Créer la machine</button>
</form>

