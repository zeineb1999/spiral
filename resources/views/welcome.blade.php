<form action="{{ route('login') }}" method="post">
    @csrf
    <input type="text" name="username" placeholder="Nom d'utilisateur" required>
    <input type="password" name="password" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif
</form>
