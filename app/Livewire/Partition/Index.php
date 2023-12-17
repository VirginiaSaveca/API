<?php

namespace App\Livewire\Partition;

use App\Models\Branch;
use App\Models\Department;
use Livewire\Component;
use App\Models\Partition;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

use function Livewire\Volt\rules;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "partition";
    public string $titlept = "Partição";

    // #[Rule('required', as: '"Nome"')]
    public $name;
    public $department_id;
    public $branch_id;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:partitions,name,' . $this->id,
            'branch_id' => 'required|numeric',
            'department_id' => 'required|numeric',
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        Partition::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query                          = Partition::findOrFail($id);
        $this->id                       = $id;
        $this->name                     = $query->name;
        $this->department_id            = $query->department_id;
        $this->branch_id                = $query->branch_id;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id)
        {
            $query = Partition::findOrFail($this->id);
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
        $query = Partition::where('id',$this->id)->first();
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
        $query = Partition::all();
        $branch = Branch::pluck( 'id')->toArray();
        $department = Department::pluck( 'id')->toArray();
        return view('livewire.partition.index', compact('query', 'branch', 'department'));
    }

}
