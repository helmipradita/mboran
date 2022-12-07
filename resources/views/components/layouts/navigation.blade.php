<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    <nav class="navbar navbar-expand-lg navbar-dark text-white" style="background-color: black;">
        <div class="container">
            <a class="navbar-brand" href="/"><img width="150px" src="{{URL::asset('/img/mboranLogo 2.png')}}" alt=""></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="/penjual" class="nav-link btn btn-warning btn-sm text-dark" type="submit">List Penjual</a>
                  </li>
                <li class="nav-item">
                  <a class="nav-link" href="/dashboard">Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/penilaian">Penilaian</span></a>
                  </li>
              </ul>
              <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
              </ul>
            </div>
        </div>
    </nav>
</div>