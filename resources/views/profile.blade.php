<x-app-layout>
    <x-slot name="header">
        <h2 class="mb-2 text-xl font-semibold leading-tight text-gray-800">
            Profile
        </h2>
    </x-slot>


    <div class="space-y-6">
        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-profile-information-form />
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.update-password-form />
            </div>
        </div>

        <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
            <div class="max-w-xl">
                <livewire:profile.delete-user-form />
            </div>
        </div>
    </div>
</x-app-layout>
