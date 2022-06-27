<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav mt-2">
                
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Home
                </a>
                @if(getPermissions(auth()->user()->role_id,'employee.index'))

                <a class="nav-link" href="{{route('employee.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Employees
                </a>
                @endif
                @if(getPermissions(auth()->user()->role_id,'requisition.index'))

                <a class="nav-link" href="{{route('requisition.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Requisition
                </a>
                @endif
                
                @if(getPermissions(auth()->user()->role_id,'executive.index'))

                <a class="nav-link" href="{{route('executive.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Executives
                </a>
                @endif
                @if(getPermissions(auth()->user()->role_id,'supplier.index'))

                <a class="nav-link" href="{{route('supplier.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Suppliers
                </a>
                @endif
                @if(getPermissions(auth()->user()->role_id,'item.index'))

                <a class="nav-link" href="{{route('item.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Items
                </a>
                @endif
                @if(getPermissions(auth()->user()->role_id,'stock.index'))
                <a class="nav-link" href="{{route('stock.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Stock
                </a>
                @endif

                
                @if(getPermissions(auth()->user()->role_id,'role.index'))

                <a class="nav-link" href="{{route('role.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Roles
                </a>
                @endif
                @if(getPermissions(auth()->user()->role_id,'permission.index'))

                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Permissions
                </a>
                @endif
               
            </div>
        </div>
    </nav>
</div>
