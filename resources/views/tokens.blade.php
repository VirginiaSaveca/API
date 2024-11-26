<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-2 text-xl font-semibold leading-tight text-gray-800">
            Gestão de Tokens API
        </h2>

        <ul class="flex items-center text-sm">
            <li class="mr-2">
                <a href="#" class="font-medium text-gray-400 hover:text-gray-600">Dashboard</a>
            </li>
            <li class="mr-2 font-medium text-gray-600">/</li>
            <li class="mr-2 font-medium text-gray-600">Tokens</li>
        </ul>
    </x-slot>

    <livewire:tokens />
</x-app-layout>
