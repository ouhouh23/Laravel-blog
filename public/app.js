class Select {
    constructor(element) {
        this.element = element
        this.initEvents()
    }
    initEvents() {
        this.element.addEventListener('change', this.redirect.bind(this))
    }

    redirect() {
        const optionSelected = this.element.querySelector('option:checked')
        location.href= optionSelected.value
    }
}
class Flash {
    constructor(element) {
        this.element = element
        this.hide()
    }

    hide() {
        setTimeout(() => {
            this.element.style.display = 'none'
        },5000)
    }
}

const selects = document.querySelectorAll('[data-select]')
if(selects.length > 0) {
    selects.forEach((element) => {
        const select = new Select(element)
    })
}

const flashElement = document.querySelector('[data-flash]')
if (flashElement) {
    flash = new Flash(flashElement)
}
