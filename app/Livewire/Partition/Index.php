<?php

namespace App\Livewire\Partition;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Partition;
use Illuminate\Validation\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'partition';

    public string $titlept = 'Partição';

    public $name;

    public $department_id;

    public $rows = [];

    public $branch_id = [];

    public $showForm = 0;

    public function addRow()
    {
        $this->rows[] = [
            'branch_id' => '',
        ];
    }

    public function removeRow($index)
    {
        unset($this->rows[$index]);
        $this->rows = array_values($this->rows);
    }

    public function create()
    {
        $this->reset();
        $this->showForm = true;

    }

    public function store()
    {
        $this->branch_id = array_map(fn ($arr) => $arr['branch_id'], $this->rows);

        $validated = $this->validate(rules: [
            'name' => ['required', Rule::unique(Partition::class, 'name')],
            'department_id' => ['required', Rule::exists(Department::class, 'name')],
            'branch_id' => ['nullable', 'array'],
            'branch_id.*' => ['required', 'numeric'],
        ], attributes: [
            'name' => 'nome',
            'department_id' => 'departamento',
            'branch_id.*' => 'extensão',
        ]);

        $validated['department_id'] = Department::where('name', $validated['department_id'])->value('id');

        $query = Partition::create([
            'name' => $validated['name'],
            'department_id' => $validated['department_id'],
        ]);

        foreach ($this->rows as $value) {
            $query->branches()->attach($value['branch_id']);
        }
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Partition::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
        $this->department_id = $query->department->name;
        if ($query) {
            foreach ($query->branches as $value) {
                $this->rows[] = [
                    'branch_id' => $value->pivot->branch_id,
                ];

            }
        }
        $this->showForm = true;

    }

    public function update()
    {
        $this->branch_id = array_map(fn ($arr) => $arr['branch_id'], $this->rows);

        $validated = $this->validate(rules: [
            'name' => ['required', Rule::unique(Partition::class, 'name')->ignore($this->id)],
            'department_id' => ['required', Rule::exists(Department::class, 'name')],
            'branch_id' => ['nullable', 'array'],
            'branch_id.*' => ['required', 'numeric'],
        ], attributes: [
            'name' => 'nome',
            'department_id' => 'departamento',
            'branch_id.*' => 'extensão', ]
        );

        $validated['department_id'] = Department::where('name', $validated['department_id'])->value('id');

        if ($this->id) {
            $query = Partition::findOrFail($this->id);
            $query->update(
                [
                    'name' => $validated['name'],
                    'department_id' => $validated['department_id'],
                ]
            );

            $query->branches()->detach();

            foreach ($this->rows as $value) {
                $query->branches()->attach($value['branch_id']);
            }
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Successo', 'Editado com Sucesso.')->send();
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
        $query = Partition::where('id', $this->id)->first();
        if ($query && $query->branches()->exists()) {
            return $this->dialog()->error('Erro ao Eliminar', 'Não pode ser eliminado pois está associado a outro registo.')->send();
        }
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
        $query = Partition::all();
        $department = Department::pluck('name', 'id')->toArray();
        //$department = ['' => '--selecionar--'] + Department::pluck('name', 'id')->toArray();
        $query2 = Branch::all();

        return view('livewire.partition.index', compact('query', 'department', 'query2'));
    }
}
