<style>
    body {
        margin: 0;
        font-family: 'Roboto', sans-serif;
        background-color: #f8f8f8;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 1000;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        display: flex;
        justify-content: center;
    }

    .navbar div {
        margin: 0 20px;
    }

    .navbar a {
        color: #333;
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: all 0.3s ease;
    }

    .navbar .activo a {
        color: #fff;
        background-color: #007bff;
    }

    .navbar a:hover {
        color: #007bff;
        background-color: #e9ecef;
    }
</style>

<body>
    <div class="navbar">
        <div class="{{ setActivo('home') }}"><a href="{{ route('home') }}">Home</a></div>
        <div class="{{ setActivo('servicios') }}{{ setActivo('servicios.show') }}{{ setActivo('servicios.create') }}
        {{ setActivo('servicios.edit') }} "><a href="{{ route('servicios') }}">Servicios</a></div>
        <div class="{{ setActivo('contacto') }}{{ setActivo('contacto.enviado') }}"><a href="{{ route('contacto') }}">Contacto</a></div>
        @guest
        <div class="{{ setActivo('login') }}"><a href="{{ route('login') }}">Login</a></div>
        @else
        <div class="{{ setActivo('logout') }}"><a href="#" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Cerrar Sesión</a></div>
        @endguest
    </div>
</body>
<form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
    @csrf
</form>
