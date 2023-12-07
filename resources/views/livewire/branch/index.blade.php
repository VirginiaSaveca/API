<div>
    <div class="flex flex-col gap-6">
        <x-card>
            <x-slot:header>
                ...
            </x-slot:header>
            <div class="p-6">
                <form wire:submit="{{ $id ? 'update' : 'store' }}">
                                <div class="grid lg:grid-cols-3 gap-6">
                                    <x-input wire:model="name" label="Nome *" />
                                    <x-input wire:model="address" label="Endereço *" />


                                    <div class="justify mt-6">
                                        <x-button md text="{{ $id ? 'Actualizar' : 'Salvar' }}" />
                                        <x-button md wire:click="cancel" text="Cancelar" color="yellow" />
                                    </div>
                                </div>

                </form>

            </div>
        </x-card>
      
        <!-- end card -->

    </div>

        <div class="flex flex-col gap-6">
            <div class="card">
                <div class="card-header">
                    <div class="flex flex-wrap justify-between items-center gap-1">
                        <h4>...</h4>
                        <div class="flex flex-wrap gap-1">
                            <button wire:click="create" type="button" class="btn bg-info/25 text-lg font-medium text-success hover:text-white hover:bg-info"><i class="mgc_add_circle_line me-3"></i></button>
                            <a href="javascript:void(0);" wire:click="create" class="btn bg-info/20 text-sm font-medium text-info hover:text-white hover:bg-info"><i class="mgc_add_circle_line me-3"></i> Adicionar</a>
                        </div>
                    </div>

                </div>
                <div class="p-6">
                    <div class="flex flex-wrap justify-between items-center py-2">
                    </div>

                        <table class="w-full shadow-md">
                            <thead class="bg-slate-300 bg-opacity-20 border-t dark:bg-slate-800 divide-gray-300 dark:border-gray-700">
                            <tr>
                                <th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">...</th>
								<th class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 dark:text-gray-200 text-center">Nome</th>
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
                                    <td class="border dark:border-slate-400 py-1 px-2 font-light text-sm hidden lg:table-cell">{{ $value->name }}</td>
                                    <td class="border dark:border-slate-400 py-3 px-1 font-light text-sm text-center">
                                        <!-- Actions Desktop -->
                                        <div class="lg:flex justify-center items-center gap-1 hidden">

                                            @if(Auth::user()->can($title.'.edit'))
                                                <div>
                                                    <button wire:click='edit({{ $value->id }})'
                                                       class="btn bg-info text-white p-2" data-fc-type="tooltip" data-fc-placement="top" id="delete">
                                                        <i class="mgc_edit_2_line"></i>
                                                    </button>
                                                    <div class="bg-slate-700 hidden px-1 py-1 rounded transition-all text-white opacity-0 z-50" role="tooltip">
                                                        Editar
                                                        <div data-fc-arrow class="bg-slate-700 w-2.5 h-2.5 rotate-45 -z-10 rounded-[1px]"></div>
                                                    </div>
                                                </div>
                                            @endif

                                            @if(Auth::user()->can($title.'.destroy'))
                                                <div>
                                                    <button wire:click='delete({{ $value->id }})' wire:confirm="Tem certeza que deseja eliminar ?"
                                                       class="btn bg-danger text-white p-2">
                                                        <i class="mgc_delete_2_fill"></i>
                                                    </button>
                                                </div>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
                <div class="py-4 px-3">
                </div>
            </div>
        </div>

</div>

</div>


