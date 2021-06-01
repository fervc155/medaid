/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/Appointments/appointment_comment.js":
/*!**********************************************************!*\
  !*** ./resources/js/Appointments/appointment_comment.js ***!
  \**********************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(".btn-confirm-delete-comment").click(function () {
  var ID = $(this).attr("comment-id");
  swal({
    title: "Cuidado",
    text: "Se eliminara el comentario permanentemente",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(function (willDelete) {
    if (willDelete) {
      $('#btn-delete-comment-' + ID).click();
      swal("Hecho", {
        icon: "success"
      });
    }
  });
});

/***/ }),

/***/ "./resources/js/Appointments/appointments.js":
/*!***************************************************!*\
  !*** ./resources/js/Appointments/appointments.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

if ($('.paso').length > 0) {
  /*=============================
  =            STEPS            =
  =============================*/
  var nPasos = $('.paso').length;
  var counter = 0;
  var next = $('.btn.next');
  var prev = $('.btn.prev');

  var showStep = function showStep() {
    $('.paso').fadeOut();
    setTimeout(function () {
      return $($('.paso')[counter]).fadeIn();
    }, 370);
  };

  next.on('click', function () {
    counter++;
    $(".circulo[data-id=".concat(counter, "]")).addClass('completo');
    $(".circulo[data-id=".concat(counter, "]")).html("<i class=\" fas fa-check\"></i>");
    $('.avance')[0].style.width = "".concat(100 / (nPasos - 1) * counter, "%");
    showStep();

    if (counter >= nPasos - 1) {
      next.hide();
    } else {
      prev.show();
    }
  });
  prev.on('click', function () {
    $(".circulo[data-id=".concat(counter, "]")).removeClass('completo');
    $(".circulo[data-id=".concat(counter, "]")).html("<i class=\" fas fa-d\">".concat(counter, "</i>"));
    counter--;
    $('.avance')[0].style.width = "".concat(100 / (nPasos - 1) * counter, "%");
    showStep();

    if (counter <= 0) {
      prev.hide();
    } else {
      next.show();
    }
  });
  /*=====  End of STEPS  ======*/

  next.on('click', function () {
    error = true;

    if (counter == nPasos - 1) {
      $('#confirm-description').html($('form [name=description]').val());
      $('#confirm-patient').html($('form [name=patient_dni]').val() > 0 ? '<i class="fas fa-check"></i>' : "X");
      $('#confirm-office').html($('form [name=office_id]').val() > 0 ? '<i class="fas fa-check"></i>' : "X");
      $('#confirm-speciality').html($('form [name=speciality_id]').val() > 0 ? '<i class="fas fa-check"></i>' : "X");
      $('#confirm-doctor').html($('form [name=doctor_id]').val() > 0 ? '<i class="fas fa-check"></i>' : "X");
      $('#confirm-date').html($('form [name=date]').val());
      $('#confirm-time').html($('form [name=time]').val());
      $('#confirm-cost').html($('form [name=cost]').val());
      if ($('form [name=description]').val().length > 0 && $('form [name=patient_dni]').val() > 0 && $('form [name=office_id]').val() > 0 && $('form [name=speciality_id]').val() > 0 && $('form [name=doctor_id]').val() > 0 && $('form [name=date]').val().length > 0 && $('form [name=cost]').val().length > 0 && $('form [name=time]').val().length > 0) error = false;
    }

    if (error) $('button[type=submit]').addClass('d-none');else $('button[type=submit]').removeClass('d-none');
  });
  /*=======================================
  =            OFFICE ONCHANGE            =
  =======================================*/

  $(document).on('click', '.btn-selectOffice', function (e) {
    var office_id = e.target.dataset.id;
    $('[name=office_id]').val(office_id);
    $('.card-office').removeClass('selected');
    $(".card-office[data-office=".concat(office_id, "]")).addClass('selected');
    exports.ajaxOffice(office_id);
  });
  /*=====  End of OFFICE ONCHANGE  ======*/

  /*============================================
  =            SPECIALITI oonchange            =
  ============================================*/

  $(document).on('click', '.btn-selectSpeciality', function (e) {
    if ($('.load-my-specialities').length > 0) {
      $('[name=cost]').val(e.target.dataset.cost);
      $('.btn.next').click();
      return;
    }

    var speciality_id = e.target.dataset.id;
    var office_id = $('[name=office_id]').val();
    $('[name=speciality_id]').val(speciality_id);
    $(".card-speciality").removeClass('selected');
    $(".card-speciality[data-speciality=".concat(speciality_id, "]")).addClass('selected');
    console.log(speciality_id);
    $.ajax({
      method: 'get',
      url: "".concat(_API, "/specialities/").concat(speciality_id, "/").concat(office_id, "/doctors"),
      success: function success(data) {
        data = JSON.parse(data);
        $('.btn.next').click();
        data.forEach(function (e) {
          var text = '';
          var i = 0;

          for (i; i < Math.ceil(e.stars); i++) {
            text += '<i class="fas fa-star"></i>';
          }

          for (i; i < 5; i++) {
            text += '<i class="fal fa-star"></i>';
          }

          $('#doctors').append("\n        <div class=\"col-md-4\">\n        <div class=\"card card-profile  card-doctor\" data-doctor=\"".concat(e.id, "\">\n\n        <div class=\"card-header card-header-image\">\n        <img style=\"max-width: 100%;\" class=\"img img-fluid\" src=\"").concat(e.Profileimg, "\">\n\n        </div>\n        <div class=\"card-body \">\n        <h2 class=\"card-category mt-4 text-gray\"><i class=\"fal fa-file-certificate\"></i>\n        ").concat(e.price, "</h2>\n        <h4 class=\"card-title\"> ").concat(e.name, "</h4>\n        <p class=\"card-description\">\n        <div class=\"stars\">\n        ").concat(text, "\n       </div>\n       <div>\n       ").concat(e.stars, "\n       </div>\n\n\n       </p>\n       <button type=\"button\" data-id=\"").concat(e.id, "\" data-cost=\"").concat(e.price, "\" class=\"btn btn-info btn-round btn-selectDoctor\">seleccionar</a>\n       </div>\n       </div>\n       </div> \n\n       "));
        });
      },
      error: function error() {
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
    });
  });
  $(document).on('click', '.btn-selectDoctor', function (e) {
    var doctor_id = e.target.dataset.id;
    $('[name=doctor_id]').val(doctor_id);
    var cost = e.target.dataset.cost;
    $('[name=cost]').val(cost);
    $(".card-doctor").removeClass('selected');
    $(".card-doctor[data-doctor=".concat(doctor_id, "]")).addClass('selected');
    $('.btn.next').click();
  });
  /*=====  End of SPECIALITI oonchange  ======*/

  /*=================================
  =            GET DIAYS            =
  ============================================*/

  $('[name=date]').on('change', function () {
    var doctor_id = $('[name=doctor_id]').val();
    var fecha = $('[name=date]').val();
    exports.obtenerHoras(fecha, doctor_id);
  });
  /*=====  End of GET DIAYS  ======*/

  $(document).ready(function () {
    //vars
    //start
    prev.hide();
    showStep(); //load steps

    var tramo = 100 / (nPasos - 1);

    for (var i = 0; i < nPasos - 1; i++) {
      $('.paso-head .content .fondo').append("<div class=\"tag\" style=\"left:".concat(tramo * i + tramo / 2, "% \">\n         <div class=\"circulo\" data-id=\"").concat(i + 1, "\"  >\n         <i class=\" fas fa-d\">").concat(i + 1, "</i>\n         </div>\n         <div class=\"titulo\">\n         <span>").concat($('.paso')[i].dataset.title, "</span>\n         </div>\n         </div>"));
      $($('.paso ')[i]).prepend("<h2>".concat($('.paso')[i].dataset.title, "</h2>"));
    }

    $($('.paso ')[nPasos - 1]).prepend("<h2>".concat($('.paso')[nPasos - 1].dataset.title, "</h2>")); //load patients

    if ($('.load-patients').length) {
      $.ajax({
        method: 'get',
        url: _API + '/patients',
        success: function success(data) {
          data = JSON.parse(data);
          data.forEach(function (e) {
            $('#patient_dni optgroup').append("<option value=\"".concat(e.id, "\">").concat(e.name, "</option>"));
          });
        },
        error: function error() {
          alert('hubo un error al descargar la informacion porfavor recargue la pagina');
        }
      });
    }

    if ($('.load-my-specialities').length) {
      $.ajax({
        method: 'get',
        url: _API + '/doctors/' + $('.load-my-specialities').data('doctor') + '/specialities',
        success: function success(data) {
          exports.specialityCard(JSON.parse(data));
        },
        error: function error() {
          alert('hubo un error al descargar la informacion porfavor recargue la pagina');
        }
      });
    }

    if ($('.load-specialities').length) {
      exports.ajaxOffice($('[name=office_id]').val());
    }

    if ($('.load-offices').length) {
      $.ajax({
        method: 'get',
        url: _API + '/offices',
        success: function success(data) {
          data = JSON.parse(data);
          data.forEach(function (e) {
            $('#offices ').append("\n                <div class=\"col-md-4\">\n                <div class=\"card card-rotate card-office\" data-office=\"".concat(e.id, "\">\n                <div class=\"front front-background\" style=\"background-image: url(").concat(e.Profileimg, ")\">\n                <div class=\"card-body\">\n                <a href=\"#pablo\">\n                <h3 class=\"card-title\">").concat(e.name, "</h3>\n                </a>\n                <p class=\"card-description\">\n                ").concat(e.address, "\n                <br>\n                </p>\n                <div class=\"stats text-center\">\n                <a target=\"_blank\" href=\"").concat(e.mapa, "\" type=\"button\" name=\"button\" class=\"btn btn-danger btn-fill btn-round btn-rotate\">\n                <i class=\"fal fa-map-marker\"></i> Ver mapa\n                </a>\n\n                <button data-id=\"").concat(e.id, "\"  class=\"btn btn-primary btn-round btn-selectOffice\" type=\"button\">seleccionar</button>\n\n\n\n                </div>\n                </div>\n                </div>\n\n                </div>  </div>\n\n                "));
          });
        },
        error: function error() {
          alert('hubo un error al descargar la informacion porfavor recargue la pagina');
        }
      });
    }
  });
  /*================================
  =            AUTONEXT            =
  ================================*/

  $('#patient_dni').on('change', function () {
    return $('.btn.next').click();
  });
  $('.datepicker').on('change', function () {
    return $('.btn.next').click();
  });
  $(document).on('change', '.timepicker', function () {
    return $('.btn.next').click();
  });
  /*=====  End of AUTONEXT  ======*/

  /*=================================
  =            GET HOURs            =
  =================================*/

  exports.specialityCard = function (data) {
    data.forEach(function (e) {
      $('#specialities').append("<div class=\"col-6 col-md-4 col-xl-3\">\n      <div class=\"card card-pricing card-speciality\" data-speciality=\"".concat(e.id, "\">\n      <div class=\"card-body \">\n      <h6 class=\"card-category text-gray\">\n\n      <div class=\"icon icon-info\">\n      <i class=\"fal fa-file-certificate\"></i>\n      </div>\n      <p class=\"card-description\">\n      <span class=\"text-uppercase text-primary\">\n\n      ").concat(e.name, "\n\n      </span>\n      <span class=\"d-block\">").concat(e.price ? e.price : '', "</span>\n\n\n      </p>\n      <button type=\"button\" data-id=\"").concat(e.id, "\" data-cost=\"").concat(e.cost ? e.cost : '', "\" class=\"btn btn-info btn-round btn-selectSpeciality\">seleccionar</a>\n      </div>\n      </div>\n\n\n\n      </div>"));
    });
  };

  exports.obtenerHoras = function (fecha, doctor) {
    if (fecha == undefined || doctor == undefined || fecha.length < 1 || doctor.length < 1) return false;
    $('.groupTimepickerCita .bmd-label-floating').html('Hora');
    $.ajax({
      type: 'POST',
      url: _API + '/appointment/gettime',
      data: {
        date: fecha,
        doctor: doctor,
        _token: $('.appointmentAjax input[name="_token"]').val()
      },
      success: function success(data) {
        __datos = JSON.parse(data);
        var cantidad = Object.keys(__datos).length;

        if (document.getElementsByClassName('timepicker')) {
          horaMax = __datos['outTime'][0] + __datos['outTime'][1];
          minutoMax = "00";

          if (__datos['outTime'][3] == '0') {
            minutoMax = '30';
            horaMax = horaMax - 1;
          }

          horaMin = __datos['inTime'][0] + __datos['inTime'][1];
          minutoMin = __datos['inTime'][3] + __datos['inTime'][4];
          $('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
          $('.timepickerCita').pickatime({
            min: [horaMin, minutoMin],
            max: [horaMax, minutoMax],
            clear: 'Quitar Hora',
            interval: 30,
            format: 'H:i',
            onClose: function onClose() {
              $('.groupTimepickerCita .bmd-label-floating').html('');
            }
          });

          for (t = 0; t < __datos['hours'].length; t++) {
            $('[aria-label="' + __datos['hours'][t] + '"]').remove();
          }
        }
      },
      error: function error() {
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
    });
  };

  exports.ajaxOffice = function (office_id) {
    $.ajax({
      method: 'get',
      url: _API + '/offices/' + office_id + '/specialities',
      success: function success(data) {
        if ($('.load-offices').length) $('.btn.next').click();
        exports.specialityCard(data);
      },
      error: function error() {
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
    });
  };
  /*=====  End of GET HOURs  ======*/

}

/***/ }),

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _plugins_calendar__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./plugins/calendar */ "./resources/js/plugins/calendar.js");
/* harmony import */ var _plugins_calendar__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_plugins_calendar__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _plugins_datatables__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./plugins/datatables */ "./resources/js/plugins/datatables.js");
/* harmony import */ var _plugins_datatables__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_plugins_datatables__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _plugins_datepicker__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./plugins/datepicker */ "./resources/js/plugins/datepicker.js");
/* harmony import */ var _plugins_datepicker__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_plugins_datepicker__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _plugins_waitme__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./plugins/waitme */ "./resources/js/plugins/waitme.js");
/* harmony import */ var _plugins_waitme__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_plugins_waitme__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _public_search__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./public-search */ "./resources/js/public-search.js");
/* harmony import */ var _public_search__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_public_search__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var _Appointments_appointments_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./Appointments/appointments.js */ "./resources/js/Appointments/appointments.js");
/* harmony import */ var _Appointments_appointments_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_Appointments_appointments_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _Appointments_appointment_comment_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./Appointments/appointment_comment.js */ "./resources/js/Appointments/appointment_comment.js");
/* harmony import */ var _Appointments_appointment_comment_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_Appointments_appointment_comment_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _dashboard__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./dashboard */ "./resources/js/dashboard.js");
/* harmony import */ var _dashboard__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_dashboard__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _buttons__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./buttons */ "./resources/js/buttons.js");
/* harmony import */ var _chat__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./chat */ "./resources/js/chat.js");
/* harmony import */ var _chat__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(_chat__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _stars__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./stars */ "./resources/js/stars.js");
/* harmony import */ var _stars__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_stars__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _web__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./web */ "./resources/js/web.js");
/* harmony import */ var _web__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(_web__WEBPACK_IMPORTED_MODULE_11__);
$ = jQuery.noConflict();
$(document).ready(function () {
  $('span.material-icons.check-mark').html('<i class="fal fa-check">');
  $(".select2").select2();
});













/***/ }),

/***/ "./resources/js/buttons.js":
/*!*********************************!*\
  !*** ./resources/js/buttons.js ***!
  \*********************************/
/*! exports provided: btnConfirmDelete, selectSpecialityDoctor, btnActualizarEspecialidad, btnActualizarReceta, btnUpdateComment, btnEditComment */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "btnConfirmDelete", function() { return btnConfirmDelete; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "selectSpecialityDoctor", function() { return selectSpecialityDoctor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "btnActualizarEspecialidad", function() { return btnActualizarEspecialidad; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "btnActualizarReceta", function() { return btnActualizarReceta; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "btnUpdateComment", function() { return btnUpdateComment; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "btnEditComment", function() { return btnEditComment; });
function btnConfirmDelete() {
  var ID = $(this).attr("id");
  swal({
    title: "Cuidado",
    text: "Se eliminara el registro permanentemente",
    icon: "warning",
    buttons: true,
    dangerMode: true
  }).then(function (willDelete) {
    if (willDelete) {
      $('.btn-delete#' + ID).click();
      swal("Hecho", {
        icon: "success"
      });
    }
  });
}
function selectSpecialityDoctor() {
  id = $(this).val();
  $('.speciality-price').each(function () {
    if (!$(this).hasClass('d-none')) {
      $(this).addClass('d-none');
    }
  });
  $('#speciality-price-' + id).removeClass('d-none');
} ///btn borrar especialidad

function btnActualizarEspecialidad() {
  var ID = $(this).data("id");
  var name = $(this).data("name");
  var cost = $(this).data("cost");
  $('form.actualizar-especialidad input[name="id"]').val(ID);
  $('form.actualizar-especialidad input[name="name"]').val(name);
  $('form.actualizar-especialidad input[name="cost"]').val(cost);
}
function btnActualizarReceta() {
  var ID = $(this).data("id");
  var content = $(this).data("content");
  $('form.actualizar-receta input[name="prescription_id"]').val(ID);
  $('form.actualizar-receta textarea').html(content);
}
function btnUpdateComment() {
  var ID = $(this).data("commentid");
  console.log(ID);
  $('#btn-update-comment-' + ID).click();
}
function btnEditComment() {
  var ID = $(this).data("commentid");
  $(this).addClass('d-none');
  $('textarea#' + ID).removeAttr('disabled');
  $('span#btn-submit-' + ID).removeClass('d-none');
}
/*=====  End of SCRIPTS.js  ======*/

/*=================================
=            INIT            =
=================================*/

/*=====  End of INIT  ======*/

/*=================================
=            CALLBACKS            =
=================================*/

$(".btn-confirm-delete").click(btnConfirmDelete);
$(".select-speciality-doctor").on('change', selectSpecialityDoctor);
$(".btn-actualizar-receta").click(btnActualizarReceta);
$(".btn-actualizar-especialidad").click(btnActualizarEspecialidad);
$(".btn-edit-comment").click(btnEditComment);
$(".btn-update-comment").click(btnUpdateComment);

/***/ }),

/***/ "./resources/js/chat.js":
/*!******************************!*\
  !*** ./resources/js/chat.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

if ($('.chat-contenido').lenght > 0) {
  $(".chat-contenido").scrollTop($(".chat-contenido")[0].scrollHeight);
}

/***/ }),

/***/ "./resources/js/dashboard.js":
/*!***********************************!*\
  !*** ./resources/js/dashboard.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(cerrarDashboardAliniciar);

function cerrarDashboardAliniciar() {
  width = $(window).width();

  if (width < 768) {
    CerrarDashboard();
  }
}

$(document).ready();
$(window).resize(function () {
  width = $(window).width();

  if (width < 768) {
    if ($('.navbar-responsive').hasClass('navbar-responsive-open')) {
      CerrarDashboard();
    }
  } else {
    if (!$('.navbar-responsive').hasClass('navbar-responsive-open')) {
      AbrirDashboard();
    }
  }
});

function CerrarDashboard() {
  if ($('.navbar-responsive').hasClass('navbar-responsive-open')) {
    $('.navbar-responsive').removeClass('navbar-responsive-open');
    $('.main-admin').removeClass('main-admin-open');
    $('#button-dashboard').removeClass('button-dashboard-open');
    $('#button-menu').removeClass('button-menu-disabled');
  }
}

function AbrirDashboard() {
  if (!$('.navbar-responsive').hasClass('navbar-responsive-open')) {
    $('.navbar-responsive').addClass('navbar-responsive-open');
    $('.main-admin').addClass('main-admin-open');
    $('#button-dashboard').addClass('button-dashboard-open');
    $('#button-menu').addClass('button-menu-disabled');
  }
}

$('#button-dashboard').click(function () {
  if ($('.navbar-responsive').hasClass('navbar-responsive-open')) {
    CerrarDashboard();
  } else {
    AbrirDashboard();
  }
});
$('.navbar-responsive-base').click(AbrirDashboard);

/***/ }),

/***/ "./resources/js/plugins/calendar.js":
/*!******************************************!*\
  !*** ./resources/js/plugins/calendar.js ***!
  \******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Calendario = /*#__PURE__*/function () {
  function Calendario() {
    _classCallCheck(this, Calendario);

    self = this;
    this.calendar = new FullCalendar.Calendar(document.getElementById('calendar'), {
      plugins: ['dayGrid'],
      displayEventTime: true,
      eventClick: function eventClick(info) {
        var eventObj = info.event;
        self.ObtenerCita(eventObj.id);
      },
      customButtons: {
        myCustomButton: {
          text: 'custom!',
          click: function click() {}
        }
      },
      header: {
        left: 'title ',
        center: 'prev,next today',
        right: 'dayGridMonth,dayGridWeek,dayGridDay'
      }
    });
    this.ObtenerCitas();
  }

  _createClass(Calendario, [{
    key: "llenarModal",
    value: function llenarModal(data) {
      $('#btn-show-appointment').click();
      $('#data-date span').html(data['date']);
      $('#data-time span').html(data['time']);
      $('#data-price span').html(data['price']);
      $('#data-patient span').html(data['patient_name']);
      $('#data-doctor span').html(data['doctor_name']);
      $('#data-office span').html(data['office']);
      $('#data-status span').html(data['status']);
      $('#data-href').attr('href', _URL + "/appointment/" + data['id']);
    }
  }, {
    key: "ObtenerCitas",
    value: function ObtenerCitas() {
      self = this;
      $.ajax({
        type: 'POST',
        url: $('.datos-calendario #url').data('url'),
        data: {
          id: $('.datos-calendario #id').data('id'),
          _token: $('.datos-calendario input[name="_token"]').val()
        },
        success: function success(data, _success) {
          self.LlenarCalendario(JSON.parse(data));
        }
      });
    }
  }, {
    key: "ObtenerCita",
    value: function ObtenerCita(idCita) {
      self = this;
      $.ajax({
        type: 'POST',
        url: _API + '/appointment',
        data: {
          id: idCita,
          _token: $('.datos-calendario input[name="_token"]').val()
        },
        success: function success(data, _success2) {
          self.llenarModal(JSON.parse(data));
        }
      });
    }
  }, {
    key: "LlenarCalendario",
    value: function LlenarCalendario(citas) {
      var _this = this;

      if (citas.length < 1) {
        return;
      }

      citas.forEach(function (cita) {
        var bloqueCita = {
          title: cita['time'],
          start: cita['date'],
          id: cita['id']
        };

        _this.calendar.addEvent(bloqueCita);
      });
      this.calendar.setOption('locale', 'es');
      this.calendar.render();
    }
  }], [{
    key: "Existe",
    value: function Existe() {
      if (document.getElementById('calendar')) {
        return true;
      } else {
        return false;
      }
    }
  }]);

  return Calendario;
}();

$(document).ready(function () {
  if (Calendario.Existe()) {
    var calendario = new Calendario();
  }
});

/***/ }),

/***/ "./resources/js/plugins/datatables.js":
/*!********************************************!*\
  !*** ./resources/js/plugins/datatables.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  //data tables
  var data = {
    "lengthMenu": "Mostrar _MENU_ registros por página",
    "zeroRecords": "No se encontró ningún resultado :(",
    "info": "Mostrando página _PAGE_ de _PAGES_",
    "infoEmpty": "No hay registros disponibles.",
    "infoFiltered": "(filtrado de _MAX_ registros en total)",
    "search": "Buscar:",
    "paginate": {
      "first": "Primera",
      "last": "Última",
      "next": "Siguiente",
      "previous": "Anterior"
    }
  };
  $('#data_table').DataTable({
    "language": data
  });
  $('#data_table_pacientes').DataTable({
    "language": data
  });
  $('#data_table_medicos').DataTable({
    "language": data
  });
  $('#data_table_citas').DataTable({
    "language": data
  });
  $('#data_table_consultorios').DataTable({
    "language": data
  });
  $('#data_table_today').DataTable({
    "language": data
  });
  $('#data_table_pending').DataTable({
    "language": data
  });
});

/***/ }),

/***/ "./resources/js/plugins/datepicker.js":
/*!********************************************!*\
  !*** ./resources/js/plugins/datepicker.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

if (document.getElementsByClassName('datepicker2')) {
  var Fecha = new Date();
  $('.datepicker2').pickadate({
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
    format: 'yyyy-mm-dd',
    selectMonths: true,
    selectYears: 100,
    max: new Date(Fecha.getFullYear() - 18, Fecha.getMonth(), Fecha.getDate())
  });
}

if (document.getElementsByClassName('timepicker')) {
  $('.timepickerEntrada').pickatime({
    min: [9, 0],
    max: [16 - 4, 0],
    clear: 'Quitar Hora',
    interval: 30,
    format: 'H:i'
  });
  $('.timepickerEntrada').on('change', function () {
    horaEntrada = $(this).val();
    hora = parseInt(horaEntrada.substring(0, 2));
    minutos = parseInt(horaEntrada.substring(3, 5));
    $('.formtimepickerSalida').removeClass('d-none');
    $('.timepickerSalida').pickatime({
      min: [hora + 4, minutos],
      max: [16, 0],
      clear: 'Quitar Hora',
      interval: 30,
      format: 'H:i'
    });
  });
}

if (document.getElementsByClassName('datepicker')) {
  var Fecha = new Date();
  $('.datepicker').pickadate({
    today: 'Hoy',
    clear: 'Limpiar',
    close: 'Cerrar',
    format: 'yyyy-mm-dd',
    selectMonths: true,
    min: new Date(Fecha.getFullYear(), Fecha.getMonth(), Fecha.getDate() + 1),
    max: new Date(Fecha.getFullYear() + 1, Fecha.getMonth(), Fecha.getDate())
  });
}

/***/ }),

/***/ "./resources/js/plugins/waitme.js":
/*!****************************************!*\
  !*** ./resources/js/plugins/waitme.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function esperar() {
  $('body').waitMe({
    effect: 'bounce',
    text: 'Cargando',
    bg: 'white',
    color: 'var(--principal)',
    maxSize: '',
    waitTime: -1,
    textPos: 'vertical',
    fontSize: '',
    source: '',
    onClose: function onClose() {}
  });
}

$('nav a.nav-link').on('click', function () {//	esperar()
});
$('.link').on('click', function () {
  esperar();
});
$('.btn-wait').on('click', function () {
  esperar();
});
$('.no-wait').attr("onclick", "").unbind("click");

/***/ }),

/***/ "./resources/js/public-search.js":
/*!***************************************!*\
  !*** ./resources/js/public-search.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*----------  especialidad  ----------*/
var timeout;
$('#formulario-especialidades-ajax input[name="search"]').on('keydown', function () {
  var _this = this;

  clearTimeout(timeout);
  timeout = setTimeout(function () {
    waitSearchStart();
    var search = $(_this).val();
    $.ajax({
      type: 'POST',
      url: _API + '/visitante/search-especialidades',
      data: {
        search: $(_this).val(),
        _token: $('#formulario-especialidades-ajax input[name="_token"]').val()
      },
      success: function success(data, _success) {
        var especialidades = JSON.parse(data);
        var html = '';
        especialidades.forEach(function (especialidad) {
          html += especialidadCard(especialidad);
        });

        if (especialidades.length < 1) {
          html = "<div class=\"col\"><h2>No se encontro nada para: '".concat(search, "</h2></div>");
        }

        $('main.container .row').html(html);
        waitSearchStop();
      }
    });
    clearTimeout(timeout);
  }, 1000);
});
/*----------   especialidad doctores  ----------*/

$('#formulario-especialidad-doctores-ajax input[name="search"]').on('keydown', function () {
  var _this2 = this;

  clearTimeout(timeout);
  timeout = setTimeout(function () {
    waitSearchStart();
    var search = $(_this2).val();
    $.ajax({
      type: 'POST',
      url: _API + '/visitante/search-doctores/especialidad',
      data: {
        search: $(_this2).val(),
        speciality: $('#formulario-especialidad-doctores-ajax input[name="speciality"]').val(),
        _token: $('#formulario-especialidad-doctores-ajax input[name="_token"]').val()
      },
      success: function success(data, _success2) {
        var doctores = JSON.parse(data);
        var html = '';
        doctores.forEach(function (doctor) {
          html += doctorCard(doctor);
        });

        if (doctores.length < 1) {
          html = "<div class=\"col\"><h2>No se encontro nada para: ".concat(search, " </h2></div>");
        }

        $('main.container .row').html(html);
        waitSearchStop();
      }
    });
    clearTimeout(timeout);
  }, 1000);
});
/*----------   doctores  ----------*/

$('#formulario-doctores-ajax input[name="search"]').on('keydown', function () {
  var _this3 = this;

  clearTimeout(timeout);
  timeout = setTimeout(function () {
    waitSearchStart();
    var search = $(_this3).val();
    $.ajax({
      type: 'POST',
      url: _API + '/visitante/search-doctores',
      data: {
        search: $(_this3).val(),
        _token: $('#formulario-doctores-ajax input[name="_token"]').val()
      },
      success: function success(data, _success3) {
        var doctores = JSON.parse(data);
        var html = '';
        doctores.forEach(function (doctor) {
          html += doctorCard(doctor);
          console.log("html", html);
        });

        if (doctores.length < 1) {
          html = "<div class=\"col\"><h2>No se encontro nada para: ".concat(search, "</h2></div>");
        }

        $('main.container .row').html(html);
        waitSearchStop();
      }
    });
    clearTimeout(timeout);
  }, 1000);
});
/*----------   citas  ----------*/

$('#formulario-citas-ajax input[name="search"]').on('keydown', function () {
  var _this4 = this;

  clearTimeout(timeout);
  timeout = setTimeout(function () {
    waitSearchStart();
    var search = $(_this4).val();
    $.ajax({
      type: 'POST',
      url: $('#formulario-citas-ajax input[name="url"]').val(),
      data: {
        id: $(_this4).val(),
        _token: $('#formulario-citas-ajax input[name="_token"]').val()
      },
      success: function success(data, _success4) {
        var citas = JSON.parse(data);
        var html = '';
        citas.forEach(function (cita) {
          html += "\n\t\t\t\t\t<tr>\n\t\t\t\t\t<td>".concat(cita['date'], " - ").concat(cita['time'], "  </td>\n\t\t\t\t\t<td>").concat(cita['price'], "</td>\n\t\t\t\t\t<td><a class=\"link\" href=\"").concat(_URL, "/visitante/doctor/").concat(cita['doctor_id'], "\">").concat(cita['doctor_name'], "</a></td>\n\t\t\t\t\t<td><a class=\"link\" href=\"").concat(_URL, "/visitante/consultorio/").concat(cita['office_id'], "\">").concat(cita['office'], "</a></td>\n\t\t\t\t\t<td>").concat(cita['status'], "</a></td>\n\t\t\t\t\t<td>\n\t\t\t\t\t</tr>");
        });

        if (citas.length < 1) {
          $('#nombre-paciente').html('No se encontro nada para: ' + search);
        } else {
          $('#nombre-paciente').html(citas[0]['name']);
        }

        $('#body-table-citas').html(html);
        waitSearchStop();
      }
    });
    clearTimeout(timeout);
  }, 1000);
});

waitSearchStart = function waitSearchStart() {
  $('main.container').waitMe({
    effect: 'bounce',
    text: 'Cargando',
    bg: '#F5F5F5',
    color: 'var(--principal)',
    maxSize: '',
    waitTime: -1,
    textPos: 'vertical',
    fontSize: '',
    source: '',
    onClose: function onClose() {}
  });
};

waitSearchStop = function waitSearchStop() {
  $('main.container').waitMe("hide");
};

function doctorCard(doctor) {
  html = "\n\t<div class=\"col-sm-6 col-md-4 \">\n\t<div class=\"card card-profile\">\n\t<div class=\"card-header card-header-image\">\n\t<img style=\"max-width: 100%;\" class=\"img img-fluid\" src=\"".concat(doctor['Profileimg'], "\">\n\t</div>\n\t<div class=\"card-body \">\n\t<h6 class=\"card-category mt-4 text-gray\"><i class=\"fal fa-file-certificate\"></i>\n\t").concat(doctor['MinMaxCost'], "</h6>\n\t<h4 class=\"card-title\"> ").concat(doctor['name'], "</h4>\n\t<p class=\"card-description\">\n\t<div class=\"stars\">");

  for (j = 0; j < doctor['StarsEarned']; j++) {
    html += '<i class="fas fa-star"></i>';
  }

  for (j = 0; j < doctor['StarsMissing']; j++) {
    html += '<i class="fal fa-star"></i>';
  }

  html += "\n\t</div>\n\t<div>\n\t".concat(doctor['stars'], "\n\t</div>\n\n\t<div>");

  if (null != doctor['specialities']) {
    doctor['specialities'].forEach(function (speciality) {
      html += "<span class=\"badge badge-pill badge-primary\">".concat(speciality['name'], "</span>");
    });
  }

  html += "\t\n\t</div>\n\n\t</p>\n\t<a href=\"".concat(_URL, "/visitante/doctor/").concat(doctor['id'], "\" class=\"btn btn-info btn-round\"><i class=\"fal fa-calendar-check\"></i> Ver Calendario</a>\n\t</div>\n\t</div>\n\t</div>\n\t");
  return html;
}

function especialidadCard(especialidad) {
  html = "<div class=\"col-6 col-md-4 col-xl-3\">\n\t<div class=\"card card-pricing\">\n\t<div class=\"card-body \">\n\t<h6 class=\"card-category text-gray\">\n\t<i class=\"fal fa-user-md\"></i> ".concat(especialidad['countDoctors'], " Doctores</h6>\n\t<div class=\"icon icon-info\">\n\t<i class=\"fal fa-file-certificate\"></i>\n\t</div>\n\t<h3 class=\"card-title\"><small>A partir de</small> ").concat(especialidad['price'], " <small>consulta</small></h3>\n\t<p class=\"card-description\">\n\t<span class=\"text-uppercase text-primary\">\n\t").concat(especialidad['name'], "\n\t</span>\n\t<div class=\"stars\">");

  for (j = 0; j < especialidad['StarsEarned']; j++) {
    html += '<i class="fas fa-star"></i>';
  }

  for (j = 0; j < especialidad['StarsMissing']; j++) {
    html += '<i class="fal fa-star"></i>';
  }

  html += "</div>\n\t<div>\n\t".concat(especialidad['stars'], "\n\t</div>\n\t</p>\n\t<a href=\"").concat(_URL, "/visitante/especialidad/").concat(especialidad['id'], "\" class=\"btn btn-info btn-round\">Ver doctores</a>\n\t</div>\n\t</div>\n\t</div>");
  return html;
}

/***/ }),

/***/ "./resources/js/stars.js":
/*!*******************************!*\
  !*** ./resources/js/stars.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$('.click-star').on('click', function () {
  n = $(this).data('star');
  $(".click-star ").removeClass('fas');
  $(".click-star ").addClass('fal');
  $('input[type=hidden][name=stars]').val(n);

  for (i = 1; i <= n; i++) {
    $(".click-star[data-star=".concat(i, "]")).removeClass('fal');
    $(".click-star[data-star=".concat(i, "]")).addClass('fas');
  }
});

/***/ }),

/***/ "./resources/js/web.js":
/*!*****************************!*\
  !*** ./resources/js/web.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*============================================
=            Establecer callbacks            =
============================================*/
function filtrarMedicoPorEspecialidad() {
  especialidad = $(this).val();
  var card_doctor = document.querySelectorAll('.card-doctor');

  if (especialidad == "Todos") {
    card_doctor.forEach(function (doctor) {
      doctor.classList.remove('d-none');
    });
    return;
  }

  card_doctor.forEach(function (doctor) {
    doctor.classList.add('d-none');
  });
  var card_especialidad = document.querySelectorAll('.' + especialidad);
  card_especialidad.forEach(function (especialidad) {
    especialidad.classList.remove('d-none');
  });
}

$('#select-especialidad').change(filtrarMedicoPorEspecialidad);
/*=====  End of Establecer callbacks  ======*/

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\xampp\htdocs\laravel\hospital\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! C:\xampp\htdocs\laravel\hospital\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });