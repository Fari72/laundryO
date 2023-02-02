<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="{{route('dashboard.index')}}">LaundryO</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="{{route('dashboard.index')}}">Lau</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dashboard</li>
      <li class="{{ active('dashboard*') }}"><a class="nav-link" href="/dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>           
      <li class="menu-header">User</li>
      <li class="{{ active('user*') }}"><a class="nav-link" href="{{route('user.index')}}"><i class="fas fa-user"></i><span>User</span></a></li>
      <li class="menu-header">Outlet</li>
      <li class="{{ active('outlet*') }}"><a class="nav-link" href="{{route('outlet.index')}}"><i class="#"></i><span>Outlet</span></a></li>           
      <li class="menu-header">Member</li>           
      <li class="{{ active('member*') }}"><a class="nav-link" href="{{route('member.index')}}"><i class="#"></i><span>Member</span></a></li>           
      <li class="menu-header">Paket</li>           
      <li class="{{ active('paket*') }}"><a class="nav-link" href="{{route('paket.index')}}"><i class="#"></i><span>Paket</span></a></li>           
      <li class="menu-header">Transaksi</li>           
      <li class="{{ active('transaksi*') }}"><a class="nav-link" href="{{route('transaksi.index')}}"><i class="#"></i><span>Transaksi</span></a></li>           
      <li class="menu-header">Laporan</li>           
      <li class="{{ active('detail_transaksi*') }}"><a class="nav-link" href="{{route('detail_transaksi.index')}}"><i class="#"></i><span>Laporan</span></a></li>           
    </ul>
  </aside>
</div>
