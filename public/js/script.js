function pesan() {
    Swal.fire({
        icon: "success",
        title: "Pesan Telah Terkirim",
        showConfirmButton: false,
        timer: 1500,
    });

    document.getElementById("from_name").value = "";
    document.getElementById("message").value = "";
    document.getElementById("email_id").value = "";
}

document
    .getElementById("contact-form")
    .addEventListener("submit", function (event) {
        event.preventDefault();

        // these IDs from the previous steps
        emailjs.sendForm("service_tx07oae", "template_5zftvfk", this).then(
            function () {
                pesan();
                console.log("SUCCESS!");
            },
            function (error) {
                console.log("FAILED...", error);
            }
        );
    });
