<?php

namespace App\Livewire\Companies;

use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{

    public $companies;

    public function mount(){
        $user = Auth::user();

        if($user->role === 'admin'){
            $this->companies = Company::all();
        } else {
            $this->companies = Company::where('id', $user->company_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.companies.index');
    }
}
