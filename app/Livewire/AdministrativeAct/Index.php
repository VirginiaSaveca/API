<?php

namespace App\Livewire\AdministrativeAct;

use App\Models\AdministrativeAct;
use App\Models\Employee;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'Administrative Act';

    public string $titlept = 'Actos Administrativos';

    // #[Rule('required', as: '"Nome"')]
    public $name;

    public $employee_id;

    public $appointment_date;

    public $visa_date;

    public $visa_nr;

    public $rows = [];

    public $showForm = 0;

    protected function rules()
    {
        $rules = [
            'name' => 'required',
            'employee_id' => 'required',
            'appointment_date' => 'required',
            'visa_date' => 'required',
            'visa_nr' => 'required',
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
        AdministrativeAct::create($validated);

        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();

    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = AdministrativeAct::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;
        $this->employee_id = $query->employee->name;
        $this->appointment_date = $query->appointment_date;
        $this->visa_date = $query->visa_date;
        $this->visa_nr = $query->visa_nr;

        $this->showForm = true;
    }

    public function update()
    {
        $validated = $this->validate();
        $validated['employee_id'] = Employee::where('name', $validated['employee_id'])->value('id');

        $query = AdministrativeAct::findOrFail($this->id);
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
        $query = AdministrativeAct::where('id', $this->id)->first();

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
        $query = AdministrativeAct::all();
        $query2 = Employee::pluck('name', 'id')->toArray();
        //$organicUnits = ['' => '--selecionar--'] + $organicUnits;

        return view('livewire.administrative-act.index', compact('query', 'query2'));
    }
}
