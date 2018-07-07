
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 * 
 * <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="assets/js/core/popper.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/plugin/chartist/chartist.min.js"></script>
<script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
<script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
<script src="assets/js/plugin/chart-circle/circles.min.js"></script>
<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>



 */

require('./bootstrap');
require('sifter');
require('microplugin');



require('./plugin/jquery-ui-1.12.1.custom/jquery-ui.min');
require('./plugin/chartist/plugin/chartist-plugin-tooltip.min');
require('./plugin/jquery-scrollbar/jquery.scrollbar.min');
require('./plugin/bootstrap-notify/bootstrap-notify.min');
require('./plugin/bootstrap-toggle/bootstrap-toggle.min');
require('./plugin/chart-circle/circles.min');
require('./plugin/chart-circle/circles.min');

require('./ready');
require('./demo');

require('./methods/modal');
require('./methods/tag');
window.Vue = require('vue');
window.sel = require('selectize/dist/js/standalone/selectize');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});


//user methods
import NotifHandler from './methods/notif';
global.NotificationHandler = NotifHandler;

