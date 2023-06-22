function showPassword(field = "password") {
    var x = document.getElementById(field);
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function imageUploadPreview(prev) {
    event = this.event;
    const file = event.target.files[0];
    const reader = new FileReader();
    reader.onload = function(event) {
        const preview = document.getElementById(prev);
        preview.src = event.target.result;
    };
    reader.readAsDataURL(file);
}