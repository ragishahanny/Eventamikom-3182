<!-- File: resources/views/katalog.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Daftar Event Katalog</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-slate-200 text-center max-w-sm w-full">
        <h1 class="text-2xl font-bold text-slate-800 mb-2">Daftar Event AmikomEventHub</h1>
        <p class="text-slate-500 mb-6">Berikut adalah daftar event yang akan datang:</p>
        <ul class="text-left text-slate-500 mb-6">
            <li>Event 1 - Workshop Web Development</li>
            <li>Event 2 - Seminar Cloud Computing</li>
            <li>Event 3 - Coding Bootcamp</li>
        </ul>
        
        <a href="{{ url('/') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
            Kembali ke Home
        </a>
    </div>
</body>

</html>