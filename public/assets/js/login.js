document.addEventListener("DOMContentLoaded", init);

function init() {


    document.querySelectorAll("button").forEach(button => button.addEventListener("click", showRegister));


    function showRegister(e) {
        e.preventDefault();
        document.querySelector("#register-form").classList.toggle("hidden");
        document.querySelector("#login-form").classList.toggle("hidden");
        document.querySelectorAll("button").forEach(button => button.classList.toggle("hidden"));
        document.querySelectorAll("h3").forEach(heading => heading.classList.toggle("hidden"));
    }
}

