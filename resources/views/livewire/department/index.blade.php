<div class="px-2 sm:px-6 lg:px-8">
    @if ($showForm == true)
        <form wire:submit="{{ $id ? 'update' : 'store' }}">
            <div class="flex flex-col gap-6">
                <x-card>
                    <x-slot:header>
                        ...
                    </x-slot:header>
                    <div class="p-6">
                        <div class="grid lg:grid-cols-3 gap-6">
                            <x-input wire:model="name" label="Nome *" />
                            <x-select.styled wire:model="organic_unit_id" label="Unidade Orgânica *"
                                hint="Selecione uma opção" :options="$organicUnits" option-value="key" option-label="value" />
                        </div>

                        <br>
                        <x-card>
                            <x-slot:header>
                                <div>
                                    Adicionar Extenssão
                                </div>
                            </x-slot:header>

                            <div class="p-6">
                                <div class="justify text-left">
                                    <x-button md wire:click.prevent='addRow' text="+" color="sky" />
                                </div>
                                <div class="border-t-2 border-gray-400 h-1 dark:border-gray-500"></div>

                                @foreach ($rows as $index => $row)
                                    <div class="flex py-2 border-b">
                                        <div class="flex-1 px-1">
                                            <div class="form-group col-sm-3 input-primary">
                                                <div class="form-group">
                                                    <select name="exam_id"
                                                        wire:model="rows.{{ $index }}.branch_id"
                                                        class="block w-full p-2 border rounded-md bg-white dark:bg-gray-800 text-black dark:text-white">
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

                                        <div class="px-1 w-20 text-right">
                                            <x-button md wire:click.prevent='removeRow({{ $index }})'
                                                text="-" color="red" />
                                        </div>

                                    </div>
                                @endforeach

                            </div>
                        </x-card>


                        <div class="justify mt-6 text-right">
                            <x-button md text="{{ $id ? 'Actualizar' : 'Salvar' }}" color="blue" />
                            <x-button md wire:click="cancel" text="Cancelar" color="yellow" />
                        </div>

                </x-card>

                <!-- end card -->

            </div>
        </form>
    @endif

    <div class="flex flex-col gap-6 mt-6">
        <x-card>
            <x-slot:header>
                <div class="flex flex-wrap justify-between items-center gap-1">
                    <h4>...</h4>
                </div>
            </x-slot:header>
            <div class="px-6 justify text-right">
                <x-button md wire:click="create" icon="plus" text="Adicionar" color="blue" />
            </div>
            <div class="p-6">
                <div class="flex flex-wrap justify-between items-center py-2">
                </div>

                <table class="w-full shadow-md">
                    <thead
                        class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                        <tr>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Id</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nome</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Unidade Organica</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 hidden lg:table-cell">
                                <div class="hidden lg:inline-block">Ações</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count = 1 @endphp
                        @foreach ($query as $key => $value)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/70 dark:text-slate-300">
                                <td
                                    class="border dark:border-slate-400 py-1 px-2 font-light text-sm text-center hidden lg:table-cell">
                                    {{ $count++ }}</td>
                                <td
                                    class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">
                                    {{ $value->name }}</td>
                                <td
                                    class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">
                                    {{ $value->organicUnit->name }}</td>
                                <td class="border dark:border-slate-400 py-3 px-1 font-light text-sm text-center">
                                    <!-- Actions Desktop -->
                                    <div class="lg:flex justify-center items-center gap-1 hidden">

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
            <div class="py-4 px-3">
            </div>
        </x-card>

    </div>

</div>
