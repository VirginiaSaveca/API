<?php

namespace App\Livewire\OrganicUnit;


use App\Models\OrganicUnit;
use Livewire\Component;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

use function Livewire\Volt\rules;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "organic-unit";
    public string $titlept = "Unidade Orgânica";

    // #[Rule('required', as: '"Nome"')]
    public $name;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:branches,name,' . $this->id,
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        OrganicUnit::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query                          = OrganicUnit::findOrFail($id);
        $this->id                       = $id;
        $this->name                     = $query->name;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id)
        {
            $query = OrganicUnit::findOrFail($this->id);
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
            ]
        ]);
    }

    public function delete()
    {
        $query = OrganicUnit::where('id',$this->id)->first();
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
        $query = OrganicUnit::all();
        return view('livewire.organic-unit.index', compact('query'));
    }
}