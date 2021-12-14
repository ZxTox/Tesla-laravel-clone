const IMG_SELECTOR = "#car-media img";

let currentIndex = 0;
let imagesArray;
document.addEventListener("DOMContentLoaded", init);

function init() {
    loadImages();
    document.querySelectorAll(".img-arrows").forEach(arrow => arrow.addEventListener("click", changeImg));
    document.querySelector("#car-information").addEventListener("scroll", removeScrollArrow);
    document.addEventListener("keydown", (e) => {

        switch (e.key) {
            case "Enter":
                toggleFullScreen();
                break;
            case "ArrowRight":
                changeImg(e, "1");
                break;
            case "ArrowLeft":
                changeImg(e, "0");
                break;
        }

    }, false);

    function removeScrollArrow(e) {
        e.preventDefault();
        const $el = document.querySelector("#car-information");
        document.querySelector("#car-information>div").style.opacity = 0;
        if ($el.scrollTop <= 10) {
            document.querySelector("#car-information>div").style.opacity = 1;
        }
    }

    function loadImages() {
        const { images } = document.querySelector(IMG_SELECTOR).dataset;

        imagesArray = images.split(" ");
    }

    function toggleFullScreen() {
        if (!document.fullscreenElement) {
            document.querySelector("#car-media").requestFullscreen();
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            }
        }
    }



    function changeImg(e, typeKey = "") {
        e.preventDefault();

        const typeNumber = parseInt(typeKey === "" ? e.target.dataset.type : typeKey);

        if (typeNumber === 0) {
            currentIndex++;
        } else {
            if (currentIndex > 0) {
                currentIndex--;
            } else {
                currentIndex = imagesArray.length;
            }
        }
        const $img = document.querySelector(IMG_SELECTOR);

        $img.style.opacity = 0;
        $img.src = imagesArray[currentIndex % imagesArray.length];
        setTimeout(() => {
            $img.style.opacity = 1;
        }, 247);
    }

}