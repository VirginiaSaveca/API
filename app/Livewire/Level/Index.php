<?php

namespace App\Livewire\Level;

use App\Models\Level;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'level';

    public string $titlept = 'Level';

    // #[Rule('required', as: '"Nome"')]
    public $name;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:levels,name,'.$this->id,
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        Level::create($validated);
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Level::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id) {
            $query = Level::findOrFail($this->id);
            $query->update($validated);
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Successo', 'Editado com Sucesso.');
        }
    }

    public function deleteConfirm($id)
    {
        $this->id = $id;
        $this->dialog()->confirm('Atenção!', 'Tem certeza que deseja eliminar?', [
            'confirm' => [
                'text' => 'Confirmar',
                'method' => 'delete',
                // 'params' => 'Confirmed Successfully' // Can be a string or array
            ],
            /* Cancel is optional */
            'cancel' => [
                'text' => 'Cancelar',
                'method' => 'cancel',
                // 'params' => 'Cancelled Successfully' // Can be a string or array
            ],
        ]);
    }

    public function delete()
    {
        $query = Level::where('id', $this->id)->first();
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
        $query = Level::all();

        return view('livewire.level.index', compact('query'));
    }
}
