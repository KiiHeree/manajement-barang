<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">PT. Cokii</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'staff')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Kategori</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('kategoriIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Kategori</div>
                </a>
            </li>
            <!--Barang-->
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data Barang</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('barangIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Barang</div>
                </a>
            </li>
        @endif

        <!--Main Form-->
        @if (Auth::user()->role == 'staff' or Auth::user()->role == 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Main Form</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('pengirimanIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Pengiriman</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="{{ route('penerimaanIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Penerimaan</div>
                </a>
            </li>
        @endif
        <!--Riwayat Stok-->
        @if (Auth::user()->role == 'supervisor' || Auth::user()->role == 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Riwayat Stok</span>
            </li>
            <li class="menu-item ">
                <a href="{{ route('riwayatIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Riwayat Stok</div>
                </a>
            </li>
        @endif

        <!--Verifikasi-->
        @if (Auth::user()->role == 'supervisor')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Catatan Transaksi</span>
            </li>
            <li class="menu-item ">
                <a href="{{ route('catatanTransaksi') }}" class="menu-link">
                    <div data-i18n="Layouts">Catatan Transaksi</div>
                </a>
            </li>


            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Verifikasi</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('verifikasiPenerimaan') }}" class="menu-link">
                    <div data-i18n="Layouts">Verifikasi Penerimaan</div>
                </a>
            </li>
            <li class="menu-item ">
                <a href="{{ route('verifikasiPengiriman') }}" class="menu-link">
                    <div data-i18n="Layouts">Verifikasi Pengiriman</div>
                </a>
            </li>
        @elseif (Auth::user()->role == 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Catatan Transaksi</span>
            </li>
            <li class="menu-item ">
                <a href="{{ route('catatanTransaksi') }}" class="menu-link">
                    <div data-i18n="Layouts">Catatan Transaksi</div>
                </a>
            </li>
        @endif

        <!--Log Activity-->
        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'supervisor')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Log Aktivitas</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('logActivityIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Log Aktifitas</div>
                </a>
            </li>
        @endif

        <!--Data User-->
        @if (Auth::user()->role == 'admin')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Data User</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('userIndex') }}" class="menu-link">
                    <div data-i18n="Layouts">Data User</div>
                </a>
            </li>
        @endif

        <!--Data Laporan-->
        @if (Auth::user()->role == 'admin' or Auth::user()->role == 'supervisor')
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">Laporan</span>
            </li>

            <li class="menu-item ">
                <a href="{{ route('laporan') }}" class="menu-link">
                    <div data-i18n="Layouts">Laporan</div>
                </a>
            </li>
        @endif
    </ul>
</aside>
