import { startLoader, endLoader } from './loading/loading.js';

export class filter {

    objFilter; url; htmlTable; htmlPage
    constructor(objFilter, url, htmlTable, htmlPage) {
        this.objFilter = objFilter; this.url = url; this.htmlTable = htmlTable; this.htmlPage = htmlPage;
    }

    get() {
        console.log(this.objFilter);
        axios.get(this.url, {
            params: this.objFilter
        })
            .then(
                (res) => {
                    this.showHtml(res.data.data, this.htmlTable(res.data.data))
                }
            )
            .catch(
                (error) => {
                    console.log(error.message)
                    alert(error.message)
                }
            )
    }

    filterSearchName() {
        js_$('[filter-search]').oninput = (a) => {
            this.objFilter.name = a.target.value == '' ? 0 : a.target.value

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                    }
                )
                .catch(
                    (error) => {
                        alert(error.message)
                    }
                )
        }
    }

    filterRecord() {
        js_$('[filter-record]').onchange = (a) => {
            startLoader()

            this.objFilter.record = a.target.value == '' ? 0 : a.target.value

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                        endLoader()
                    }
                )
                .catch(
                    (error) => {
                        alert(error.message)
                    }
                )
        }
    }

    filterSearchTitle() {
        js_$('[filter-search-title]').oninput = (a) => {

            this.objFilter.title = a.target.value == '' ? 0 : a.target.value

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                    }
                )
                .catch(
                    (error) => {
                        console.log(error.message)
                        alert(error.message)
                    }
                )
        }
    }

    filterPrice() {
        js_$('[filter-price]').oninput = (a) => {
            if (js_$('[show-price]')) {
                js_$('[show-price]').innerText = a.target.value;
            }

            this.objFilter.price = a.value

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                    }
                )
                .catch(
                    (error) => {
                        console.log(error.message)
                        alert(error.message)
                    }
                )
        }
    }

    filterSort(obj) {
        js_$('[filter-sort]').onchange = (a) => {
            startLoader()

            if (obj.title == 'id') {
                this.objFilter.id = a.target.value
            }

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                        endLoader()
                    }
                )
                .catch(
                    (error) => {
                        console.log(error.message)
                        alert(error.message)
                    }
                )
        }
    }

    filterCate() {
        js_$('[filter-cate]').onchange = (a) => {
            startLoader()
            this.objFilter.cate = a.target.value

            axios.get(this.url, {
                params: this.objFilter
            })
                .then(
                    (res) => {
                        this.showHtml(res.data.data, this.htmlTable(res.data.data))
                        endLoader()
                    }
                )
                .catch(
                    (error) => {
                        console.log(error.message)
                        alert(error.message)
                    }
                )
        }

    }

    showHtml(data, html) {
        this.showPaginate(data)

        $('[show-list]').html(html)
    }

    showPaginate(data) {

        if ($('[show-page]')) {
            $('[show-page]').html(this.htmlPage(data))
        }

        js_$('[page-start]').setAttribute('filter-page', data.first_page_url)
        js_$('[page-end]').setAttribute('filter-page', data.last_page_url)

        if ($('[show-number]')) {
            $('[show-number]').html(`Displaying ${data.to} of ${data.total} records`)
        }

        js_$$('[filter-page]').forEach(
            element => {
                element.onclick = (a) => {
                    if (a.target.getAttribute('filter-page') != 'null' && a.target.getAttribute('filter-page') != null) {
                        startLoader()
                        axios.get(a.target.getAttribute('filter-page'))
                            .then(
                                (res) => {
                                    this.showHtml(res.data.data, this.htmlTable(res.data.data))
                                    endLoader()
                                }
                            )
                            .catch(
                                (error) => {
                                    alert(error.message)
                                }
                            )
                    }
                }
            }
        )
    }

}

