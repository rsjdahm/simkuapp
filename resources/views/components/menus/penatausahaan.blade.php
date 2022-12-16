<li class="menu-title">Main</li>
<li>
    <a data-load="#page" data-menu="default" href="{{ route('dashboard.show') }}">
        <i class="fas fa-tachometer-alt"></i>
        <span>Dashboard</span>
    </a>
</li>
<li>
    <a href="javascript: void(0);" class="has-arrow">
        <i class="fas fa-chart-bar"></i>
        <span>Anggaran</span>
    </a>
    <ul class="sub-menu">
        <li>
            <a href="javascript: void(0);" class="has-arrow">
                <span>Penganggaran</span>
            </a>
            <ul class="sub-menu">
                <li>
                    <a data-load="#page" data-menu="item" href="{{ route('rka.index') }}">
                        RKA
                    </a>
                </li>
                <li>
                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                        Rincian Belanja
                    </a>
                </li>
                <li>
                    <a data-load="#page" data-menu="item" href="{{ route('test') }}">
                        Rencana Kas
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</li>
