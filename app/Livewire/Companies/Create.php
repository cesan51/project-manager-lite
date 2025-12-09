<?php

namespace App\Livewire\Companies;

use App\Http\Requests\StoreCompanyRequest;
use Livewire\Component;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class Create extends Component
{
    public $name;
    public $nit;
    public $phone;
    public $email;

    public function save(){
        $this->validate((new StoreCompanyRequest())->rules());

        Company::create([
            'name'   => $this->name,
            'nit'    => $this->nit,
            'phone'  => $this->phone,
            'email'  => $this->email
        ]);
        
        return redirect()->route('companies.index');
    }

    public function render()
    {
        return view('livewire.companies.create');
    }
}
