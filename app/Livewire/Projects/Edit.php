<?php

namespace App\Livewire\Projects;

use App\Http\Requests\UpdateProjectRequest;
use Livewire\Component;
use App\Models\Project;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{

    use AuthorizesRequests;

    public Project $project;
    public $name; 
    public $description;
    public $status;
    public $end_date;

    public function mount(Project $project)
    {
        $this->project      = $project;
        $this->name         = $project->name;
        $this->description  = $project->description;
        $this->status       = $project->status;
        $this->end_date     = optional($project->end_date)?->format('Y-m-d');

        $this->authorize('view', $this->project);
    }

    public function update()
    {
        $this->validate((new UpdateProjectRequest())->rules());

        $this->project->update([
            'name'          => $this->name,
            'description'   => $this->description,
            'status'        => $this->status,
            'end_date'      => $this->end_date
        ]);

        return redirect()->route('projects.index');
    }

    public function render()
    {
        return view('livewire.projects.edit');
    }
}
