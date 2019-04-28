<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        
        <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample08">
          <ul class="navbar-nav">
            <li class="nav-item btn btn-secondary">
              <a class="nav-link active" href="{{ url('/') }}">Главная</span></a>
            </li>
            <li class="nav-item btn btn-secondary">
              <a class="nav-link active" href="{{ url('/products') }}">Товары</span></a>
            </li>
            <li class="nav-item btn btn-secondary">
              <a class="nav-link active" href="{{ url('/feedback') }}">Оставить отзыв</span></a>
            </li>
            <li class="nav-item btn btn-secondary">
              <a class="nav-link active" href="{{ url('/about') }}">О компании</a>
            </li>
            
            @if(Gate::check('isUser') || Gate::check('isAdmin'))

            <li class="nav-item btn btn-secondary">
            <a class="nav-link active" href="{{ url('/cart') }}">Корзина({{Cart::session(Auth::user()->name)->getContent()->count()}})</a>
            </li>

            @endif


            @can('isAdmin')
            <li class="nav-item dropdown btn btn-secondary">
              <a class="nav-link dropdown-toggle active" id="dropdown08" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Администрирование</a>
              <div class="dropdown-menu" aria-labelledby="dropdown08">
                <a class="dropdown-item" href="{{ url('/admin/feedback') }}">Отзывы</a>
                <a class="dropdown-item" href="{{ url('/admin/products') }}">Товары</a>
                <a class="dropdown-item" href="{{ url('/admin/orders') }}">Заказы</a>
              </div>
            </li>
            <li class="nav-item btn btn-secondary">
              <a class="nav-link active" href="{{ url('/logout') }}">Выход</a>
            </li>
            @endcan
          
        @if(!Gate::check('isUser') && !Gate::check('isAdmin'))

          <li class="nav-item btn btn-secondary">
            <a class="nav-link active" href="{{ url('/login') }}">Вход</a>
          </li>

          <li class="nav-item btn btn-secondary">
            <a class="nav-link active" href="{{ url('/register') }}">Регистрация</a>
          </li>

        @endif
        
        @if(Gate::check('isUser') || Gate::check('isAdmin'))

            <li class="nav-item btn btn-secondary">
            <a class="nav-link active"">{{Auth::user()->name}}</a>
            </li>

        @endif

        @can('isUser')

          <li class="nav-item btn btn-secondary">
            <a class="nav-link active" href="{{ url('/logout') }}">Выход</a>
          </li>

        @endcan
        </ul>
        </div>
      </nav>
</header>