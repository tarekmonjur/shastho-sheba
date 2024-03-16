
<aside class="main-sidebar">
    <section class="sidebar">
        <ul class="sidebar-menu" data-widget="tree">
            <li @if($url1 == 'admin') class="active" @endif style="margin-top: 5px">
                <a href="{{url('/admin')}}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>

            @if(canAccess('orders/view'))
            <li @if($url1 == 'orders') class="active" @endif>
                <a href="{{url('/orders/view')}}">
                    <i class="fa fa-share"></i> <span>Orders</span>
                </a>
            </li>
            @endif

            @if(canAccess('users/view'))
            <li @if($url1 == 'users') class="active" @endif>
                <a href="{{url('/users/view')}}">
                    <i class="fa fa-share"></i> <span>Users</span>
                </a>
            </li>
            @endif

            <?php
            $offer_add = canAccess('offers/add');
            $offer_view = canAccess('offers/view');
            if($offer_add || $offer_view){
            ?>
            <li class="treeview @if($url1 == 'offers') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Offers</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($offer_add)
                    <li><a class="@if($url == 'offers/add') active @endif" href="{{url('/offers/add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($offer_view)
                    <li><a class="@if($url == 'offers/view') active @endif" href="{{url('/offers/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $slider_add = canAccess('sliders/add');
            $slider_view = canAccess('sliders/view');
            if($slider_add || $slider_view){
            ?>
            <li class="treeview @if($url1 == 'sliders') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Slider</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($slider_add)
                    <li><a class="@if($url == 'sliders/add') active @endif" href="{{url('/sliders/add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($slider_view)
                    <li><a class="@if($url == 'sliders/view') active @endif" href="{{url('/sliders/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $medicine_add = canAccess('medicines/add');
            $medicine_view = canAccess('medicines/view');
            if($medicine_add || $medicine_view){
            ?>
            <li class="treeview @if($url1 == 'medicines') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Medicines</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($medicine_add)
                    <li><a class="@if($url == 'medicines/add') active @endif" href="{{url('/medicines/add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($medicine_view)
                    <li><a class="@if($url == 'medicines/view') active @endif" href="{{url('/medicines/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>


            <?php
            $categories_add = canAccess('categories/create');
            $categories_view = canAccess('categories/view');
            if($categories_add || $categories_view){
            ?>
            <li class="treeview @if($url1 == 'categories') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Categories</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($categories_add)
                    <li><a class="@if($url == 'categories/create') active @endif" href="{{url('/categories/create')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($categories_view)
                    <li><a class="@if($url == 'categories/view') active @endif" href="{{url('/categories/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $types_add = canAccess('types/create');
            $types_view = canAccess('types/view');
            if($types_add || $types_view){
            ?>
            <li class="treeview @if($url1 == 'types') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Types</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($types_add)
                    <li><a class="@if($url == 'types/create') active @endif" href="{{url('/types/create')}}"><i class="fa fa-circle-o"></i> Create</a></li>
                    @endif
                    @if($types_view)
                    <li><a class="@if($url == 'types/view') active @endif" href="{{url('/types/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $generics_add = canAccess('generics/add');
            $generics_view = canAccess('generics/view');
            if($generics_add || $generics_view){
            ?>
            <li class="treeview @if($url1 == 'generics') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Generics</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($generics_add)
                    <li><a class="@if($url == 'generics/add') active @endif" href="{{url('/generics/add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($generics_view)
                    <li><a class="@if($url == 'generics/view') active @endif" href="{{url('/generics/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $generics_add = canAccess('companies/add');
            $generics_view = canAccess('companies/view');
            if($generics_add || $generics_view){
            ?>
            <li class="treeview @if($url1 == 'companies') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Companies</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($generics_add)
                        <li><a class="@if($url == 'companies/add') active @endif" href="{{url('/companies/add')}}"><i class="fa fa-circle-o"></i> Add</a></li>
                    @endif
                    @if($generics_view)
                        <li><a class="@if($url == 'companies/view') active @endif" href="{{url('/companies/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $roles_add = canAccess('roles/create');
            $roles_view = canAccess('roles/view');
            if($roles_add || $roles_view){
            ?>
            <li class="treeview @if($url1 == 'roles') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Roles</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($roles_add)
                    <li><a class="@if($url == 'roles/create') active @endif" href="{{url('/roles/create')}}"><i class="fa fa-circle-o"></i> Create</a></li>
                    @endif
                    @if($roles_view)
                    <li><a class="@if($url == 'roles/view') active @endif" href="{{url('/roles/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>

            <?php
            $admins_add = canAccess('admins/create');
            $admins_view = canAccess('admins/view');
            if($admins_add || $admins_view){
            ?>
            <li class="treeview @if($url1 == 'admins') active @endif">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Admins</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    @if($admins_add )
                    <li><a class="@if($url == 'admins/create') active @endif" href="{{url('/admins/create')}}"><i class="fa fa-circle-o"></i> Create</a></li>
                    @endif
                    @if($admins_view)
                    <li><a class="@if($url == 'admins/view') active @endif" href="{{url('/admins/view')}}"><i class="fa fa-circle-o"></i> View</a></li>
                    @endif
                </ul>
            </li>
            <?php }?>
            <li @if($url == 'admin/settings') class="active" @endif style="margin-top: 5px">
                <a href="{{url('/admin/settings')}}">
                    <i class="fa fa-share"></i> <span>Settings</span>
                </a>
            </li>
        </ul>
    </section>
</aside>