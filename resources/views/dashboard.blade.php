<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-2 text-xl font-semibold leading-tight text-gray-800">
            Dashboard
        </h2>

        <ul class="flex items-center text-sm">
            <li class="mr-2">
                <a href="#" class="font-medium text-gray-400 hover:text-gray-600">Dashboard</a>
            </li>
            <li class="mr-2 font-medium text-gray-600">/</li>
            <li class="mr-2 font-medium text-gray-600">Visão geral</li>
        </ul>
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Cartão de Funcionários -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Funcionários</h2>
            <p class="text-3xl font-bold text-blue-600">{{ $employees_count }}</p>
            <p class="text-sm text-gray-500 mt-1">Total de funcionários</p>
        </div>

        <!-- Cartão de Filiais -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Extensões</h2>
            <p class="text-3xl font-bold text-green-600">{{ $branches_count }}</p>
            <p class="text-sm text-gray-500 mt-1">Número de extensões</p>
        </div>

        <!-- Cartão de Utilizadores -->
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-2">Utilizadores</h2>
            <p class="text-3xl font-bold text-purple-600">{{ $users_count }}</p>
            <p class="text-sm text-gray-500 mt-1">Utilizadores registados</p>
        </div>
    </div>
</x-app-layout>
