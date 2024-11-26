<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Illuminate\Validation\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;
use Illuminate\Support\Facades\DB;


class Index extends Component
{
    use Interactions;

    public $title = 'branch';

    public $isUpdate = false;

    public $isDelete = false;

    #[Locked]
    public $id = null;

    #[Locked]
    public $name = null;

    #[Locked]
    public $address = null;

    #[Locked]
    public $showForm = false;

    public function create()
    {
        $this->reset();
        $this->showForm = true;

    }

    public function store()
    {
        DB::beginTransaction();
        try {
            $validated = $this->validate(
                rules: [
                    'name' => ['required', 'string', 'max:255', Rule::unique(Branch::class)],
                    'address' => ['required', 'string', 'max:255'],
                ],
                attributes: [
                    'name' => 'Nome',
                    'address' => 'Endereço',
                ]
            );
    
            Branch::create([
                'name' => $validated['name'],
                'address' => $validated['address'],
            ]);
    
            DB::commit(); // Confirma a transação
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Sucesso', 'Adicionado com Sucesso.')->send();
            $this->showForm = false;
        } catch (\Exception $e) {
            DB::rollback(); // Reverte a transação em caso de erro
            $this->dialog()->error('Erro', 'Ocorreu um erro ao adicionar: ' . $e->getMessage())->send();
        }
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Branch::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
        $this->address = $query->address;
        $this->showForm = true;
    }

    public function update()
    {
        DB::beginTransaction();
        try {
            $validated = $this->validate(
                rules: [
                    'name' => ['required', 'string', 'max:255', Rule::unique(Branch::class)->ignore($this->id)],
                    'address' => ['required', 'string', 'max:255'],
                ],
                attributes: [
                    'name' => 'Nome',
                    'address' => 'Endereço',
                ]
            );
    
            if ($this->id) {
                $query = Branch::findOrFail($this->id);
                $query->update([
                    'name' => $validated['name'],
                    'address' => $validated['address'],
                ]);
    
                DB::commit(); // Confirma a transação
                $this->reset();
                $this->resetValidation();
                $this->dialog()->success('Sucesso', 'Editado com Sucesso.');
            }
    
            $this->showForm = false;
        } catch (\Exception $e) {
            DB::rollback(); // Reverte a transação em caso de erro
            $this->dialog()->error('Erro', 'Ocorreu um erro ao editar: ' . $e->getMessage())->send();
        }
    }

    public function deleteConfirm($id)
    {
        $this->id = $id;
        $this->dialog()
            ->question('Atenção!', 'Tem certeza que deseja eliminar?')
            ->confirm('Confirmar', 'delete')
            ->cancel('Cancelar', 'cancel')
            ->send();
    }

    public function delete()
    {
        DB::beginTransaction();
        try {
            $query = Branch::where('id', $this->id)->first();
    
            if ($query) {
                $query->delete();
            }
    
            DB::commit(); // Confirma a transação
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Sucesso', 'Eliminado com Sucesso.');
        } catch (\Exception $e) {
            DB::rollback(); // Reverte a transação em caso de erro
            $this->dialog()->error('Erro', 'Ocorreu um erro ao eliminar: ' . $e->getMessage())->send();
        }
    } // Fechamento correto do método delete
    
    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }
    
    public function render()
    {
        $query = Branch::all();
    
        return view('livewire.branch.index', compact('query'));
    }
}