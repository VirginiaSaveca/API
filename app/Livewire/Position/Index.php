<?php

namespace App\Livewire\Position;

use App\Models\Position;
use Illuminate\Validation\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $showForm = false;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'position';

    public string $titlept = 'Carreira';

    // #[Rule('required', as: '"Nome"')]
    public $name;

    public function create()
    {
        $this->reset();
        $this->showForm = true;

    }

    public function store()
    {
        $validated = $this->validate(rules: [
            'name' => ['required', Rule::unique(Position::class, 'name')],
        ], attributes: [
            'name' => 'nome',
        ]);
        position::create($validated);
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = position::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
        $this->showForm = true;
    }

    public function update()
    {
        $validated = $this->validate(rules: [
            'name' => ['required', Rule::unique(Position::class, 'name')->ignore($this->id)],
        ], attributes: [
            'name' => 'nome',
        ]);
        if ($this->id) {
            $query = position::findOrFail($this->id);
            $query->update($validated);
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Successo', 'Editado com Sucesso.');
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
        $query = position::where('id', $this->id)->first();
        $query->delete();
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Eliminado com Sucesso.')->send();
    }

    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $query = position::all();

        return view('livewire.position.index', compact('query'));
    }
}
