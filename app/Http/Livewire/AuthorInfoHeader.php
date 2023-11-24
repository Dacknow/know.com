<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthorInfoHeader extends Component
{

    public $user;
    

    protected $listeners = [
        'updateUserHeaderInfo'=>'$refresh'
    ];
    

    public function mount(){
        if(Auth::guard('web')->check()){
            $this->user = User::findOrFail(auth()->id());
        }
    }
    public function render()
    {
        return view('livewire.author-info-header');
    }
}
