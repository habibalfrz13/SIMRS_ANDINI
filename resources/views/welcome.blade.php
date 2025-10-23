<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Rumah Sakit</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md px-4 py-6">
        <h1 class="text-xl font-bold text-gray-700 mb-6">🏥 RS Dashboard</h1>

        <nav class="space-y-2">
            <a href="/" class="block px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
                🏠 Dashboard
            </a>
            <a href="/keuangan" class="block px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
                💰 Data Keuangan
            </a>
            <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200 text-gray-700 font-medium">
                🧾 Data Pasien
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        <header class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <h2 class="text-lg font-semibold text-gray-700">Dashboard Utama</h2>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md text-sm font-medium">
                Logout
            </button>
        </header>

        <!-- Content -->
        <main class="p-6">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Selamat Datang di Dashboard Rumah Sakit</h3>
                <p class="text-gray-600">Gunakan menu di sebelah kiri untuk melihat data keuangan, pasien, dan lainnya.</p>
            </div>
        </main>
    </div>
</body>
</html>
