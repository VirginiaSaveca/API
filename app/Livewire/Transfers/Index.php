<?php

namespace App\Livewire\Transfers;

use App\Models\Transfer;
use Livewire\Component;
use App\Models\Employee;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;


class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "Transfers";
    public string $titlept = "Transferencias";

    // #[Rule('required', as: '"Nome"')]
    public $to;
    public $employee_id;
    public $date;
   

    public $rows             = [];



    public $showForm = 0;

    protected function rules()
    {
        $rules = [
         'to'             => 'required',
         'employee_id'    => 'required',
         'date'           => 'required',
           
        ];

        return $rules;
    }


    public function create()
    {
        $this->reset();
        $this->showForm    = true;
    }

    public function store()
    {
       
            $validated = $this->validate();
        
            $validated['employee_id'] = Employee::where('name', $validated['employee_id'])->value('id');      
             Transfer::create($validated);
    
            $this->reset();
            $this->resetValidation();
            $this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();
       
    }
    

    public function edit($id)
    {
        $this->resetValidation();
        $query                           = Transfer::findOrFail($id);
        $this->id                        = $id;
        $this->to                        = $query->to;
        $this->employee_id               = $query->employee->name;
        $this->date                      = $query->date;
     
        $this->showForm                 = true;
    }


    public function update()
    {
        $validated = $this->validate();
        $validated['employee_id'] = Employee::where('name', $validated['employee_id'])->value('id');
    
            $query = Transfer::findOrFail($this->id);
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
        $query = Transfer::where('id', $this->id)->first();

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
        $query = Transfer::all();
        $query2 = Employee::pluck('name', 'id')->toArray();
       
        return view('livewire.transfers.index', compact('query', 'query2'));
    }
}




