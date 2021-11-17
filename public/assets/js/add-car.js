document.addEventListener("DOMContentLoaded", init);
function init() {
    document.querySelector("#carimages").addEventListener("change", showFiles);
    function showFiles(e) {
        e.preventDefault();
        const { files } = e.target;

        Array.from(files).forEach((file, index) => {
            if(file.type.match('image.*')) {
                const $image = new Image();
                const reader = new FileReader();
                reader.addEventListener('load', event => {
                    generateHTML(file.name, event.target.result);
                });
                reader.readAsDataURL(file);
            }else {
                generateHTML(file.name);
            }
         });
    }

    function generateHTML(fileName, imageSource = "") {
        document.querySelector(".files").insertAdjacentHTML("beforeend", `
            <div class="file">
                ${ imageSource === "" ? `<svg width="22" height="28" viewBox="0 0 22 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M18.9999 27.3334H2.99992C1.52716 27.3334 0.333252 26.1394 0.333252 24.6667V3.33336C0.333252 1.8606 1.52716 0.666689 2.99992 0.666689H12.3333C12.3452 0.66514 12.3573 0.66514 12.3693 0.666689H12.3773C12.3898 0.670633 12.4028 0.673313 12.4159 0.674689C12.5335 0.682227 12.6496 0.705087 12.7613 0.742689H12.7813H12.8013H12.8173C12.8419 0.759924 12.865 0.779096 12.8866 0.800023C13.0318 0.864587 13.1642 0.954935 13.2773 1.06669L21.2773 9.06669C21.389 9.17974 21.4794 9.3121 21.5439 9.45736C21.5559 9.48669 21.5653 9.51469 21.5746 9.54536L21.5879 9.58269C21.6251 9.69388 21.6471 9.8096 21.6533 9.92669C21.6544 9.93997 21.6576 9.95301 21.6626 9.96536V9.97336C21.6648 9.9821 21.6661 9.99103 21.6666 10V24.6667C21.6666 25.3739 21.3856 26.0522 20.8855 26.5523C20.3854 27.0524 19.7072 27.3334 18.9999 27.3334ZM12.3333 3.33336V10H18.9999L12.3333 3.33336Z" fill="black"/>
                </svg>` : `<img src="${imageSource}" alt="${fileName}">`}
                
                <p>${fileName}</p> 
            </div>
        `);
    }
}