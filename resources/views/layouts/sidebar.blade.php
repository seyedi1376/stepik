<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="images/logo.png" alt="AdminLTE Logo" class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="direction: ltr">
        <div style="direction: rtl">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->


                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('lessonTab')" href="#">
                            <i class="nav-icon fas fa-book"></i>
                            <p>مدیریت دروس</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" ng-click="changeTab('syllabusTab')" href="#">
                            <i class="nav-icon fas fa-book"></i>
                            <p>سرفصل ها</p>
                        </a>
                    </li>


                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>