<dialog id="alert-dialog" class="dialog" aria-labelledby="alert-dialog-title" aria-describedby="alert-dialog-description">
    <div>
        <header>
        <h2 id="alert-dialog-title">Keluar dari akun?</h2>
        <p id="alert-dialog-description">Anda akan keluar dari sistem perpustakaan. Pastikan semua pekerjaan sudah disimpan.</p>
        </header>

        <footer class="flex justify-between">
        <button class="btn-outline" onclick="document.getElementById('alert-dialog').close()">Batal</button>
        <a href="{{ route('logout') }}" class="btn-destructive" >Logout</a>
        </footer>
    </div>
</dialog>