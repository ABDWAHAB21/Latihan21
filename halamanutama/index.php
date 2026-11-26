


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <link rel="stylesheet" href="desain.css?v=3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="logo"><img src="asset/saya.png" alt="Foto Profil" loading="lazy"></div>
        <ul class="nav-links">
            <li><a href="#home" class="nav-link active">Home</a></li>
            <li><a href="#about" class="nav-link">About</a></li>
            <li><a href="#projects" class="nav-link">Projects</a></li>
            <li><a href="#contact" class="nav-link">Contact</a></li>
            <li><a href="../koneksi/login.php" class="nav-link">Login</a></li>
        </ul>
    </nav>
    <svg width="0" height="0" style="position:absolute" aria-hidden="true">
    <symbol id="i-kamar" viewBox="0 0 24 24"><path d="M3 18V8a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2v10M3 14h18M3 18v2M21 18v2M7 10h4"/></symbol>
    <symbol id="i-mandi" viewBox="0 0 24 24"><path d="M3 12h18v2a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5v-2ZM6 12V6a2 2 0 0 1 4 0M7 19l-1 2M17 19l1 2"/></symbol>
    <symbol id="i-tanah" viewBox="0 0 24 24"><path d="M4 9V4h5M20 9V4h-5M4 15v5h5M20 15v5h-5"/></symbol>
    <symbol id="i-bangunan" viewBox="0 0 24 24"><path d="M5 21V4h14v17M9 8h2M13 8h2M9 12h2M13 12h2M10 21v-4h4v4"/></symbol>
    </svg>

    <div class="wadah">

    <!-- TAB -->
    <div class="tab" role="tablist">
        <button role="tab" aria-selected="false">Ebony</button>
        <button role="tab" aria-selected="true">Walden</button>
        <button role="tab" aria-selected="false">Auckland</button>
    </div>

    <!-- DAFTAR CARD -->
    <div class="grid">

        <article class="card">
        <div class="card__gambar">
             <img src="asset/VERLINA1.jpeg" alt="Tipe L6">
            <span class="panah panah--kiri">‹</span>
            <span class="panah panah--kanan">›</span>
            <div class="titik"><span></span><span></span><span></span><span></span></div>
        </div>
        <div class="card__isi">
            <h3 class="card__tipe">Tipe L6</h3>
            <p class="card__label">Harga Mulai Dari</p>
            <p class="card__harga">Rp 1,7 Miliar</p>
            <ul class="spek">
            <li><svg><use href="#i-kamar"/></svg>3</li>
            <li><svg><use href="#i-mandi"/></svg>2</li>
            <li><svg><use href="#i-tanah"/></svg>72 m²</li>
            <li><svg><use href="#i-bangunan"/></svg>82 m²</li>
            </ul>
            <div class="aksi">
            <a class="btn btn--garis" href="#">Detail Unit</a>
            <a class="btn btn--isi" href="https://wa.me/628123456789">Booking</a>
            </div>
        </div>
        </article>

        <article class="card">
        <div class="card__gambar">
            <img src="asset/VERLINA1.jpeg" alt="Tipe L7">   
            <span class="panah panah--kiri">‹</span>
            <span class="panah panah--kanan">›</span>
            <div class="titik"><span></span><span></span><span></span><span></span></div>
        </div>
        <div class="card__isi">
            <h3 class="card__tipe">Tipe L7</h3>
            <p class="card__label">Harga Mulai Dari</p>
            <p class="card__harga">Rp 2,2 Miliar</p>
            <ul class="spek">
            <li><svg><use href="#i-kamar"/></svg>3</li>
            <li><svg><use href="#i-mandi"/></svg>3</li>
            <li><svg><use href="#i-tanah"/></svg>84 m²</li>
            <li><svg><use href="#i-bangunan"/></svg>100 m²</li>
            </ul>
            <div class="aksi">
            <a class="btn btn--garis" href="#">Detail Unit</a>
            <a class="btn btn--isi" href="https://wa.me/628123456789">Booking</a>
            </div>
        </div>
        </article>

        <article class="card">
        <div class="card__gambar">
            <img src="asset/VERLINA1.jpeg" alt="Tipe L8">
            <span class="panah panah--kiri"></span>
            <span class="panah panah--kanan"></span>
            <div class="titik"><span></span><span></span><span></span><span></span></div>
        </div>
        <div class="card__isi">
            <h3 class="card__tipe">Tipe L8</h3>
            <p class="card__label">Harga Mulai Dari</p>
            <p class="card__harga">Rp 3,4 Miliar</p>
            <ul class="spek">
            <li><svg><use href="#i-kamar"/></svg>3</li>
            <li><svg><use href="#i-mandi"/></svg>3</li>
            <li><svg><use href="#i-tanah"/></svg>120 m²</li>
            <li><svg><use href="#i-bangunan"/></svg>140 m²</li>
            </ul>
            <div class="aksi">
            <a class="btn btn--garis" href="#">Detail Unit</a>
            <a class="btn btn--isi" href="https://wa.me/628123456789">Booking</a>
            </div>
        </div>
        </article>

    </div>
    </div>

    <script>
    // Pindah tab (hanya mengubah gaya tab aktif; isi card bisa Anda ganti sendiri)
    document.querySelectorAll('.tab button').forEach(function (tombol) {
        tombol.addEventListener('click', function () {
        document.querySelectorAll('.tab button').forEach(function (t) {
            t.setAttribute('aria-selected', 'false');
        });
        tombol.setAttribute('aria-selected', 'true');
        });
    });

    document.querySelectorAll('.card__gambar').forEach(function (wadahGambar) {
        var gambar = wadahGambar.querySelector('img');
        var rotasiX = 0;
        var rotasiY = 0;
        var posisiAwalX = 0;
        var posisiAwalY = 0;
        var rotasiAwalX = 0;
        var rotasiAwalY = 0;

        wadahGambar.addEventListener('pointerdown', function (event) {
            if (event.button !== 0) return;

            posisiAwalX = event.clientX;
            posisiAwalY = event.clientY;
            rotasiAwalX = rotasiX;
            rotasiAwalY = rotasiY;
            wadahGambar.classList.add('is-dragging');
            wadahGambar.setPointerCapture(event.pointerId);
        });

        wadahGambar.addEventListener('pointermove', function (event) {
            if (!wadahGambar.hasPointerCapture(event.pointerId)) return;

            rotasiY = Math.max(-25, Math.min(25, rotasiAwalY + (event.clientX - posisiAwalX) * 0.4));
            rotasiX = Math.max(-18, Math.min(18, rotasiAwalX - (event.clientY - posisiAwalY) * 0.4));
            gambar.style.setProperty('--rotate-x', rotasiX + 'deg');
            gambar.style.setProperty('--rotate-y', rotasiY + 'deg');
        });

        function selesaiGeser(event) {
            if (wadahGambar.hasPointerCapture(event.pointerId)) {
                wadahGambar.releasePointerCapture(event.pointerId);
            }
            wadahGambar.classList.remove('is-dragging');
        }

        wadahGambar.addEventListener('pointerup', selesaiGeser);
        wadahGambar.addEventListener('pointercancel', selesaiGeser);
    });
</script>
</body>