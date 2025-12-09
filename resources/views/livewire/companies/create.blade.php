<div>
    <h1 class="text-2xl font-bold mb-4">Create Company</h1>

    <form wire:submit.prevent="save">
        <div class="mb-4">
            <label>Name: </label>
            <input type="text" wire:model="name" class="input">
            @error('name')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label>Nit: </label>
            <input type="text" wire:model="nit" class="input">
            @error('nit')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label>Phone: </label>
            <input type="text" wire:model="phone" class="input">
            @error('phone')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label>Email: </label>
            <input type="email" wire:model="email" class="input">
            @error('email')
                <p class="text-red-500">{{ $message }}</p>
            @enderror
        </div>

        <button class="btn btn-primary">Save</button>

    </form>

</div>
