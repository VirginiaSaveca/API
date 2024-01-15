<?php

namespace App\Livewire\SalaryLevel;

use App\Models\SalaryLevel;
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
    public string $title = "level";
    public string $titlept = "Nível";

    // #[Rule('required', as: '"Nome"')]
    public $level;

    protected function rules()
    {
        $rules = [
            'level' => 'required|unique:salary_levels,level,' . $this->id,
        ];

        return $rules;
    }

    public function store()
    {
        $validated = $this->validate();
        SalaryLevel::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query                          = SalaryLevel::findOrFail($id);
        $this->id                       = $id;
        $this->level                    = $query->level;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id)
        {
            $query = SalaryLevel::findOrFail($this->id);
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
        $query = SalaryLevel::where('id',$this->id)->first();
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
        $query = SalaryLevel::all();
        return view('livewire.salary-level.index', compact('query'));
    }
}