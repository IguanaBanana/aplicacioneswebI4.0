<form method="POST" action="{{ route('usuarios.store') }}">
    @csrf
    <input type="text" name="name" placeholder="Nombre">
    <input type="email" name="email" placeholder="Correo electrónico">
    <input type="password" name="password" placeholder="Contraseña">
    <button type="submit">Agregar Usuario</button>
</form>
