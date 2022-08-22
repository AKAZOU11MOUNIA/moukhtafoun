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
    this.form = element.querySelector('.js-filter-form')
    this.bindEvents()
}

}