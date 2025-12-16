<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Create extends Component
{
    use AuthorizesRequests;

    public $name;
    public $description;
    public $status;
    public $start_date;
    public $end_date;

    public function mount()
    {
        $this->authorize('create', Project::class);
    }

    public function save(){
        $this->validate((new StoreProjectRequest())->rules());

        Project::create([
            'company_id'    => Auth::user()->company_id,
            'user_id'       => Auth::id(),
            'name'          => $this->name,
            'description' => $this->description,
            'status'      => $this->status,
            'start_date'  => $this->start_date,
            'end_date'    => $this->end_date,
        ]);

        session()->flash('success', 'Proyecto creado correctamentre');

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.projects.create');
    }
}
