export default class Filter{
    /**
   * @param {HTMLElement|null} element
   */
  constructor (element) {
    if (element === null) {
      return
    }
    this.pagination = element.querySelector('.js-filter-pagination')
    this.content = element.querySelector('.js-filter-content')
    this.sorting = element.querySelector('.js-filter-sorting')
    this.form = element.querySelector('.js-filter-form')
    this.bindEvents()
    
}

bindEvents () {
    const aClickListener = e => {
      if (e.target.tagName === 'A') {
        e.preventDefault()
        this.loadUrl(e.target.getAttribute('href'))
      }
    }
    if (this.sorting) {
    this.sorting.addEventListener('click', aClickListener)
    }
    if (this.pagination) {
    this.pagination.addEventListener('click', aClickListener)
     } if (this.form) {
    this.form.querySelectorAll('input').forEach(input => {
      input.addEventListener('change', this.loadForm.bind(this))
    })
    
  }
}

  async loadForm () {
    const data = new FormData(this.form)
    const url = new URL(this.form.getAttribute('action') || window.location.href)
    const params = new URLSearchParams()
    data.forEach((value, key) => {
      params.append(key, value)
    })
    return this.loadUrl(url.pathname + '?' + params.toString())
    
  }

  async loadUrl (url, append = false) {
    this.showLoader()
    const params = new URLSearchParams(url.split('?')[1] || '')
    params.set('ajax', 1)
    const response = await fetch(url.split('?')[0] + '?' + params.toString(), {
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    if (response.status >= 200 && response.status < 300) {
      const data = await response.json()
      this.flipContent(data.content, append)
      this.sorting.innerHTML = data.sorting
      this.pagination.innerHTML = data.pagination
      console.log('hi')
    } else {
      console.error(response)
    }
    this.hideLoader()
    
  }
  

  showLoader () {
    // Code à écrire
  }

  hideLoader () {
    // Code à écrire
  }
}