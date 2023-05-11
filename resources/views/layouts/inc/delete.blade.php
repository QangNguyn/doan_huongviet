<form action="{{ route($route, $id) }}" class="d-inline delete-form-{{ $id }}" method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <button type="button" onclick="confirmDelete({{ $id }})" class="btn btn-danger">Xóa</button>
</form>
