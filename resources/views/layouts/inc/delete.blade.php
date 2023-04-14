<form action="{{ route($route, $id) }}" class="d-inline" method="POST" id="delete-form">
    @csrf
    @method('DELETE')
    <button type="button" onclick="confirmDelete()" class="btn btn-danger ">Xóa</button>
</form>


