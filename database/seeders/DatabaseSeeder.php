<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
public function run(): void
{
    // User Admin
    \App\Models\User::create([
        'name' => 'Admin Amikom',
        'email' => 'admin@amikom.ac.id',
        'password' => bcrypt('password'),
    ]);

    // Kategori
    $kategori1 = \App\Models\Category::create([
        'name' => 'Seminar IT',
        'slug' => 'seminar-it',
    ]);

    $kategori2 = \App\Models\Category::create([
        'name' => 'Entertainment',
        'slug' => 'entertainment',
    ]);

    $kategori3 = \App\Models\Category::create([
        'name' => 'Bisnis',
        'slug' => 'bisnis',
    ]);

    // Event (6 data)
    \App\Models\Event::create([
        'category_id' => $kategori1->id,
        'title' => 'UI/UX Masterclass',
        'description' => 'Belajar desain UI/UX dari dasar hingga mahir.',
        'date' => '2026-05-01 10:00:00',
        'location' => 'Lab Komputer',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-1.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $kategori1->id,
        'title' => 'Web Development Bootcamp',
        'description' => 'Pelatihan membuat website modern.',
        'date' => '2026-05-02 10:00:00',
        'location' => 'Lab Programming',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-2.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $kategori2->id,
        'title' => 'E-Sport U-Champ',
        'description' => 'Turnamen e-sport antar mahasiswa.',
        'date' => '2026-05-03 10:00:00',
        'location' => 'Auditorium',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-3.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $kategori2->id,
        'title' => 'Music Festival',
        'description' => 'Festival musik meriah dengan berbagai band.',
        'date' => '2026-05-04 18:00:00',
        'location' => 'Lapangan Kampus',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-4.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $kategori3->id,
        'title' => 'Digital Marketing Seminar',
        'description' => 'Strategi marketing di era digital.',
        'date' => '2026-05-05 13:00:00',
        'location' => 'Ruang Seminar',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-5.png',
    ]);

    \App\Models\Event::create([
        'category_id' => $kategori3->id,
        'title' => 'Startup Pitching Day',
        'description' => 'Presentasi ide bisnis startup.',
        'date' => '2026-05-06 13:00:00',
        'location' => 'Inkubator Bisnis',
        'price' => 50000,
        'stock' => 100,
        'poster_path' => 'posters/event-6.png',
    ]);
}