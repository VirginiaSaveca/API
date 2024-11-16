<div class="m-0">
    @if ($showForm == true)
        <form wire:submit="{{ $id ? 'update' : 'store' }}" class="mb-6">
            <div class="flex flex-col gap-6">
                <x-card>
                    <x-slot:header>
                        ...
                    </x-slot:header>
                    <div class="p-6">

                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="name" label="Nome *" />
                        </div>

                        <br>
                        <x-card>
                            <x-slot:header>
                                <div>
                                    Adicionar Extenssão
                                </div>
                            </x-slot:header>

                            <div class="p-6">
                                <div class="text-left justify">
                                    <x-button md wire:click.prevent='addRow' text="+" color="sky" />
                                </div>
                                <div class="h-1 border-t-2 border-gray-400 dark:border-gray-500"></div>

                                @foreach ($rows as $index => $row)
                                    <div class="flex py-2 border-b">
                                        <div class="flex-1 px-1">
                                            <div class="form-group col-sm-3 input-primary">
                                                <div class="form-group">
                                                    <select name="exam_id"
                                                        wire:model="rows.{{ $index }}.branch_id"
                                                        class="block w-full p-2 text-black bg-white border rounded-md dark:bg-gray-800 dark:text-white">
                                                        <option value="">Seleccione</option>
                                                        @foreach ($query2 as $value)
                                                            <option value="{{ $value->id }}"
                                                                @if (isset($edit)) {{ $edit->id == $value->branch_id ? 'selected' : '' }} @endif>
                                                                {{ $value->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('branch_id')
                                                    <p class="text-danger">{{ $message }} </p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="w-20 px-1 text-right">
                                            <x-button md wire:click.prevent='removeRow({{ $index }})'
                                                text="-" color="red" />
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </x-card>

                        <div class="mt-6 text-right justify">
                            <x-button md text="{{ $id ? 'Actualizar' : 'Salvar' }}" color="blue" />
                            <x-button md wire:click="cancel" text="Cancelar" color="yellow" />
                        </div>

                </x-card>

                <!-- end card -->

            </div>
        </form>
    @endif

    <div class="flex flex-col gap-6 ">
        <x-card>
            <x-slot:header>
                <div class="flex flex-wrap items-center justify-between gap-1">
                    <h4>...</h4>
                </div>
            </x-slot:header>
            <div class="px-6 text-right justify">
                <x-button md wire:click="create" icon="plus" text="Adicionar" color="blue" />
            </div>
            <div class="p-6">
                <div class="flex flex-wrap items-center justify-between py-2">
                </div>

                <table class="w-full shadow-md">
                    <thead
                        class="border-t divide-gray-300 bg-slate-300 bg-opacity-20 dark:bg-slate-800 dark:border-gray-700">
                        <tr>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                ...</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nome</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 hidden lg:table-cell text-center">
                                <div class="hidden lg:inline-block">Ações</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1 @endphp
                        @foreach ($query as $key => $value)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/70 dark:text-slate-300">
                                <td
                                    class="hidden px-2 py-1 text-sm font-light text-center border dark:border-slate-400 lg:table-cell">
                                    {{ $count++ }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->name }}</td>
                                <td class="px-1 py-3 text-sm font-light text-center border dark:border-slate-400">
                                    <!-- Actions Desktop -->
                                    <div class="items-center justify-center hidden gap-1 lg:flex">

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
            <div class="px-3 py-4">
            </div>
        </x-card>

    </div>

</div>
