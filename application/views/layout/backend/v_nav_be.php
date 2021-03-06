<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin') ?>" class="brand-link text-center">
        <span class="brand-text font-weight-light">Admin Page</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <a href="#" class="d-block"><?= $this->session->userdata('full_name') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == '') {
                                                                            echo 'active';
                                                                        } ?>" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('category') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'category') {
                                                                                echo 'active';
                                                                            } ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>Category</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('product') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'product') {
                                                                                echo 'active';
                                                                            } ?>" class="nav-link">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Product</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('productimages') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'productimages') {
                                                                                    echo 'active';
                                                                                } ?>" class="nav-link">
                        <i class="nav-icon fas fa-image"></i>
                        <p>Product Images</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/incoming_orders') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'incoming_orders' and $this->uri->segment(1) == 'admin') {
                                                                                            echo 'active';
                                                                                        } ?>" class="nav-link">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Incoming Orders</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('sales_report') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'sales_report') {
                                                                                    echo 'active';
                                                                                } ?>">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Daily Sales Report</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('admin/setting') ?>" class="nav-link <?php if ($this->uri->segment(2) == 'setting') {
                                                                                    echo 'active';
                                                                                } ?>">
                        <i class="nav-icon fa fa-cog"></i>
                        <p>Raja Ongkir</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') {
                                                                            echo 'active';
                                                                        } ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/user_logout') ?>" class="nav-link">
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">