let showAlert = (evt, title = 'Done', text = "Operation success", icon = 'success') => {
    // evt.preventDefault()

    Swal.fire({
            position: "center",
            icon: icon,
            title: title,
            text: text,
            showConfirmButton: false,
            timer: 1300
        })
        .then((result) => {
            window.location.href = evt.target.href;
        })
}

let showConfirm = (evt, title = "Are you sure?", text = "You won't be able to revert this!", icon = 'warning') => {
    evt.preventDefault();
    Swal.fire({
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        cancelButtonColor: "#1f1f1f",
        confirmButtonColor: "#5f5f5f",
        confirmButtonText: "Yes"
    }).then((result) => {
        if (result.isConfirmed) {
            showAlert(evt);
        }
    });
}