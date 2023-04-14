function confirmDelete() {
    Swal.fire({
        title: 'Bạn chắc chắn muốn xóa không?',
        text: "Bạn sẽ không thể khôi phục lại điều này!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Có, xóa nó!',
        cancelButtonText: 'Không, hủy bỏ!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the delete form
            document.getElementById('delete-form').submit();
        }
    });
}