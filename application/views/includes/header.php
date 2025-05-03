<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DrugSafe - Gerenciamento de Remédios</title>

    <!-- Fonte e Tailwind -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap (caso precise em algum componente específico) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 text-gray-800">

    <!-- Navbar fixa no topo -->
    <header class="bg-white shadow-sm fixed w-full z-10 top-0 left-0">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold text-indigo-600">DrugSafe</h1>
            <button id="menu-toggle" class="md:hidden text-gray-700 hover:text-indigo-600 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
            <nav id="menu" class="hidden md:flex space-x-4">
                <a href="<?= site_url('/') ?>" class="text-gray-700 hover:text-indigo-600 font-semibold">Início</a>
                <a href="<?= site_url('dashboard') ?>" class="text-gray-700 hover:text-indigo-600 font-semibold">Dashboard</a>
                <a href="<?= site_url('remedios/adicionar') ?>" class="text-gray-700 hover:text-indigo-600 font-semibold">Adicionar</a>
                <a href="<?= site_url('interacao') ?>" class="text-gray-700 hover:text-indigo-600 font-semibold">Interações</a>
                <div class="relative">
                    <button id="medico-toggle" class="text-gray-700 hover:text-indigo-600 font-semibold focus:outline-none">Médico</button> <!-- NOVO MENU AQUI -->
                    <div id="medico-menu" class="absolute hidden bg-white shadow-lg rounded-md mt-2">
                        <a href="<?= site_url('hospital/cadastrar') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Cadastrar Hospital</a>
                        <a href="<?= site_url('hospital') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Listar Hospitais</a>
                    </div>
                </div>
            </nav>
        </div>

        <div id="mobile-menu" class="hidden md:hidden bg-white shadow-sm">
            <a href="<?= site_url('/') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Início</a>
            <a href="<?= site_url('dashboard') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Dashboard</a>
            <a href="<?= site_url('remedios/adicionar') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Adicionar</a>
            <a href="<?= site_url('interacao') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Interações</a>
            <a href="<?= site_url('medico') ?>" class="block px-4 py-2 text-gray-700 hover:text-indigo-600 font-semibold">Médico</a> <!-- NOVO MOBILE MENU AQUI -->
        </div>
    </header>


    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
        const medicoToggle = document.getElementById('medico-toggle');
        const medicoMenu = document.getElementById('medico-menu');

        medicoToggle.addEventListener('click', () => {
            medicoMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!medicoToggle.contains(event.target) && !medicoMenu.contains(event.target)) {
                medicoMenu.classList.add('hidden');
            }
        });
    </script>

    <!-- Espaço para compensar navbar fixa -->
    <div class="pt-20"></div>