<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('AdminLte/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i>Авторизован</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">МЕНЮ НАВИГАЦИИ</li>
            <li class="active">
            <li class="active"><a href="/"><i class="fa fa-home"></i><span>Главная</span></a></li>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Панель управления</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{route('users')}}">
                    <i class="fa fa-users"></i>
                    <span>Пользователи</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i>Пользователи</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i>Роли</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-search"></i> <span>Поиск номера</span>
                </a>
            </li>
            <li>
                <a href="{{route('booking')}}">
                    <i class="fa fa-hotel"></i> <span>Бронирование</span>
                </a>
            </li>
            <li>
                <a href="{{route('customers')}}">
                    <i class="fa fa-user"></i> <span>Клиенты</span>
                </a>
            </li>

            <li>
                <a href="{{route('rooms')}}">
                    <i class="fa fa-sitemap"></i> <span>Номера</span>
                </a>
            </li>
            <li>
                <a href="{{route('categories')}}">
                    <i class="fa fa-sliders"></i> <span>Категорий</span>
                </a>
            </li>
            <li>
                <a href="{{route('buildings')}}">
                    <i class="fa fa-building-o"></i> <span>Корпусы</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-dollar"></i> <span>Финансы</span>
                </a>
            </li>
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" ></i> <span>Выйти</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
