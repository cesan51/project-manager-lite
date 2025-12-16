<?php

namespace App\Livewire\Projects;

use Livewire\Component;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Show extends Component
{
    use AuthorizesRequests;

    public Project $project;

    public function mount(Project $project)
    {
        $this->project = $project;

        $this->authorize('view', $this->project);
    }

    public function render()
    {
        return view('livewire.projects.show');
    }
}
