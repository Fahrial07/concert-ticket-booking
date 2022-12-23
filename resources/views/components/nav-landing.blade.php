<nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
    <a href="" class="navbar-brand p-0">
        <h1 class="m-0"><i class="fa fa-search me-2"></i>Ticket <span class="fs-5">Booking Konser</span></h1>
        <!-- <img src="img/logo.png" alt="Logo"> -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{ route('booking.index') }}" class="nav-item nav-link">Booking Ticket</a>
            <a href="{{ route('search_my_ticket.index') }}" class="nav-item nav-link">Search Ticket</a>
            @if(!empty(Auth::user()))
            <a href="{{ route('admin.dashboard.index') }}" class="nav-item nav-link">Dashboard</a>
            @else
            <a href="{{ route('login') }}" class="nav-item nav-link">Login</a>
            @endif
        </div>
    </div>
</nav>
