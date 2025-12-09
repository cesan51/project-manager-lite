<?php

namespace App\Livewire\Companies;

use App\Models\Company;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Show extends Component
{
    use AuthorizesRequests;
    
    public Company $company;

    public function mount(Company $company)
    {
        $this->company = $company;    

        $this->authorize('view', $this->company);
    }

    public function render()
    {
        return view('livewire.companies.show');
    }
}
