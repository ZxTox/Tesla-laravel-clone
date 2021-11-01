document.addEventListener("DOMContentLoaded", init);

function init() {
    document.querySelectorAll(".profile-tab>a").forEach(a => a.addEventListener("click", openNewForm));


    function openNewForm(e) {
        e.preventDefault();
        const { form } = e.target.dataset;
        document.querySelector("form:not(.hidden)") !== document.querySelector(`#${form}`) && document.querySelectorAll("form").forEach(form => form.classList.toggle("hidden"));
    }
}