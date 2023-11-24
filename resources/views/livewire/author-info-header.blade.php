<div>
    
    <div class="user-info-dropdown">
        <div class="dropdown">
            <a
                class="dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
            >
                <span class="user-icon">
                    <img src="{{$user->picture}}" alt="" />
                </span>
                <span class="user-name">{{$user->name}}</span>
            </a>
            <div
                class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list"
            >
                <a class="dropdown-item" href="{{route('author.profile')}}"
                    ><i class="dw dw-user1"></i> Perfil</a
                >
                <a href="{{ route('author.logout_handler') }}" class="dropdown-item" onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                    ><i class="dw dw-logout"></i> Cerrar Sesión</a
                >
                <form action="{{ route('author.logout_handler') }}" method="POST" id="logout-form">@csrf</form>
            </div>
        </div>
    </div>
</div>
