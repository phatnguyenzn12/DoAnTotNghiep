import { startLoader, endLoader } from './loading/loading.js';

export class filter {

    objFilter; url; htmlTable; htmlPage
    constructor(objFilter, url, htmlTable, htmlPage) {
        this.objFilter = objFilter;this.url = url;this.htmlTable = htmlTable;this.htmlPage = htmlPage;
    }

    _url(search, record) {
        return `${this.url}/${search}/${record}`;
    }

    get() {
        axios.get(this._url(this.objFilter.search, this.objFilter.record))
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

    filterSearch() {
        js_$('[filter-search]').oninput = (a) => {
            this.objFilter.search = a.target.value == '' ? 0 : a.target.value
            axios.get(this._url(this.objFilter.search, this.objFilter.record))
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

    filterRecord() {
        js_$('[filter-record]').onchange = (a) => {
            startLoader()
            this.objFilter.record = a.target.value == '' ? 0 : a.target.value
            axios.get(this._url(this.objFilter.search, this.objFilter.record))
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
        this.showPanigate(data)
        $('[show-list]').html(html)
    }

    showPanigate(data) {
        $('[show-page]').html(this.htmlPage(data))
        js_$('[page-start]').setAttribute('filter-page', data.first_page_url)
        js_$('[page-end]').setAttribute('filter-page', data.last_page_url)
        $('[show-number]').html(`Displaying ${data.to} of ${data.total} records`)

        js_$$('[filter-page]').forEach(
            element => {
                element.onclick = (a) => {
                    console.log(a.target.getAttribute('filter-page'));
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
                                    console.log(error.message)
                                    alert(error.message)
                                }
                            )
                    }
                }
            }
        )
    }
    
}

