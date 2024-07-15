<div class="container mt-5">
    <div class="row mb-3">
        <div class="col-12">
            <button class="btn btn-primary" wire:click="toggleOrder">Cambiar Orden</button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm" wire:click="edit({{ $post->id }})">Edit</button>
                                <button class="btn btn-danger btn-sm" wire:click="delete({{ $post->id }})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @if($editPostId)
        <div class="row">
            <div class="col-12">
                <h2>Edit Post</h2>
                <form wire:submit.prevent="save">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" id="title" class="form-control" wire:model="title">
                    </div>
                    <div class="form-group">
                        <label for="content">Content:</label>
                        <textarea id="content" class="form-control" wire:model="content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" wire:click="resetEdit">Cancel</button>
                </form>
            </div>
        </div>
    @endif
</div>
