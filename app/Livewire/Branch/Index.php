<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Illuminate\Validation\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

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
        $validated = $this->validate(
            rules: [
                'name' => ['required', 'string', 'max:255', Rule::unique(Branch::class)],
                'address' => ['required', 'string', 'max:255'],
            ],
            attributes: [
                'name' => 'Nome',
                'address' => 'Endereço',
            ]);
        Branch::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
        ]);
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();
        $this->showForm = false;
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
        $validated = $this->validate(
            rules: [
                'name' => ['required', 'string', 'max:255', Rule::unique(Branch::class)->ignore($this->id)],
                'address' => ['required', 'string', 'max:255'],
            ],
            attributes: [
                'name' => 'Nome',
                'address' => 'Endereço',
            ]);
        if ($this->id) {
            $query = Branch::findOrFail($this->id);
            $query->update([
                'name' => $validated['name'],
                'address' => $validated['address'],
            ]);
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Successo', 'Editado com Sucesso.');
        }
        $this->showForm = false;
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
        $query = Branch::where('id', $this->id)->first();
        $query->delete();
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Eliminado com Sucesso.');
    }

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
