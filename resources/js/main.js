let foodboxCreate = document.querySelector("#foodboxCreate");
if (foodboxCreate) {
    const btnInvia = document.querySelector("#btnInvia");

    document.addEventListener("DOMContentLoaded", function () {

        const imgInput = document.querySelector("#imgInput");
        const uploadSwitch = document.querySelector("#uploadSwitch");
        imgInput.addEventListener("change", function (event) {
            if (imgInput.files.length > 0) {
                btnInvia.style.display = "none";
                uploadSwitch.classList.replace("d-none", "d-block");
            } else {
                btnInvia.style.display = "block";
                uploadSwitch.classList.replace("d-block", "d-none");
            }
        });
    });
}