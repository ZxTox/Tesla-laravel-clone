document.addEventListener("DOMContentLoaded", init);

function init() {
    document.querySelectorAll(".profile-tab>a").forEach(a => a.addEventListener("click", openNewForm));
    document.querySelector("#file").addEventListener("change", showImg);


    function openNewForm(e) {
        e.preventDefault();
        const { form } = e.target.dataset;
        document.querySelectorAll("form").forEach(form => form.classList.add("hidden"));
        document.querySelector(`#${form}`).classList.remove("hidden");
    }

    function showImg(e) {
        e.preventDefault();
        const { files: listOfFiles } = e.target;
        const [ files ] = listOfFiles;
        if(files.type.match('image.*')) {
            const reader = new FileReader();
            reader.addEventListener('load', event => {
                document.querySelector("#me-photo>figure>img").src = event.target.result;
            });
            reader.readAsDataURL(files);
        }
    }
}