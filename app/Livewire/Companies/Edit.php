<?php

namespace App\Livewire\Companies;

use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;

    public Company $company;
    public $name;
    public $nit;
    public $phone;
    public $email;

    public function mount(Company $company)
    {
        $this->company  = $company;
        $this->name     = $company->name;
        $this->nit      = $company->nit;
        $this->phone    = $company->phone;
        $this->email    = $company->email;

        $this->authorize('view', $this->company);
    }

    public function update(){
        $this->validate((new UpdateCompanyRequest())->rules());

        $this->company->update([
            'name'   => $this->name,
            'nit'    => $this->nit,
            'phone'  => $this->phone,
            'email'  => $this->email
        ]);

        return redirect()->route('companies.index');
    }


    public function render()
    {
        return view('livewire.companies.edit');
    }
}
