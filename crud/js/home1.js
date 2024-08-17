function openEditModal(id, name) {
    // Set the values in the modal
    document.getElementById('productId').value = id;
    document.getElementById('productName').value = name;

    // Show the modal using Bootstrap's modal method
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
}
