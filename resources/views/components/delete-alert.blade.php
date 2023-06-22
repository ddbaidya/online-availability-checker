<button type="button" class="btn btn-danger waves-effect waves-light" id="{{ $buttonId }}">Delete</button>
<script>
    $("#{{ $buttonId }}").click(function() {
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#34c38f",
            cancelButtonColor: "#f46a6a",
            confirmButtonText: "Yes, delete it!"
        }).then(function(result) {
            if (result.isConfirmed) {
                fetch("{{ $deleteRoute }}", {
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                }).then(function(response) {
                    if (response.ok) {
                        // handle success response
                        Swal.fire({
                            title: "Deleted!",
                            text: "Your record has been deleted.",
                            icon: "success",
                        }).then(function() {
                            // redirect to another page or perform any other action
                            window.location.href = "{{ $redirectRoute }}";
                        });
                    } else {
                        // handle error response
                        Swal.fire({
                            title: "Error!",
                            text: "An error occurred while deleting the record.",
                            icon: "error",
                        });
                    }
                });
            }
        })
    });
</script>
