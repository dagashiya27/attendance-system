import flatpickr from 'flatpickr/dist/flatpickr.min.js';
import { Japanese } from "flatpickr/dist/l10n/ja.js"


import flatpickr from "flatpickr";

flatpickr('#js-datepicker', {});

async function flatpickrInit() {
  const holidays = await fetchHolidays();
  flatpickr('#js-datepicker-5', {
    locale      : Japanese,
    dateFormat  : 'Y.m.d（D）H:i',
    defaultDate : minDate,
    minDate     : minDate,
    maxDate     : maxDate,
    enableTime  : true,
    minTime     : '09:00',
    maxTime     : '18:00',
    onDayCreate : (dObj, dStr, fp, dayElem) => {
      this.addHolidayClass(dayElem);
    }
  });
}

flatpickrInit();