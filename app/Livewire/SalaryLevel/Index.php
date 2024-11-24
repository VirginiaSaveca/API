<?php

namespace App\Livewire\SalaryLevel;

use App\Models\SalaryLevel;
use Illuminate\Validation\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $showForm = false;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'level';

    public string $titlept = 'Nível';

    // #[Rule('required', as: '"Nome"')]
    public $level;

    public function create()
    {
        $this->reset();
        $this->showForm = true;

    }

    public function store()
    {
        $validated = $this->validate(rules: [
            'level' => ['required', 'numeric', Rule::unique(SalaryLevel::class, 'level')],
        ], attributes: [
            'level' => 'nível salarial',
        ]);
        SalaryLevel::create($validated);
        $this->reset();
        $this->resetValidation();
        $this->dialog()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $this->resetValidation();
        $query = SalaryLevel::findOrFail($id);
        $this->id = $id;
        $this->level = $query->level;
        $this->showForm = true;
    }

    public function update()
    {
        $validated = $this->validate(rules: [
            'level' => ['required', 'numeric', Rule::unique(SalaryLevel::class, 'level')->ignore($this->id)],
        ], attributes: [
            'level' => 'nível salarial',
        ]);
        if ($this->id) {
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
        $this->dialog()
            ->question('Atenção!', 'Tem certeza que deseja eliminar?')
            ->confirm('Confirmar', 'delete')
            ->cancel('Cancelar', 'cancel')
            ->send();
    }

    public function delete()
    {
        $query = SalaryLevel::where('id', $this->id)->first();
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
        $query = SalaryLevel::all();

        return view('livewire.salary-level.index', compact('query'));
    }
}
