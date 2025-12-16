<div>
    
    <h1 class="font-bold mb-4">Edit Project</h1>

    <form wire:submit.prevent="update">
        <div>
            <label>Name: </label>
            <input type="text" wire:model="name" class="input">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Description: </label>
            <input type="text" wire:model="description" class="input">
            @error('description')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label>Status: </label>
            <select wire:model="status" class="input">
                <option value="">-- Select --</option>
                <option value="planing">Planing</option>
                <option value="in_progress">In Progress</option>
                <option value="delayed">Delayed</option>
                <option value="completed">Completed</option>
            </select>
            @error('status')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div><label>End Date: </label>
            <input type="date" wire:model="end_date" class="input">
            @error('end_date')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-primary">Update</button>
    </form>

    <a href="{{ route('projects.index') }}">Back</a>

</div>