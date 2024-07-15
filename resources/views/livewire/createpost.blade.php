<div class="content shadow p-3 m-4">
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <form wire:submit.prevent="createpost">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" class="form-control" wire:model="title">
            @error('title') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="content">Content</label>
            <textarea id="content" class="form-control" wire:model="content"></textarea>
            @error('content') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Post</button>
    </form>
</div>

