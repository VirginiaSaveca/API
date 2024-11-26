<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Tokens extends Component
{
    use Interactions;

    public ?string $device_name = null;

    public int|string $days = 30;

    public function render()
    {
        $tokens = Auth::user()
            ->tokens()
            ->get();

        return view('livewire.tokens', ['tokens' => $tokens]);
    }

    public function create()
    {
        $validated = $this->validate([
            'device_name' => ['required', 'string', 'min:3', 'max:255'],
            'days' => ['required', 'integer'],
        ]);
        Auth::user()
            ->createToken($validated['device_name'], expiresAt: now()->addDays((int) $validated['days']));

        $this->dialog()->success('Successo', 'Criado com Sucesso.')->send();

        $this->reset();
        $this->resetValidation();
    }

    public function revoke(int $id)
    {
        Auth::user()
            ->tokens()
            ->where('id', $id)
            ->delete();
        $this->dialog()->success('Successo', 'Revogado com Sucesso.')->send();
    }
}
