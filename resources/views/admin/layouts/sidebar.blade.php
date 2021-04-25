<div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="" class="simple-text">
                Student Activity Record System
            </a>
        </div>

        <ul class="nav">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="ti-panel"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/activity/create') }}">
                    <i class="ti-archive"></i>
                    <p>Student Activity</p>
                </a>
            </li>

            <li>
                <a href="{{ url('/admin/activity') }}">
                    <i class="ti-view-list-alt"></i>
                    <p>View Activities</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/participants') }}">
                    <i class="ti-calendar"></i>
                    <p>Participants</p>
                </a>
            </li>
            <!-- <li>
                <a href="{{ url('/admin/products/create') }}">
                    <i class="ti-archive"></i>
                    <p>Add Product</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/products') }}">
                    <i class="ti-view-list-alt"></i>
                    <p>View Products</p>
                </a>
            </li>
            <li>
                <a href="{{ url('/admin/orders') }}">
                    <i class="ti-calendar"></i>
                    <p>Orders</p>
                </a>
            </li> -->
            <li>
                <a href="{{ url('/admin/users') }}">
                    <i class="fa fa-users"></i>
                    <p>Users</p>
                </a>
            </li>
        </ul>
    </div>
</div>
