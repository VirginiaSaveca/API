<div class="m-0">
    @if ($showForm)
        <div class="flex flex-col gap-6">
            <x-card>
                <x-slot:header>
                    {{ isset($id) ? 'Atualizar' : 'Adicionar' }}
                </x-slot:header>
                <div class="p-6">
                    <form wire:submit="{{ isset($id) ? 'update' : 'store' }}">
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="name" label="Nome *" />

                            <x-input wire:model="address" label="Endereço *" />

                            <div class="mt-6 justify">
                                <x-button type="submit" md text="{{ $id ? 'Actualizar' : 'Salvar' }}"
                                    class="text-white bg-blue-500 hover:bg-blue-700" />
                                <x-button md wire:click="cancel" text="Cancelar" color="yellow" />
                            </div>
                        </div>
                    </form>
                </div>
            </x-card>
        </div>
    @endif


    <div class="flex flex-col gap-6 mt-6">
        <x-card>
            <x-slot:header>
                <div class="flex flex-wrap items-center justify-between gap-1">
                    <h4>Extensão</h4>
                </div>
            </x-slot:header>
            <div class="px-6 text-right justify">
                <x-button md wire:click="create" icon="plus" text="Adicionar" color="blue" />
            </div>

            <div class="p-6">
                <table class="w-full shadow-md">
                    <thead
                        class="border-t divide-gray-300 bg-slate-300 bg-opacity-20 dark:bg-slate-800 dark:border-gray-700">
                        <tr>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                            </th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nome</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Endereço</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 lg:table-cell">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($query as $key => $value)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/70 dark:text-slate-300">
                                <td
                                    class="py-1 text-sm font-light text-center border x-2 dark:border-slate-400 lg:table-cell">
                                    {{ $value->id }}</td>
                                <td class="px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->name }}</td>
                                <td class="px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->address }}</td>
                                <td class="px-1 py-3 text-sm font-light text-center border dark:border-slate-400">
                                    <!-- Actions Desktop -->
                                    <div class="items-center justify-center gap-1 lg:flex">
                                        {{-- @if (Auth::user()->can($title . '.edit')) --}}
                                        <x-button md wire:click='edit({{ $value->id }})' icon="pencil-square"
                                            color="blue" />
                                        {{-- @endif --}}
                                        {{-- @if (Auth::user()->can($title . '.destroy')) --}}
                                        <x-button md wire:click='deleteConfirm({{ $value->id }})' icon="trash"
                                            color="red" />
                                        {{-- @endif --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-card>
    </div>
</div>
