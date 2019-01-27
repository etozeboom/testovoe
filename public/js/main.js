class Popup {
    constructor(options) {
        this.modal = document.querySelector(options.modal);
        this.form = document.querySelector(options.form);
        this.overlay = document.querySelector(options.overlay);
        this.door_id = document.querySelector(options.door_id);
        var popup = this;
        this.open = function (content) {
            //popup.modal.append = content;
            popup.door_id.innerHTML = content;
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


