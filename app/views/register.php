<h2>Inscription</h2>
<form method="post">
    Nom: <input type="text" name="nom" required><br>
    Email: <input type="email" name="email" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    Rôle:
    <select name="role">
        <option value="client">Client</option>
        <option value="restaurant">Restaurant</option>
        <option value="livreur">Livreur</option>
        <option value="admin">Admin</option>
    </select><br>
    <button type="submit">S'inscrire</button>
</form>
