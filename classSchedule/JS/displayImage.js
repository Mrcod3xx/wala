const image_input = document.querySelector("#image-input");
var uploaded_image = "";

image_input.addEventListener("change", function() {
    const reader = new FileReader();
    reader.addEventListener("load", () => {
        uploaded_image = reader.result;
        document.querySelector("display-image").style.background - image('url(${uploaded_image})');
    });
    reader.readAsDataURL(this.files[0]);
});