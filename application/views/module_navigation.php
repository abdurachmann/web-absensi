<?php $uri = $this->uri->segment(1); ?>

<li>
    <a <?=($uri == 'dashboard') ? "class=\"active\"" : ""; ?> href="{base_url}dashboard"><i class="si si-speedometer"></i><span class="sidebar-mini-hide">Dashboard</a>
</li>
<li <?=($uri == 'mpegawai' || $uri == 'mperusahaan') ? "class=\"open\"" : ""; ?>>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-layers"></i><span class="sidebar-mini-hide">Master Data</span></a>
    <ul>
        <li>
            <a <?=($uri == 'mpegawai') ? "class=\"active\"" : ""; ?> href="{base_url}mpegawai">Pegawai</a>
        </li>
        <li>
            <a <?=($uri == 'mperusahaan') ? "class=\"active\"" : ""; ?> href="{base_url}mperusahaan">Perusahaan</a>
        </li>
    </ul>
</li>
<li <?=($uri == 'linfoabsensi') ? "class=\"open\"" : ""; ?>>
    <a class="nav-submenu" data-toggle="nav-submenu" href="#"><i class="si si-list"></i><span class="sidebar-mini-hide">Laporan</span></a>
    <ul>
        <li>
            <a <?=($uri == 'linfoabsensi') ? "class=\"active\"" : ""; ?> href="{base_url}linfoabsensi">Informasi Absensi</a>
        </li>
    </ul>
</li>
<li>
    <a <?=($uri == 'musers') ? "class=\"active\"" : ""; ?> href="{base_url}musers"><i class="si si-users"></i><span class="sidebar-mini-hide">Users</a>
</li>
