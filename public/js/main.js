class Popup {
    constructor(options) {
        this.modal = document.querySelector(options.modal);
        this.overlay = document.querySelector(options.overlay);
        var popup = this;
        this.open = function (content) {
            //popup.modal.append = content;
            //popup.door_id.innerHTML = content;
            popup.overlay.classList.add('open');
            popup.modal.classList.add('open');
        };
        this.close = function () {
            popup.overlay.classList.remove('open');
            popup.modal.classList.remove('open');
            popup.modal.classList.remove('open');
        };
        this.overlay.onclick = popup.close;
    }
}


