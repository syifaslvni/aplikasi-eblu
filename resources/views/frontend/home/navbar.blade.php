
    <!-- Awal Navbar -->
    <nav class="navbar navbar-expand-lg navbar-warning bg-warning">
        <div class="container">
          <a class="navbar-brand text-decoration-none text-light fw-bold text-center" href="{{ route('home.index') }}">
            <img src="{{ asset('assets/blu/assets/blu-esdm.png') }}" alt="" width="490" height="90" class="me-2">
          </a>
  
          <div class="collapse navbar-collapse" id="navbarNav">
            <form class="d-flex ms-auto my-3 my-lg-0" action="{{ route('home.search') }}" method="GET">
              <input name="keyword" value="{{ request()->get('keyword') }}" class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
              <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
              </form>
          </div>
        </div>
      </nav>
      <!-- Akhir Navbar -->