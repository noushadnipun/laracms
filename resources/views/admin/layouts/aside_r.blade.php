<style>
    a {
    color: #49477f;
    text-decoration: none;
    background-color: transparent;
}

.mt-2, .my-2 {
    margin-top: .5rem!important;
    padding-bottom: 90px;
}
</style>

<ul class="navbar-nav ml-auto">
    <li class="nav-item nav-link text-success">
        <a class="" href="{{url('/')}}" target="_blank"><i class="fa fa-globe"></i> Website</a>   
    </li>
    <li class="nav-item nav-link text-success">
        <a class="" href="" target="_blank"><i class="fa fa-info"></i> Help</a>   
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link text-success" data-toggle="dropdown" href="#">
        <i class="far fa-user"></i> {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
        </form>
      </div>  
    </li>

    <li class="nav-item">
        <a class="nav-link text-danger" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i>
        </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li>
  </ul>
