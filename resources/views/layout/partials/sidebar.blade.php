<nav aria-label="Sidebar navigation">
    <header>
        <a href="/" class="btn-ghost p-2 h-12 w-full justify-start">
        <div class="bg-sidebar-primary text-sidebar-primary-foreground flex aspect-square size-8 items-center justify-center rounded-lg">
            
            <x-lucide-library class="h-4 w-4" />
        </div>
        <div class="grid flex-1 text-left text-sm leading-tight">
            <span class="truncate font-medium">Perpustakaan</span>
            <span class="truncate text-xs">Lorem, ipsum.</span>
        </div>
        </a>
    </header>
    <section class="scrollbar">
    <div role="group" aria-labelledby="group-label-content-1">
        <h3 id="group-label-content-1">Getting started</h3>
        <ul>
        <li>
            <a href="{{ route('dashboard') }}">
            <x-lucide-layout-dashboard class="w-4 h-4" />
            <span>Dashboard</span>
            </a>
        </li>
        <li>
            <details id="submenu-content-1-3">
            <summary aria-controls="submenu-content-1-3-content">
                <x-lucide-database class="w-4 h-4" />
                Masterdata
            </summary>
            <ul id="submenu-content-1-3-content">

                <li>
                <a href="{{ route('anggota.index') }}">
                    <span>Anggota</span>
                </a>
                </li>

                <li>
                <a href="{{ route('buku.index') }}">
                    <span>Buku</span>
                </a>
                </li>
            </ul>
            </details>
        </li>
        <li>
            <a href="{{ route('transaksi.index') }}">
            <x-lucide-wallet-cards class="w-4 h-4" />
            <span>Transaksi</span>
            </a>
        </li>
        </ul>
    </div>
    </section>
    <footer>
        <button class="btn-destructive" onclick="document.getElementById('logout-dialog').showModal()">Logout</button>
    </footer>
</nav>