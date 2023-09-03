class IncludeHTML extends HTMLElement {
    constructor() {
        super();

        let path = this.getAttribute('path');
        if (!path) return;

        this.#getHTML(path);
    }

    async #getHTML(path) {
        let request = await fetch(path);
        if (!request.ok) return;

        this.innerHTML = await request.text();
    }
}

if ('customElements' in window) {
    customElements.define('include-html', IncludeHTML);
}