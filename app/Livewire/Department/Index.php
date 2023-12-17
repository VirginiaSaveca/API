<?php

namespace App\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use App\Models\OrganicUnit;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

use function Livewire\Volt\rules;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "department";
    public string $titlept = "Departamento";

    // #[Rule('required', as: '"Nome"')]
    public $name;
    public $organic_unit_id;
    public $address;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:departments,name,' . $this->id,
            'organic_unit_id' => 'required|numeric',
            'address' => 'required',
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        Department::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query                          = Department::findOrFail($id);
        $this->id                       = $id;
        $this->name                     = $query->name;
        $this->organic_unit_id          = $query->organic_unit_id;
        $this->address                  = $query->address;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id)
        {
            $query = Department::findOrFail($this->id);
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
        $query = Department::where('id',$this->id)->first();
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
        $query = Department::all();
        $organicUnits = OrganicUnit::pluck( 'id')->toArray();
        return view('livewire.department.index', compact('query', 'organicUnits'));
    }

}
