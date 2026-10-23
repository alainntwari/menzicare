/*
 * MenziCare page scripts.
 * All server calls are asynchronous (fetch) and send the X-Requested-With header,
 * so the server answers with a short message instead of redirecting when a
 * session expired or access is denied.
 */
(function () {
  'use strict';

  var latestRequest = {};

  function csrfToken() {
    var meta = document.querySelector('meta[name="csrf-token"]');
    return meta ? meta.content : '';
  }

  function qs(params) {
    return Object.keys(params).map(function (k) {
      return encodeURIComponent(k) + '=' + encodeURIComponent(params[k]);
    }).join('&');
  }

  function valueOf(id) {
    var el = document.getElementById(id);
    return el ? el.value : '';
  }

  /**
   * Load a URL into the element with the given id.
   * Only the newest request per element is applied, so fast typing in a
   * search box never shows stale results.
   */
  function loadInto(targetId, url, options) {
    var target = document.getElementById(targetId);
    if (!target) {
      return Promise.resolve();
    }
    var ticket = (latestRequest[targetId] || 0) + 1;
    latestRequest[targetId] = ticket;
    target.setAttribute('aria-busy', 'true');
    target.style.opacity = '0.5';

    options = options || {};
    options.credentials = 'same-origin';
    options.headers = options.headers || {};
    options.headers['X-Requested-With'] = 'fetch';

    return fetch(url, options)
      .then(function (response) { return response.text(); })
      .then(function (html) {
        if (latestRequest[targetId] === ticket) {
          target.innerHTML = html;
        }
      })
      .catch(function () {
        if (latestRequest[targetId] === ticket) {
          target.innerHTML = '<div class="alert alert-danger">Could not load this content. Please check your connection and try again.</div>';
        }
      })
      .then(function () {
        if (latestRequest[targetId] === ticket) {
          target.removeAttribute('aria-busy');
          target.style.opacity = '';
        }
      });
  }

  function postInto(targetId, url, params) {
    params.csrf_token = csrfToken();
    return loadInto(targetId, url, {
      method: 'POST',
      headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
      body: qs(params)
    });
  }

  // Wait until the user stops typing before searching
  function debounce(fn, ms) {
    var timer;
    return function () {
      var args = arguments, self = this;
      clearTimeout(timer);
      timer = setTimeout(function () { fn.apply(self, args); }, ms);
    };
  }

  // Shared with inline page code
  window.loadInto = loadInto;
  window.postInto = postInto;

  /* ---------------- Admin: users ---------------- */
  window.users_list = function () {
    loadInto('main-content', '../users/users_list_2.php');
  };
  window.create_new_user = function () {
    loadInto('main-content', '../users/create_new_user.php');
  };
  window.view_user_details = function (id) {
    loadInto('main-content', '../users/user_details.php?' + qs({ id: id }));
  };
  window.specialties_hours = function (id) {
    loadInto('home', '../users/specialties_hours.php?' + qs({ id: id }));
  };

  /* ---------------- Admin: institutions ---------------- */
  window.healthcare_institutions_list = function () {
    loadInto('main-content', '../health-care-institutions/list_2.php');
  };
  window.create_new_healthcare_institution = function () {
    loadInto('main-content', '../health-care-institutions/create_new.php');
  };
  window.view_institution_details = function (id) {
    loadInto('main-content', '../health-care-institutions/institution_details.php?' + qs({ id: id }));
  };

  // Province -> district -> sector -> cell -> village dropdowns
  window.change_province = function () {
    loadInto('district', '../health-care-institutions/province.php?' + qs({ province: valueOf('provincedd') }));
  };
  window.change_district = function () {
    loadInto('sector', '../health-care-institutions/district.php?' + qs({ district: valueOf('districtdd') }));
  };
  window.change_sector = function () {
    loadInto('cell', '../health-care-institutions/sector.php?' + qs({ sector: valueOf('sectordd') }));
  };
  window.change_cell = function () {
    loadInto('village', '../health-care-institutions/cell.php?' + qs({ cell: valueOf('celldd') }));
  };

  /* ---------------- Doctors ---------------- */
  window.doctor_details = function (id) {
    loadInto('content_here', '../doctor-details/doctor_details.php?' + qs({ id: id }));
  };

  // Week navigation of a doctor's booking slots; n is the doctor's card number on the page
  function changeDay(page, n) {
    loadInto('bo' + n, '../doctor-appointments/' + page + '?' + qs({
      day: valueOf('day' + n),
      div: valueOf('div' + n),
      ds_id: valueOf('ds_id' + n)
    }));
  }
  window.next_day = function (n) { changeDay('next-day.php', n); };
  window.prev_day = function (n) { changeDay('prev-day.php', n); };

  // "More Details" on a doctor card: show its panel, hide the others
  $(document).on('click', '.js-details-toggle', function () {
    var panel = $('#' + $(this).data('panel'));
    $('.js-details-panel').not(panel).hide();
    panel.show(1000);
  });

  /* ---------------- Search ---------------- */
  var searchAll = debounce(function () {
    loadInto('content-id', '../app/search_all.php?' + qs({
      item: valueOf('search-item'),
      location: valueOf('search-location')
    }));
  }, 300);
  window.search_all = searchAll;

  window.search_test = function () {
    loadInto('content-id', '../app/search_test.php?' + qs({
      test: valueOf('search-test'),
      location: valueOf('search-location')
    }));
  };
  window.search_test_id = function (id) {
    loadInto('content_here', '../app/search_test_id.php?' + qs({ test: id }));
  };
  window.search_vaccine = function () {
    loadInto('content-id', '../app/search_vaccine.php?' + qs({
      vaccine: valueOf('search-vaccine'),
      location: valueOf('search-location')
    }));
  };
  window.search_vaccine_id = function (id) {
    loadInto('content_here', '../app/search_vaccine_id.php?' + qs({ vaccine: id }));
  };

  /* ---------------- Patient history access ---------------- */
  // bookingId only picks where the reply is shown (one patient can have several bookings)
  window.request_permission_to_patient = function (patientId, bookingId) {
    postInto('otp_area_' + bookingId, '../app/request_patient_permission.php', { id: patientId });
  };
})();
