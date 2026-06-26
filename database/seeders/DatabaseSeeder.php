<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
use App\Models\User; // Ditambahkan sesuai instruksi
use App\Models\Category;
use App\Models\Event;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. User Admin (Sudah ditambahkan kolom role)
        User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Kategori
        $kategori1 = Category::create([
            'name' => 'Seminar IT',
            'slug' => 'seminar-it',
        ]);

        $kategori2 = Category::create([
            'name' => 'Entertainment',
            'slug' => 'entertainment',
        ]);

        $kategori3 = Category::create([
            'name' => 'Bisnis',
            'slug' => 'bisnis',
        ]);

        // 3. Event (6 data)
        Event::create([
            'category_id' => $kategori1->id,
            'title' => 'UI/UX Masterclass',
            'description' => 'Belajar desain UI/UX dari dasar hingga mahir.',
            'date' => '2026-05-01 10:00:00',
            'location' => 'Lab Komputer',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-1.png',
        ]);

        Event::create([
            'category_id' => $kategori1->id,
            'title' => 'Web Development Bootcamp',
            'description' => 'Pelatihan membuat website modern.',
            'date' => '2026-05-02 10:00:00',
            'location' => 'Lab Programming',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-2.png',
        ]);

        Event::create([
            'category_id' => $kategori2->id,
            'title' => 'E-Sport U-Champ',
            'description' => 'Turnamen e-sport antar mahasiswa.',
            'date' => '2026-05-03 10:00:00',
            'location' => 'Auditorium',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-3.png',
        ]);

        Event::create([
            'category_id' => $kategori2->id,
            'title' => 'Music Festival',
            'description' => 'Festival musik meriah dengan berbagai band.',
            'date' => '2026-05-04 18:00:00',
            'location' => 'Lapangan Kampus',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-4.png',
        ]);

        Event::create([
            'category_id' => $kategori3->id,
            'title' => 'Digital Marketing Seminar',
            'description' => 'Strategi marketing di era digital.',
            'date' => '2026-05-05 13:00:00',
            'location' => 'Ruang Seminar',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-5.png',
        ]);

        Event::create([
            'category_id' => $kategori3->id,
            'title' => 'Startup Pitching Day',
            'description' => 'Presentasi ide bisnis startup.',
            'date' => '2026-05-06 13:00:00',
            'location' => 'Inkubator Bisnis',
            'price' => 50000,
            'stock' => 100,
            'poster_path' => 'posters/event-6.png',
        ]);
=======
use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction; // <-- Import model Transaksi

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. User Admin (Menggunakan updateOrCreate agar bebas error duplicate entry)
        $admin = User::updateOrCreate(
            ['email' => 'admin@amikom.ac.id'],
            [
                'name' => 'Admin Amikom',
                'password' => bcrypt('password'),
            ]
        );

        // 2. Kategori (Menggunakan updateOrCreate agar aman)
        $kategori1 = Category::updateOrCreate(
            ['slug' => 'seminar-it'],
            ['name' => 'Seminar IT']
        );

        $kategori2 = Category::updateOrCreate(
            ['slug' => 'entertainment'],
            ['name' => 'Entertainment']
        );

        $kategori3 = Category::updateOrCreate(
            ['slug' => 'bisnis'],
            ['name' => 'Bisnis']
        );

        // 3. Event (Simpan ke variabel untuk relasi transaksi nanti)
        $event1 = Event::updateOrCreate(
            ['title' => 'UI/UX Masterclass'],
            [
                'category_id' => $kategori1->id,
                'description' => 'Belajar desain UI/UX dari dasar hingga mahir.',
                'date' => '2026-05-01 10:00:00',
                'location' => 'Lab Komputer',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-1.png',
            ]
        );

        $event2 = Event::updateOrCreate(
            ['title' => 'Web Development Bootcamp'],
            [
                'category_id' => $kategori1->id,
                'description' => 'Pelatihan membuat website modern.',
                'date' => '2026-05-02 10:00:00',
                'location' => 'Lab Programming',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-2.png',
            ]
        );

        $event3 = Event::updateOrCreate(
            ['title' => 'E-Sport U-Champ'],
            [
                'category_id' => $kategori2->id,
                'description' => 'Turnamen e-sport antar mahasiswa.',
                'date' => '2026-05-03 10:00:00',
                'location' => 'Auditorium',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-3.png',
            ]
        );

        Event::updateOrCreate(
            ['title' => 'Music Festival'],
            [
                'category_id' => $kategori2->id,
                'description' => 'Festival musik meriah dengan berbagai band.',
                'date' => '2026-05-04 18:00:00',
                'location' => 'Lapangan Kampus',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-4.png',
            ]
        );

        Event::updateOrCreate(
            ['title' => 'Digital Marketing Seminar'],
            [
                'category_id' => $kategori3->id,
                'description' => 'Strategi marketing di era digital.',
                'date' => '2026-05-05 13:00:00',
                'location' => 'Ruang Seminar',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-5.png',
            ]
        );

        Event::updateOrCreate(
            ['title' => 'Startup Pitching Day'],
            [
                'category_id' => $kategori3->id,
                'description' => 'Presentasi ide bisnis startup.',
                'date' => '2026-05-06 13:00:00',
                'location' => 'Inkubator Bisnis',
                'price' => 50000,
                'stock' => 100,
                'poster_path' => 'posters/event-6.png',
            ]
        );

        // 4. KELOLA DATA DUMMY TRANSAKSI (Sesuai Struktur Kolom phpMyAdmin Kamu)
        Transaction::updateOrCreate(
            ['order_id' => 'TRX-99210'],
            [
                'event_id' => $event1->id,
                'customer_name' => 'Donni Prabowo',
                'customer_email' => 'donni.prabowo@gmail.com',
                'customer_phone' => '081234567890',
                'total_price' => 50000,
                'status' => 'success', // atau 'settlement'
                'snap_token' => null,
            ]
        );

        Transaction::updateOrCreate(
            ['order_id' => 'TRX-99211'],
            [
                'event_id' => $event2->id,
                'customer_name' => 'Ragisha Hanny',
                'customer_email' => 'ragisha@amikom.ac.id',
                'customer_phone' => '089876543210',
                'total_price' => 50000,
                'status' => 'success',
                'snap_token' => null,
            ]
        );

        Transaction::updateOrCreate(
            ['order_id' => 'TRX-99212'],
            [
                'event_id' => $event3->id,
                'customer_name' => 'Budi Setiawan',
                'customer_email' => 'budi@gmail.com',
                'customer_phone' => '085612345678',
                'total_price' => 50000,
                'status' => 'pending', // Contoh status pending
                'snap_token' => null,
            ]
        );
>>>>>>> 440e3712f0829491744ee11e10f611ed02f6dcac
    }
}