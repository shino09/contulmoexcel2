<section class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel">
    <div class="pull-left image">
      <img src="{{ asset('img/users/user.png') }}" class="img-circle" alt="Imagen del Usuario">
    </div>
    <div class="pull-left info">
      <p>{{ auth()->user()->nombre }}</p>
      <!-- Status -->
      @can('users.perfil')
      <a href="{{ route('users.perfil') }}"><i class="fa fa-circle text-success"></i> En linea</a>
      @endcan
    </div>
  </div>

  <!-- Sidebar Menu -->
  <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MENU PRINCIPAL</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="{{ active('home') }}">
      <a href="{{ url('/home') }}">
        <i class="fa fa-dashboard"></i> <span>PANEL DE CONTROL</span>
      </a>
    </li>
    @canatleast(['empresas.index'])
    <li class="treeview {{ active('configuracion/*') }}">
      <a href="#"><i class="fa fa-cogs"></i> <span>CONFIGURACION</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        @can('empresas.index')
        <li class="{{ active('configuracion/empresas') }}">
          <a href="{{ route('empresas.index') }}">
            <i class="fa fa-bank"></i> Perfil Empresa
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcanatleast
    @canatleast(['users.index','roles.index'])
    <li class="treeview {{ active('administracion/*') }}">
      <a href="#"><i class="fa fa-lock"></i> <span>ADMINISTRAR</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        @can('users.index')
        <li class="{{ active('administracion/users') }}">
          <a href="{{ route('users.index') }}">
            <i class="fa fa-users"></i> Usuarios
          </a>
        </li>
        @endcan
        @can('roles.index')
        <li class="{{ active('administracion/roles') }}">
          <a href="{{ route('roles.index') }}">
            <i class="fa fa-code-fork"></i> Roles
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcanatleast
      @canatleast(['persona.index'])
    <li class="treeview {{ active('configuracion/*') }}">
      <a href="#"><i class="fa fa-users"></i> <span>PERSONAS</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        @can('persona.index')
        <li class="{{ active('persona.index') }}">
          <a href="{{ route('persona.index') }}">
            <i class="fa fa-users"></i> Listado Personas
          </a>
        </li>
        @endcan
      </ul>
    </li>
    @endcanatleast
  </ul>


  <!-- /.sidebar-menu -->
</section>
<!-- /.sidebar -->
