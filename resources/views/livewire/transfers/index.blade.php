<div>
@if ($showForm == true)
  <form wire:submit="{{ $id ? 'update' : 'store' }}">
    <div class="flex flex-col gap-6">
        <x-card>
            <x-slot:header>
                ...
            </x-slot:header>
            <div class="p-6">
            <div class="grid lg:grid-cols-3 gap-6">
            <x-select.styled 
                                        wire:model="employee_id" 
                                        label="Funcionário * *"
                                        :options="$query2" 
                                        option-value="key" 
                                        option-label="value"
										searchable
                                    />
								
                <x-input wire:model="to" label="Transferido para *" />

             
                <x-input hint="MM/DD/YYYY" wire:model="date" label="Data da transferencia *" />
                        
			</div>
            </div>
	        <br>
				
		<div class="justify mt-6 text-right">
            <x-button md text="{{ $id ? 'Actualizar' : 'Salvar' }}" color="blue"/>
            <x-button md wire:click="cancel" text="Cancelar" color="yellow" />
        </div>
					
        </x-card>

        <!-- end card -->

    </div>
	
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
                            <x-button md wire:click="create" icon="plus" text="Adicionar" color="blue"/>
                    </div>
                <div class="p-6">
                    <div class="flex flex-wrap justify-between items-center py-2">
                    </div>

                        <table class="w-full shadow-md">
                            <thead class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                            <tr>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">Id</th>
								<th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">Nome do Funcionário</th>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">Data da Transferencia</th>
								<th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">Transferido para</th>

                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 hidden lg:table-cell">
                                    <div class="hidden lg:inline-block">Ações</div>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $count = 1 @endphp
                            @foreach ($query as $key => $value)

                                <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/70 dark:text-slate-300">
                                    <td class="border dark:border-slate-400 py-1 px-2 font-light text-sm text-center hidden lg:table-cell">{{ $count++ }}</td>
                                    <td class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">{{ $value->employee->name }}</td>
                                    <td class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">{{ $value->date }}</td>
                                    <td class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">{{ $value->to }}</td>
                                    <td class="border dark:border-slate-400 py-3 px-1 font-light text-sm text-center">
                                        <!-- Actions Desktop -->
                                        <div class="lg:flex justify-center items-center gap-1 hidden">

                                            {{-- @if(Auth::user()->can($title.'.edit')) --}}
                                            <x-button md wire:click='edit({{ $value->id }})' icon="pencil-square" color="blue"/>
                                            {{-- @endif --}}

                                            {{-- @if(Auth::user()->can($title.'.destroy')) --}}
                                            <x-button md wire:click='deleteConfirm({{ $value->id }})' icon="trash" color="red"/>
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

