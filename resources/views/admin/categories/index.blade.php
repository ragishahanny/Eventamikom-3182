@extends('layouts.admin')

@section('content')
<div class="p-6">

    <!-- Header -->
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Kategori</h1>
        <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
            + Tambah Kategori
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="w-full text-left">
            
            <!-- Head -->
            <thead class="bg-slate-100">
                <tr>
                    <th class="p-4">No</th>
                    <th class="p-4">Nama Kategori</th>
                    <th class="p-4 text-center">Aksi</th>
                </tr>
            </thead>

            <!-- Body -->
            <tbody>

                <tr class="border-t hover:bg-slate-50">
                    <td class="p-4">1</td>
                    <td class="p-4">Seminar</td>
                    <td class="p-4 text-center space-x-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Hapus</button>
                    </td>
                </tr>

                <tr class="border-t hover:bg-slate-50">
                    <td class="p-4">2</td>
                    <td class="p-4">Konser</td>
                    <td class="p-4 text-center space-x-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Hapus</button>
                    </td>
                </tr>

                <tr class="border-t hover:bg-slate-50">
                    <td class="p-4">3</td>
                    <td class="p-4">Workshop</td>
                    <td class="p-4 text-center space-x-2">
                        <button class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500">Edit</button>
                        <button class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">Hapus</button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>

</div>
@endsection