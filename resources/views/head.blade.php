<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">GARAGE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                           href="{{url('Orders')}}">Заказы</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('orders')}}">Все заказы</a></li>
                            <li><a class="dropdown-item" href="{{url('orders/create')}}">Добавить заказ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                           href="{{url('Clients')}}">Клиенты</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('clients')}}">Все клиенты</a></li>
                            <li><a class="dropdown-item" href="{{url('clients/create')}}">Добавить клиента</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                           href="{{url('Masters')}}">Мастера</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('masters')}}">Все мастера</a></li>
                            <li><a class="dropdown-item" href="{{url('masters/create')}}">Добавить мастера</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" aria-current="page" data-bs-toggle="dropdown"
                           href="{{url('Works')}}">Услуги</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{url('works')}}">Все услуги</a></li>
                            <li><a class="dropdown-item" href="{{url('works/create')}}">Добавить услугу</a></li>
                        </ul>
                    </li>
                </ul> @if(!Auth::user())
                    <ul class="navbar-nav">

                        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('login') }}">Войти</a>
                    </ul>
                @else
                    <ul class="navbar-nav">
                        <a class="nav-link active" href="#">
                            <i class="fa fa-user" style="font-size:20px;color:white;"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                        <a class="btn btn-outline-success my-2 my-sm-0" href="{{ url('logout') }}">Выйти</a>
                    </ul>
                @endif
            </div>
        </div>
    </nav>
</header>
