<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand">
            <img src="{{ asset('main/img/logo.png') }}">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('about-us') }}">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('services') }}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-2" href="{{ url('login') }}">Login</a>
            </li>
          </ul>
        </div>

    </div>
</nav>

