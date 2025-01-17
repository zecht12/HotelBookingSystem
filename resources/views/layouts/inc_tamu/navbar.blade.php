<nav class="navbar navbar-expand-md navbar-dark bg-info shadow">
    <div class="container">
        <a class="navbar-brand h1" href="{{ route('home') }}">
            <img src="/logo.jpg" width="30" height="30" class="d-inline-block align-top img-circle" alt="Logo">
            Hotel Booking
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <x-nav-item-tamu label="Home" :link="route('home')" />
            <x-nav-item-tamu label="Fasilitas" :link="route('fasilitas')" />
            <x-nav-item-tamu label="About" :link="route('about')" />
        </ul>
        </div>
    </div>
</nav>