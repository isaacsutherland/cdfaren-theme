import jQuery from 'jquery';
import './style.scss';

import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';

/**
 * Populate Router instance with DOM routes
 * @type {Router} routes - An instance of our router
 */
const routes = new Router({
  /** All pages */
  common,
  /** Home page */
  home
  /** About Us page, note the change from about-us to aboutUs. */
});

/** Load Events */
jQuery(document).ready(() => routes.loadEvents());

import qs from 'querystring'
let search = document.location.search
if (search) {
    let params = qs.decode(search.substring(1)),
        v = params.v
    if (v && (v == ('' + parseInt(v, 10))))
        document.cookie = `uiversion=${v};domain=.${document.location.hostname};path=/`
}
