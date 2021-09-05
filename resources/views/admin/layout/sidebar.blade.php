<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">Contenido</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/productos') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.producto.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/clientes') }}"><i class="nav-icon icon-book-open"></i> {{ trans('admin.cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/operacions') }}"><i class="nav-icon icon-compass"></i> Facturar</a></li>        
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">Configuracion</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Usuarios') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Bitacora') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
