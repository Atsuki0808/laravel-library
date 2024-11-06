<div class="modal fade" id="delete-author-{{ $author->id }}" tabindex="-1" aria-labelledby="deleteauthorLabel-{{ $author->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-danger">
                <h3 class="h5 modal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i>Delete author
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to delete this author?</p>
                <div class="mt-3">
                </div>
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('author.destroy', $author->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
