<?php

namespace App\Livewire\Employee;

use App\Models\Employee;
use App\Models\Branch;
use App\Models\OrganicUnit;
use App\Models\Department;
use App\Models\Partition;
use App\Models\Career;
use App\Models\Category;
use App\Models\Level;
use App\Models\SalaryLevel;

use Livewire\Component;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "employee";
    public string $titlept = "Funcionario";

	public $branch_id;
    public $branch_organic_unit_id;
    public $branch_department_id;
    public $branch_partition_id;
    public $career_id;
    public $category_id;
    public $level_id;
    public $salary_level_id;
    public $name;
    public $birthdate;
    public $contact;
    public $nationality;
    public $naturality;
    public $email;
    public $father_name;
    public $mother_name;
    public $bi_nr;
    public $bi_validate;
    public $nuit;
	
	
	public $showForm = 0;

    protected function rules()
    {
        $rules = [	
			'branch_id' 				=> 'required',
			'branch_organic_unit_id' 	=> 'required',
			'branch_department_id' 		=> 'required',
			'branch_partition_id' 		=> 'required',
			'career_id' 				=> 'required',
			'category_id' 				=> 'required',
			'level_id' 					=> 'required',
			'salary_level_id' 			=> 'required',
			'name' 						=> 'required',
			'birthdate' 				=> 'required',
			'contact' 					=> 'required|numeric|unique:employees,contact,' . $this->id,
			'nationality' 				=> 'required',
			'naturality' 				=> 'required',
			'email' 					=> 'required|unique:employees,email,' . $this->id,
			'father_name' 				=> 'required',
			'mother_name' 				=> 'required',
			'bi_nr' 					=> 'required|unique:employees,bi_nr,' . $this->id,
			'bi_validate' 				=> 'required',
			'nuit' 						=> 'required|numeric|unique:employees,nuit,' . $this->id,	
        ];

        return $rules;
    }
	
	public function create()
    {
        $this->reset();
        $this->showForm	= true;

    }		

    public function store()
    {
        $validated = $this->validate();
        $validated['branch_id'] = Branch::where('name', $validated['branch_id'])->value('id');
        $validated['branch_organic_unit_id'] = OrganicUnit::where('name', $validated['branch_organic_unit_id'])->value('id');
        $validated['branch_department_id'] = Department::where('name', $validated['branch_department_id'])->value('id');
        $validated['branch_partition_id'] = Partition::where('name', $validated['branch_partition_id'])->value('id');
        $validated['career_id'] = Career::where('name', $validated['career_id'])->value('id');
        $validated['category_id'] = Category::where('name', $validated['category_id'])->value('id');
        $validated['level_id'] = Level::where('name', $validated['level_id'])->value('id');
        $validated['salary_level_id'] = SalaryLevel::where('level', $validated['salary_level_id'])->value('id');

        $query = Employee::create($validated);
	
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.')->send();
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = Employee::findOrFail($id);
        $this->id = $id;
		// dd($query);
		$this->branch_id					= $query->branch->name;
		$this->branch_organic_unit_id		= $query->branch_organic_unit_id;
		$this->branch_department_id			= $query->branch_department_id;
		$this->branch_partition_id			= $query->branch_partition_id;
		$this->career_id					= $query->career->name;
		$this->category_id					= $query->category->name;
		$this->level_id						= $query->level->name;
		$this->salary_level_id				= $query->salary_level->level;
		$this->name							= $query->name;
		$this->birthdate					= $query->birthdate;
		$this->contact						= $query->contact;
		$this->nationality					= $query->nationality;
		$this->naturality					= $query->naturality;
		$this->email						= $query->email;
		$this->father_name					= $query->father_name;
		$this->mother_name					= $query->mother_name;
		$this->bi_nr						= $query->bi_nr;
		$this->bi_validate					= $query->bi_validate;
		$this->nuit							= $query->nuit;

        $this->showForm                 = true;			
        		
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id) {
			$query = Employee::findOrFail($this->id);
			$query->update($validated);

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
        $query  = Employee::all();
		$query2 = Branch::pluck('name', 'id')->toArray(); //pluck('name', 'id')->toArray();
		$query3 = OrganicUnit::pluck('name','id')->toArray();
		$query4 = Department::pluck('name','id')->toArray(); //Department::all();
		$query5 = Partition::pluck('name','id')->toArray();
		$query6 = Career::pluck('name','id')->toArray();
		$query7 = Category::pluck('name','id')->toArray();
		$query8 = Level::pluck('name','id')->toArray();
		$query9 = SalaryLevel::pluck('level','id')->toArray();				
        return view('livewire.employee.index', compact('query','query2','query3','query4','query5','query6','query7','query8','query9'));
    }
}
