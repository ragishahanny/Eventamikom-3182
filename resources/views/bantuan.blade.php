<!-- File: resources/views/bantuan.blade.php -->
<!DOCTYPE html>
<html lang="id">

<head>
    <title>Bantuan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-xl shadow-lg border border-slate-200 text-center max-w-sm w-full">
        <h1 class="text-2xl font-bold text-slate-800 mb-2">FAQ - Bantuan</h1>
        <p class="text-slate-500 mb-6">Berikut adalah beberapa pertanyaan yang sering diajukan:</p>
        <ul class="text-left text-slate-500 mb-6">
            <li><strong>1. Bagaimana cara mendaftar event?</strong><br>Untuk mendaftar event, klik tombol 'Daftar' di halaman Event.</li>
            <li><strong>2. Apakah ada biaya untuk mengikuti event?</strong><br>Biaya bervariasi tergantung event, cek info di masing-masing event.</li>
            <li><strong>3. Bagaimana cara menghubungi penyelenggara?</strong><br>Kamu bisa menghubungi penyelenggara melalui email yang tertera pada halaman event.</li>
        </ul>
        
        <a href="{{ url('/') }}" class="inline-block bg-indigo-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-indigo-700 hover:shadow-md transition duration-300">
            Kembali ke Home
        </a>
    </div>
</body>

</html>