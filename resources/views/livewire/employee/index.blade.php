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
                            <x-select.styled wire:model="branch_id" label="Extenssão *" :options="$query2"
                                option-value="key" option-label="value" searchable />
                            <x-select.styled wire:model="branch_organic_unit_id" label="Departamento *"
                                :options="$query3" option-value="key" option-label="value" searchable />
                            <x-select.styled wire:model="branch_department_id" label="Departamento *" :options="$query4"
                                option-value="key" option-label="value" searchable />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-select.styled wire:model="branch_partition_id" label="Partição *" :options="$query5"
                                option-value="key" option-label="value" searchable />
                            <x-select.styled wire:model="career_id" label="Carreira *" :options="$query6"
                                option-value="key" option-label="value" searchable />
                            <x-select.styled wire:model="category_id" label="Categoria *" :options="$query7"
                                option-value="key" option-label="value" searchable />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-select.styled wire:model="level_id" label="Nível *" :options="$query8" option-value="key"
                                option-label="value" searchable />
                            <x-select.styled wire:model="salary_level_id" label="Grupo Salarial *" :options="$query9"
                                option-value="key" option-label="value" searchable />
                        </div>

                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="name" label="Nome *" />
                            <x-input wire:model="birthdate" label="Data Nascimento *" />
                            <x-input wire:model="nationality" label="Nacionalidade *" />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="naturality" label="Naturalidade *" />
                            <x-input wire:model="bi_nr" label="BI *" />
                            <x-input wire:model="bi_validate" label="Validade *" />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="nuit" label="NUIT *" />
                            <x-input wire:model="father_name" label="Nome do Pai *" />
                            <x-input wire:model="mother_name" label="Nome Mãe *" />
                        </div>
                        <div class="grid gap-6 lg:grid-cols-3">
                            <x-input wire:model="email" label="E-mail *" />
                            <x-input wire:model="contact" label="Contacto *" />
                        </div>





                        <br>


                        <div class="mt-6 text-right justify">
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
                                NUIT</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                branch</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nome</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Carreira</th>
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
                                    class="hidden px-2 py-1 text-sm font-light text-center border dark:border-slate-400 lg:table-cell">
                                    {{ $count++ }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->nuit }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->branch->name }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->name }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->career->name }}</td>

                                <td class="px-1 py-3 text-sm font-light text-center border dark:border-slate-400">
                                    <!-- Actions Desktop -->
                                    <div class="items-center justify-center hidden gap-1 lg:flex">
                                        {{-- @if (Auth::user()->can($title . '.edit')) --}}
                                        <x-button md wire:click='' icon="clipboard" color="yellow" />
                                        {{-- @endif --}}
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
