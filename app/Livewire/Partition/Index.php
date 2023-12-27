<?php

namespace App\Livewire\Partition;

use App\Models\Branch;
use App\Models\Department;
use Livewire\Component;
use App\Models\Partition;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "partition";
    public string $titlept = "Partição";

    public $name;
    public $department_id;
    public $branch_id;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:partitions,name,' . $this->id,
            'branch_id' => 'required',
            'department_id' => 'required',
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|unique:partitions,name,' . $this->id,
            'branch_id' => 'required',
            'department_id' => 'required',
        ]);

        $validated['branch_id'] = Branch::where('name', $validated['branch_id'])->value('id');
        $validated['department_id'] = Department::where('name', $validated['department_id'])->value('id');

        Partition::create($validated);
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Sucesso', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Partition::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
        $this->department_id = $query->department->name;
        $this->branch_id = $query->branch->name;
    }

    public function update()
    {
        $validated = $this->validate([
            'name' => 'required|unique:partitions,name,' . $this->id,
            'branch_id' => 'required',
            'department_id' => 'required',
        ]);

        $validated['branch_id'] = Branch::where('name', $validated['branch_id'])->value('id');
        $validated['department_id'] = Department::where('name', $validated['department_id'])->value('id');

        if ($this->id) {
            $query = Partition::findOrFail($this->id);
            $query->update($validated);
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Sucesso', 'Editado com Sucesso.');
        }
    }

    public function deleteConfirm($id)
    {
        $this->id = $id;
        $this->dialog()->confirm('Atenção!', 'Tem certeza que deseja eliminar?', [
            'confirm' => [
                'text' => 'Confirmar',
                'method' => 'delete',
            ],
            'cancel' => [
                'text' => 'Cancelar',
                'method' => 'cancel',
            ]
        ]);
    }

    public function delete()
    {
        $query = Partition::where('id', $this->id)->first();
        $query->delete();
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Sucesso', 'Eliminado com Sucesso.');
    }

    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $query = Partition::all();
        $branch = Branch::pluck('name', 'id')->toArray();
        $branch = ['' => '--selecionar--'] + $branch;
        $department = Department::pluck('name', 'id')->toArray();
        $department = ['' => '--selecionar--'] + Department::pluck('name', 'id')->toArray();

        return view('livewire.partition.index', compact('query', 'branch', 'department'));
    }
}
