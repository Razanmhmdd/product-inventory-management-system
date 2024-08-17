function validateForm() {
    // Validate Product Name
    var name = document.getElementById('name').value;
    if (name.trim() === "") {
        alert("Product Name is required");
        return false;
    }

    // Validate Price
    var price = document.getElementById('price').value;
    if (price === "" || price <= 0) {
        alert("Please enter a valid Price");
        return false;
    }

    // Validate Quantity
    var qty = document.getElementById('qty').value;
    if (qty === "" || qty <= 0) {
        alert("Please enter a valid Quantity");
        return false;
    }

    // Validate Category
    var category = document.getElementById('category').value;
    if (category.trim() === "") {
        alert("Category is required");
        return false;
    }

    // Validate Description
    var description = document.getElementById('message').value;
    if (description.trim() === "") {
        alert("Description is required");
        return false;
    }

    return true;
}