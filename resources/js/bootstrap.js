import _ from 'lodash';
window._ = _;

import 'bootstrap';

import $ from "jquery";
window.$ = $;

import select2 from 'select2';
select2();

import Inputmask from 'inputmask';

$(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": true, "autoWidth": true,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "responsive": true,
    });
  });

  $('#inputLevel').select2({
    placeholder: 'Select Level'
});

$('#inputManager').select2({
    placeholder: 'Select Manager'
});


$('#inputPosition').select2({
    placeholder: 'Select Position',
    ajax: {
        url: '/positions/search',
        dataType: 'json',
processResults: function (data) {
  return {
    results:  $.map(data, function (item) {
          return {
              text: item.position,
              id: item.id
          }
      })
  };
},
cache: true
}
});

$(document).on('change','#inputLevel', function () {

var level = $(this).val();

$('#inputManager').select2({
    placeholder: 'Select Manager',
    ajax: {
        url: '/managers/search',
        dataType: 'json',
        data: {'level': level},
processResults: function (data) {
  return {
    results:  $.map(data, function (item) {
          return {
              text: item.full_name,
              id: item.id
          }
      })
  };
},
cache: true
}
});
});

//Initialize Select2 Elements
$('.select2bs4').select2({
theme: 'bootstrap4'
});

Inputmask('dd.mm.yy', { 'placeholder': 'dd.mm.yy' }).mask('#inputDate');
Inputmask().mask('[data-mask]');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ?? `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });
