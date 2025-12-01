<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;

class CompaniesTable extends Component
{
    public $companies;

    public function mount()
    {
        $user = Auth::user();

        if ($user->role === 'admin') {
  
            $this->companies = Company::all();
        } else {
      
            $this->companies = Company::where('id', $user->company_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.companies-table');
    }
}
