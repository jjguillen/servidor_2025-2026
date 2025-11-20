# INSTALACIÓN FORTIFY

---

## Instalación
composer require laravel/fortify
php artisan fortify:install
php artisan migrate

## Configuración

En el archivo `config/fortify.php`, configurar las opciones de Fortify según tus necesidades, quitamos
autenticación en dos pasos:
```
'features' => [
Features::registration(),
Features::resetPasswords(),
Features::emailVerification(),
],
```
## Proveedor de servicios
Conectar vistas, en `app/Providers/FortifyServiceProvider.php`:
```
use Laravel\Fortify\Fortify;

public function boot(): void
{
// ...

    // Indicar a Fortify qué vista mostrar para el Login
    Fortify::loginView(function () {
        return view('auth.login'); // Asegúrate de crear resources/views/auth/login.blade.php
    });

    // Indicar a Fortify qué vista mostrar para el Registro
    Fortify::registerView(function () {
        return view('auth.register'); // Asegúrate de crear resources/views/auth/register.blade.php
    });
    
    // ...
}
```

## Vistas
Fortify no incluye vistas por defecto, por lo que debemos crearlas:
1. Vista de login -> resources/views/auth/login.blade.php

```
<form method="POST" action="{{ route('login') }}">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" required autofocus />
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="password" required />
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>
            <input type="checkbox" name="remember"> Recuérdame
        </label>
    </div>

    <button type="submit">Iniciar Sesión</button>
</form>
```

2. Vista de registro -> resources/views/auth/register.blade.php
```
<form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <label>Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" required />
        @error('name') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required />
        @error('email') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Contraseña</label>
        <input type="password" name="password" required />
        @error('password') <span>{{ $message }}</span> @enderror
    </div>

    <div>
        <label>Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" required />
    </div>

    <button type="submit">Registrarse</button>
</form>
```

3. Botón de cierre de sesión en cualquier vista:
```
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar Sesión</button>
</form>
``` 

## Rutas
Fortify registra automáticamente las rutas necesarias para autenticación, registro, restablecimiento de contraseña,
etc. Puedes verlas ejecutando `php artisan route:list`. 

Por defecto después de login y register nos lleva a una vista 'home' que no existe, lo podemos cambiar en
`app/Providers/FortifyServiceProvider.php`:
```
use Laravel\Fortify\Fortify;
public function boot(): void
{
    // ...

    Fortify::redirects([
        'login' => '/dashboard', // Cambia '/dashboard' por la ruta que desees
        'register' => '/dashboard',
    ]);

    // ...
}
```
Asegúrate de crear la ruta y vista correspondiente para `/dashboard` o la que hayas elegido.

## Middleware
Asegúrate de que las rutas que deseas proteger con autenticación utilicen el middleware 
`auth`:
```Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
```

O para una sola ruta:
```Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');
```

Con estos pasos, habrás instalado y configurado Laravel Fortify para manejar la autenticación en tu aplicación Laravel. 
Asegúrate de personalizar las vistas y rutas según las necesidades de tu proyecto.