<li class="menu-header">Dashboard</li>
<li class=""><a class="nav-link" href="<?= site_url('admin/dashboard') ?>"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="far fa-calendar"></i><span>Event</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('event') ?>">Data Event</a></li>
        <li><a class="nav-link" href="<?= site_url('kategori-event') ?>">Kategori Event</a></li>
    </ul>
</li>
<li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="fas fa-laptop-code"></i><span>Manajemen Konten</span></a>
    <ul class="dropdown-menu">
        <li><a class="nav-link" href="<?= site_url('tentang-kami') ?>">Tentang Kami</a></li>
        <li><a class="nav-link" href="<?= site_url('kontak') ?>">Kerjasama</a></li>
        <li><a class="nav-link" href="<?= site_url('komen-admin') ?>">Komentar</a></li>
    </ul>
</li>
<li class=""><a class="nav-link" href="<?= site_url('logout-admin') ?>"><i class="fas fa-sign-in-alt"></i> <span>Logout</span></a></li>