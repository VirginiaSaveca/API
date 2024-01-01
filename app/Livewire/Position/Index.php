<?php

namespace App\Livewire\Position;

use App\Models\Position;

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
    public string $title = "position";
    public string $titlept = "Carreira";

    // #[Rule('required', as: '"Nome"')]
    public $name;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:categories,name,' . $this->id,
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        position::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query                          = position::findOrFail($id);
        $this->id                       = $id;
        $this->name                     = $query->name;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id) 
        {
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
        $query = position::where('id',$this->id)->first();
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
        $query = position::all();
        return view('livewire.position.index', compact('query'));
    }
}

