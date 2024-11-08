<?php

namespace App\Livewire\OrganicUnit;

use App\Models\Branch;
use App\Models\OrganicUnit;
use Livewire\Attributes\Rule;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;

    public $isUpdate = 0;

    public $isDelete = 0;

    public string $title = 'organic-unit';

    public string $titlept = 'Unidade Orgânica';

    // #[Rule('required', as: '"Nome"')]
    public $name;

    public $rows = [];

    public $branch_id = [];

    public $showForm = 0;

    protected function rules()
    {
        $rules = [
            'name' => 'required|unique:organic_units,name,'.$this->id,
        ];

        return $rules;
    }

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
        $validated = $this->validate();
        $query = OrganicUnit::create($validated);

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
        $query = OrganicUnit::findOrFail($id);
        $this->id = $id;
        $this->name = $query->name;

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
        $validated = $this->validate();
        if ($this->id) {
            $query = OrganicUnit::findOrFail($this->id);
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
        $query = OrganicUnit::where('id', $this->id)->first();
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
        $query = OrganicUnit::all();
        $query2 = Branch::all();

        return view('livewire.organic-unit.index', compact('query', 'query2'));
    }
}
