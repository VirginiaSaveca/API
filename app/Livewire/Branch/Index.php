<?php

namespace App\Livewire\Branch;

use App\Models\Branch;
use Livewire\Component;
use Livewire\Attributes\Rule;
use TallStackUi\Traits\Interactions;

class Index extends Component
{
    use Interactions;

    public $id;
    public $isUpdate = 0;
    public $isDelete = 0;
    public string $title = "branch";
    public string $titlept = "Extensão";

    #[Rule('required', as: '"Nome"')]
    public $name;

    #[Rule('required', as: '"Endereço"')]
    public $address;

    public function create()
    {
       

    }

    public function store()
    {
        $validated = $this->validate();
        Branch::create($validated);
        $this->reset();
        $this->resetValidation();
		$this->toast()->success('Successo', 'Adicionado com Sucesso.');
    }

    public function edit($id)
    {
        $query                          = Branch::findOrFail($id);
        $this->id                       = $id;
        $this->name                     = $query->name;
        $this->address                  = $query->address;
    }

    public function update()
    {
        $validated = $this->validate();
        if ($this->id) 
        {
            $query = Branch::findOrFail($this->id);
            $query->update($validated);
            $this->reset();
            $this->resetValidation();
			$this->toast()->success('Successo', 'Editado com Sucesso.');
        }
    }

    public function deleteId($id)
    {
        $this->id = $id;
    }

    public function delete($id)
    {
        $query = Branch::where('id',$id)->first();
        $query->delete();
        $this->reset();
        $this->resetValidation();
		$this->toast()->success('Successo', 'Eliminado com Sucesso.');
    }
    public function cancel()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        $query = Branch::all();
        return view('livewire.branch.index', compact('query'));
    }
}
