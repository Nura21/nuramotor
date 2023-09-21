<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


@if (auth()->user()->warga->status == "ACTIVE")
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
{{-- <div class="sidebar-heading">
    Interface
</div> --}}

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('umkm.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>UMKM</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('iuran.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Iuran Warga</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('pengeluaran.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Pengeluaran</span></a>
</li>

@endif
