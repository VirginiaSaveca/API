<?php

namespace App\Livewire\Department;

use App\Models\Department;
use App\Models\Branch;
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
    public $selectedOrganicUnitName;
	
	public $rows 			= [];
	public $branch_id 		= [];
	
		
	public $showForm = 0;
	
    protected function rules() 
    {
        $rules = [
            'name' => 'required|unique:departments,name,' . $this->id,
            'organic_unit_id' => 'required',
        ];

        return $rules;
    }
	
    public function addRow(){
        $this->rows[] = [
            'branch_id' 		=> '',
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
        $this->showForm	= true;

    }		

    public function store()
    {
        $validated = $this->validate([
            'name' => 'required|unique:departments,name',
            'organic_unit_id' => 'required',
        ]);
    
        $validated['organic_unit_id'] = OrganicUnit::where('name', $validated['organic_unit_id'])->value('id');
    
        Department::create($validated);
		
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
        $query                            = Department::findOrFail($id);
        $this->id                        = $id;
        $this->name                      = $query->name;
        $this->organic_unit_id           = $query->organicUnit->name; 
        if($query) {
            foreach ($query->branches as $value){
                $this->rows[] = [
                    'branch_id'       => $value->pivot->branch_id,
                ];

            }
        }
        $this->showForm                 = true;			
        
    }
    

    public function update()
{
    $validated = $this->validate([
        'name' => 'required|unique:departments,name,' . $this->id,
        'organic_unit_id' => 'required',
        
    ]);

    $validated['organic_unit_id'] = OrganicUnit::where('name', $validated['organic_unit_id'])->value('id');

    if ($this->id) {
        $query = Department::findOrFail($this->id);
        $query->update($validated);

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
        $query = Department::where('id',$this->id)->first();
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
        $query = Department::all();
        $organicUnits = OrganicUnit::pluck('name', 'id')->toArray();
        //$organicUnits = ['' => '--selecionar--'] + $organicUnits;
		$query2 = Branch::all();
        return view('livewire.department.index', compact('query', 'organicUnits','query2'));
    }
    
    

}
