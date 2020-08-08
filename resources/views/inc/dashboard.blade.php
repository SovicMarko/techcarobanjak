    <div class="admin-logout">
        <a href="{{url('/')}}"><b>Tech</b>Čarobnjak</a> |
        <a class="list-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
        <div class="card bg-dark text-center">
            <div class="card-header">
             BROJ OBJAVA
            </div>
            <div class="card-body">
                <h1>{{$broj_objava}}</h1>
            </div>

        </div>
        <div class="card bg-dark text-center">
            <div class="card-header">
             BROJ KORISNIKA
            </div>
            <div class="card-body">
                <h1>{{$broj_korisnika}}</h1>
            </div>

        </div>
        <div class="card bg-dark text-center">
            <div class="card-header">
             BROJ PORUDZBINA
            </div>
            <div class="card-body">
                <h1>0</h1>
            </div>

        </div>

