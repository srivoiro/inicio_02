@auth
<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
        <a href="">Menu</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
        <a href="">Menu</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Modulos</li>
            <li class="{{ Request::is('home') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('home') }}"><i class="fas fa-fire"></i><span>Panel de Control</span></a>
            </li>
            
            <!-- profile  password -->
            <li class="menu-header">Usuarios</li>

            <li><a class="nav-link" href="{{ route('users.index') }}">Usuarios</a></li>
            <li><a class="nav-link" href="{{ route('roles.index') }}">Roles</a></li>
            <li><a class="nav-link" href="{{ route('products.index') }}">Articulos</a></li>
               

            <li class="menu-header">Varios</li>
          
            <li class="{{ Request::is('clock-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('clock-example') }}"><i class="fas fa-clock"></i> <span>Reloj</span></a>
            </li>                      
        
            <li class="{{ Request::is('calendar-example') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('calendar-example') }}"><i class="fas fa-calendar"></i> <span>Calendario</span></a>
            </li>
            
        </ul>
    </aside>
</div>
@endauth
