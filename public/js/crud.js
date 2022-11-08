import {salert} from "./sweet-alert.js";
export function store(object) {
    try {
        const formData = object.form ? new FormData(object.form): object.inputFields;
        axios.post(object.url, formData)
            .then(
                (res) => {
                    console.log(res);

                    salert('success',res.data.mesenger)
                    if (object.showHTML) {
                        showHTML.innerHTML = ''
                    }
                    if (object.appendHTML) {

                    }
                    if (object.callback) {
                        object.callback()
                    }
                    if (object.redirect) {
                        setTimeout(() => {
                            window.location.assign(object.redirect)
                        }, 1500)
                    }
                }
            )
            .catch(
                (res) => {
                    console.log(res);
                    if (res.response.status == 401) {
                        salert('warning',res.response.data.mesenger)
                    }
                }
            )
    } catch (error) {
        alert(error);
    }
}

export function edit(object) {
    try {
        const formData = new FormData(object.form);
        axios.put(object.url, formData)
            .then(
                (res) => {
                    console.log(res);

                    salert('success',res.data.mesenger)
                    if (object.showHTML) {
                        showHTML.innerHTML = ''
                    }
                    if (object.appendHTML) {

                    }
                    if (object.callback) {
                        object.callback()
                    }
                    if (object.redirect) {
                        setTimeout(() => {
                            window.location.assign(object.redirect)
                        }, 2000)
                    }
                }
            )
            .catch(
                (res) => {
                    console.log(res);
                }
            )
    } catch (error) {
        alert(error);
    }
}

export function remove(object) {

    try {
        axios.delete(object.url)
            .then(
                (res) => {
                    console.log(res);
                    salert('success',res.data.mesenger)
                    if (object.showHTML) {
                        showHTML.innerHTML = ''
                    }
                    if (object.removeChild) {

                    }
                }
            )
            .catch(
                (res) => {
                    console.log(res);
                }
            )
    } catch (error) {
        alert(error);
    }
}

export function index(url, elm) {
    axios.get(url)
        .then(
            res => {
                console.log(res);
            }
        )
        .catch(
            res => {
                console.log(res);
            }
        )
}