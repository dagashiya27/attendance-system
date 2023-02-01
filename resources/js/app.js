import './bootstrap';

import flatpickr from 'flatpickr/dist/flatpickr.min.js';
import { Japanese } from "flatpickr/dist/l10n/ja.js"

import flatpickr from "flatpickr";



flatpickr(".js-calendar", {
    locale      : Japanese,
    dateFormat  : 'Y.m.d（D）H:i',
    defaultDate : minDate,
    minDate     : minDate,
    maxDate     : maxDate,
    enableTime  : true,
    minTime     : '09:00',
    maxTime     : '18:00',
        plugins: [
          
        ],
      })