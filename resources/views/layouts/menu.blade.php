<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-md-down-none">
        {{ env('APP_NAME') }}
    </div>

    <ul class="c-sidebar-nav ps ps--active-y">

    <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link{{activeURL('dashboard')}}" href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link{{activeURL('setting*')}}" href="{{ route('user.settings') }}">Profile Settings</a></li>
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        </li>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>

    </ul>

</div>
