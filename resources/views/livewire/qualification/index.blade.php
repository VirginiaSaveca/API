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
                            <x-select.styled wire:model="employee_id" label="Funcionário * *" :options="$query2"
                                option-value="key" option-label="value" searchable />

                            <x-input wire:model="training_area" label="Area de Formação *" />

                            <x-select.styled wire:model="level" label="Nível Academico *" hint="Selecione uma opção"
                                :options="[
                                    [
                                        'label' => 'Nível Médio',
                                        'value' => 'Nível Médio',
                                        'description' => 'Educação inicial que abrange desde o ensino primário.',
                                    ],
                                    [
                                        'label' => 'Nivel básico',
                                        'value' => 'Nivel básico',
                                        'description' => 'Ensino secundário ou uma formação de nível médio',
                                    ],
                                    [
                                        'label' => 'Nível Superior',
                                        'value' => 'Nível Superior',
                                        'description' => 'Ensino Superior',
                                    ],
                                    ['label' => 'Mestrado', 'value' => 'Mestrado', 'description' => 'Mestrado ou MBA'],
                                    [
                                        'label' => 'Doutoramento',
                                        'value' => 'Doutoramento',
                                        'description' => 'Doutorando',
                                    ],
                                    [
                                        'label' => 'Especializações',
                                        'value' => 'Especializações',
                                        'description' =>
                                            'Alguma especialização feita que abranja no perfil do funcionário',
                                    ],
                                ]" select="label:label|value:value" />
                            <x-input wire:model="year" label="Ano de Qualificação *" />
                            <x-input wire:model="place" label="Local de formação *" />
                            <x-input wire:model="obs" label="Observação *" />
                        </div>
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

    <div class="flex flex-col gap-6">
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
                                Id</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nome do Funcionário</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Area de Formação</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Nivel Academico</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Ano de Formação</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Local de Formação</th>
                            <th
                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">
                                Obervações</th>

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
                                    {{ $value->employee->name }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->training_area }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->level }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->year }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->place }}</td>
                                <td
                                    class="hidden px-2 py-1 text-sm font-light border dark:border-slate-400 lg:table-cell">
                                    {{ $value->obs }}</td>

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
