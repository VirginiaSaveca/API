<?php

namespace App\Livewire\Qualification;

use App\Models\Employee;
use App\Models\Qualification;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'Qualification';

    public string $titlept = 'Qualificações';

    // #[Rule('required', as: '"Nome"')]
    public $training_area;

    public $employee_id;

    public $level;

    public $year;

    public $place;

    public $obs;

    public $rows = [];

    public $showForm = 0;

    protected function rules()
    {
        $rules = [
            'training_area' => 'required',
            'employee_id' => 'required',
            'level' => 'required',
            'year' => 'required|integer',
            'place' => 'required',
            'obs' => 'required',
        ];

        return $rules;
    }

    public function create()
    {
        $this->reset();
        $this->showForm = true;
    }

    public function store()
    {

        $validated = $this->validate();

        $validated['employee_id'] = Employee::where('name', $validated['employee_id'])->value('id');
        Qualification::create($validated);

        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();

    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Qualification::findOrFail($id);
        $this->id = $id;
        $this->training_area = $query->training_area;
        $this->employee_id = $query->employee->name;
        $this->level = $query->level;
        $this->year = $query->year;
        $this->place = $query->place;
        $this->obs = $query->obs;

        $this->showForm = true;
    }

    public function update()
    {
        $validated = $this->validate();
        $validated['employee_id'] = Employee::where('name', $validated['employee_id'])->value('id');

        $query = Qualification::findOrFail($this->id);
        $query->update($validated);

        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Sucesso', 'Editado com Sucesso.')->send();

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
        $query = Qualification::where('id', $this->id)->first();

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
        $query = Qualification::all();
        $query2 = Employee::pluck('name', 'id')->toArray();
        //$organicUnits = ['' => '--selecionar--'] + $organicUnits;

        return view('livewire.qualification.index', compact('query', 'query2'));
    }
}
