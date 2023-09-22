<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="{{ url('dashboard') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>


@if (auth()->user()->role == "PENGGUNA")
<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
{{-- <div class="sidebar-heading">
    Interface
</div> --}}

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('users.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>User</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Product</span></a>
</li>

<!-- Nav Item -  -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('transactions.index') }}">
        <i class="fas fa-fw fa-table"></i>
        <span>Transaction</span></a>
</li>

@endif
