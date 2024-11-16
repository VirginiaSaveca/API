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

    <div class="bg-white shadow-sm  sm:rounded-lg">
        <div class="p-6 text-gray-900">
            {{ __("You're logged in!") }}
        </div>
    </div>
</x-app-layout>
