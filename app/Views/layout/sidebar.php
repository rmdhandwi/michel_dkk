<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <div class="">
            <div class="main-menu-header">
                <div class="user-details">
                    <span id="more-details"><?= session()->get('username'); ?><i class="fa fa-caret-down"></i></span>
                </div>
            </div>

            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="user-profile.html"><i class="ti-user"></i>View Profile</a>
                        <a href="#!"><i class="ti-settings"></i>Settings</a>
                        <a href="<?= base_url('Auth/logout') ?>"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="pcoded-navigation-label" data-i18n="nav.category.navigation">Layout</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class=<?= ($menu == 'Dashboard') ? 'active' : '' ?>>
                <a href="<?= base_url('Home') ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Arsip</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?= ($menu == 'Periode') ? 'active' : '' ?>">
                <a href="<?= base_url('Periode') ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-briefcase"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Periode</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?= ($menu == 'Kategori') ? 'active' : '' ?>">
                <a href="<?= base_url('Kategori') ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-briefcase"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Kategori</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
            <li class="<?= ($menu == 'Data Arsip') ? 'active' : '' ?>">
                <a href="<?= base_url('Arsip') ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-files"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Data Arsip</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">User</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="<?= ($menu == 'Data User') ? 'active' : '' ?>">
                <a href="<?= base_url('User') ?>" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-user"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">User</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
        <div class="pcoded-navigation-label" data-i18n="nav.category.forms">Laporan</div>
        <ul class="pcoded-item pcoded-left-item">
            <li>
                <a href="form-elements-component.html" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-printer"></i><b>FC</b></span>
                    <span class="pcoded-mtext" data-i18n="nav.form-components.main">Laporan</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>
</nav>