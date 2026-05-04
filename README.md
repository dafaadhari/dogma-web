DOGMA - Diskusi Obrolan Gerakan Bersama
📌 Tentang DOGMA
DOGMA adalah sebuah platform profil komunitas yang didirikan pada 25 April 2026 di Rangkasbitung. Proyek ini hadir sebagai jawaban atas keresahan mengenai minimnya ruang diskusi ilmiah dan edukasi di tengah masyarakat. Melalui wadah ini, mahasiswa, akademisi, dan pekerja berkumpul untuk membedah isu, memberikan kritik membangun, dan melahirkan solusi nyata.

🚀 Fitur Utama
Landing Page Modern: Desain minimalis dan profesional menggunakan Tailwind CSS.

Daftar Diskusi Dinamis: Menampilkan jadwal diskusi mendatang yang diambil langsung dari database.

Desain Responsif: Optimal diakses melalui berbagai perangkat (Mobile, Tablet, Desktop).

Integrasi WhatsApp: Form pendaftaran anggota yang terhubung langsung dengan admin.

SEO & Open Graph: Sudah dilengkapi meta tags untuk kartu preview media sosial yang menarik.

🛠️ Teknologi yang Digunakan
Framework: Laravel 11.

Frontend: Tailwind CSS & Vite.

Database: MySQL.

Server: PHP 8.2+.

💻 Instalasi Lokal
Jika ingin menjalankan proyek ini di lingkungan lokal, ikuti langkah berikut:

Clone Repository:

Bash
git clone https://github.com/username-boss/dogma-web.git
cd dogma-web
Instalasi Dependency:

Bash
composer install
npm install
Konfigurasi Environment:
Salin file .env.example menjadi .env dan sesuaikan pengaturan database Anda.

Bash
cp .env.example .env
php artisan key:generate
Migrasi & Seed:

Bash
php artisan migrate --seed
Jalankan Server:

Bash
npm run dev
# Buka terminal baru
php artisan serve
🌐 Deployment
Proyek ini dikonfigurasi untuk berjalan di shared hosting (seperti InfinityFree) dengan struktur:

Pemanfaatan .htaccess untuk membelokkan traffic ke folder public.

Penggunaan npm run build untuk memproses aset statis.

🤝 Kontribusi
Kami mengundang siapa saja untuk berkontribusi dalam pengembangan platform ini demi memperluas ruang diskusi edukatif di masyarakat.

DOGMA - Rangkasbitung, Banten.
