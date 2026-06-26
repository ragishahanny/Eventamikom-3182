@extends('layouts.admin')

@section('content')
<div class="p-6" x-data="{ openAddModal: false, openEditModalId: null }">

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-slate-800">Manajemen Partner</h1>
        <button @click="openAddModal = true" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition">
            + Tambah Partner
        </button>
    </div>

    <div class="mb-6 max-w-md">
        <form action="{{ route('admin.partners.index') }}" method="GET" class="flex gap-2">
            <div class="relative flex-1">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama partner..." 
                       class="w-full pl-4 pr-10 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 text-sm">
                @if(request('search'))
                    <a href="{{ route('admin.partners.index') }}" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 font-bold text-sm">
                        &times;
                    </a>
                @endif
            </div>
            <button type="submit" class="bg-slate-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-slate-700 transition">
                Cari
            </button>
        </form>
    </div>

    <div class="bg-white shadow-md rounded-xl overflow-hidden">
        <table class="w-full text-left border-collapse">
            <thead class="bg-slate-100 border-b border-slate-200">
                <tr>
                    <th class="p-4 font-semibold text-slate-700">ID</th>
                    <th class="p-4 font-semibold text-slate-700">Logo</th>
                    <th class="p-4 font-semibold text-slate-700">Nama Partner</th>
                    <th class="p-4 font-semibold text-slate-700">Terdaftar Pada</th>
                    <th class="p-4 font-semibold text-slate-700 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($partners as $partner)
                    <tr class="border-t hover:bg-slate-50 transition">
                        <td class="p-4 text-slate-600">{{ $partner->id }}</td>
                        <td class="p-4">
                            @if($partner->logo_url)
                                <img src="{{ $partner->logo_url }}" alt="Logo {{ $partner->name }}" class="w-12 h-12 object-contain rounded border bg-slate-50 p-1">
                            @else
                                <div class="w-12 h-12 bg-slate-100 rounded border flex items-center justify-center text-[10px] text-slate-400 font-medium">No Logo</div>
                            @endif
                        </td>
                        <td class="p-4 font-medium text-slate-800">{{ $partner->name }}</td>
                        <td class="p-4 text-slate-500 text-sm">{{ $partner->created_at->format('d M Y H:i') }}</td>
                        <td class="p-4 text-center space-x-2">
                            <button @click="openEditModalId = {{ $partner->id }}" class="bg-yellow-400 px-3 py-1 rounded text-white hover:bg-yellow-500 transition shadow-sm text-sm">
                                Edit
                            </button>
                            
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus partner {{ $partner->name }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600 transition shadow-sm text-sm">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-slate-400">Belum ada data partner bisnis.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @foreach($partners as $partner)
        <div x-show="openEditModalId === {{ $partner->id }}" 
             class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
             x-transition style="display: none;">
            <div class="bg-white rounded-xl shadow-xl max-w-md w-full overflow-hidden" @click.away="openEditModalId = null">
                <div class="p-6 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                    <h3 class="text-lg font-bold text-slate-800">Edit Data Partner</h3>
                    <button @click="openEditModalId = null" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
                </div>
                <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Nama Partner</label>
                        <input type="text" name="name" value="{{ $partner->name }}" required
                               class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-700 mb-2">Ganti Logo Partner (Opsional)</label>
                        <input type="file" name="logo" accept="image/*"
                               class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                    </div>
                    <div class="flex justify-end space-x-2">
                        <button type="button" @click="openEditModalId = null" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded-lg hover:bg-yellow-600 transition">Perbarui</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

    <div x-show="openAddModal" 
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50"
         x-transition style="display: none;">
        <div class="bg-white rounded-xl shadow-xl max-w-md w-full overflow-hidden" @click.away="openAddModal = false">
            <div class="p-6 border-b border-slate-200 flex justify-between items-center bg-slate-50">
                <h3 class="text-lg font-bold text-slate-800">Tambah Partner Baru</h3>
                <button @click="openAddModal = false" class="text-slate-400 hover:text-slate-600 text-xl font-bold">&times;</button>
            </div>
            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Nama Partner</label>
                    <input type="text" name="name" placeholder="Contoh: PT. Amikom Media" required
                           class="w-full px-3 py-2 border border-slate-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-slate-700 mb-2">Logo Partner</label>
                    <input type="file" name="logo" accept="image/*"
                           class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                </div>
                <div class="flex justify-end space-x-2">
                    <button type="button" @click="openAddModal = false" class="px-4 py-2 bg-slate-200 text-slate-700 rounded-lg hover:bg-slate-300 transition">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection