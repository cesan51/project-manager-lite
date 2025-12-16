<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $projects;

    public function mount()
    {
        $user = Auth::user();

        if($user->role === 'admin')
        {
            $this->projects = Project::all();
        } else {
            $this->projects = Project::where('company_id', $user->company_id)->get()
;        }
    }

    public function render()
    {
        return view('livewire.projects.index');
    }
}
