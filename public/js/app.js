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

/*============================
=            AJAX            =
============================*/
$(window).on('load', function () {
  if ($('.select-office.ajax').val() >= 0) {
    obtenerDoctoresClinica();
  }

  var fecha = $('.appointmentAjax input[name="date"]').val();
  var doctor = $('.appointmentAjax select[name="doctor_id"]').val();
  appointmentAjaxLlenarHorario(fecha, doctor);
});
$('.appointmentAjax input[name="date"]').on('change', function () {
  var fecha = $(this).val();
  var doctor = $('.appointmentAjax select[name="doctor_id"]').val();
  console.log("doctor id " + doctor);
  appointmentAjaxLlenarHorario(fecha, doctor);
});
$('.appointmentAjax select[name="doctor_id"]').on('change', function () {
  var doctor = $(this).val();
  var fecha = $('.appointmentAjax input[name="date"]').val();
  appointmentAjaxLlenarHorario(fecha, doctor);
});

var __datos;

var desabilitado;

function appointmentAjaxLlenarHorario(fecha, doctor) {
  if (fecha == undefined || doctor == undefined) {
    return;
  }

  if (fecha.length > 0 && doctor.length > 0) {
    $('.groupTimepickerCita .bmd-label-floating').html('Hora');
    $.ajax({
      type: 'POST',
      url: _API + '/appointment/gettime',
      data: {
        date: fecha,
        doctor: doctor,
        _token: $('.appointmentAjax input[name="_token"]').val()
      },
      success: function success(data, _success) {
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
          /*let date= $('.appointmentAjax input[name=date]').val();
          				if (date == formatDateToday())
          {
          				horaActual = new Date().getHours();
          minutoActual = new Date().getMinutes();
          		if (horaMin<=horaActual)
          {
          	horaMin=horaActual;
          			if(minutoActual<30)
          	{
          		if(minutoMin=='00')
          		{
          			horaMin+=1;
          		}
          		else 	if(minutoActual>=30)
          		{
          			horaMin+=1;
          			minutoMin='30';
          				}
          	}
          		}
          		if(horaMax>=horaActual)
          {
          	Alert('Ya No puedes registrar citas hoy ');
          $('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input disabled class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
          }
          	}*/

          $('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');
          fijarMiHora();
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
      }
    });
  }
}
/*=====================================================
=            obtener medicos de una oficia            =
=====================================================*/


ExisteEspecialidadEnArray = function ExisteEspecialidadEnArray(array, element) {
  for (k = 0; k < array.length; k++) {
    if (element['id'] == array[k]['id']) {
      return true;
    }
  }

  return false;
};

__specialities = new Array();
__doctors = new Array();
$('.select-office.ajax').on('change', obtenerDoctoresClinica);

function obtenerDoctoresClinica() {
  $.ajax({
    type: 'GET',
    url: _API + "/offices/doctors/" + $('.select-office.ajax').val(),
    success: function success(data, _success2) {
      var doctores = JSON.parse(data);
      __doctors = doctores;

      for (i = 0; i < doctores.length; i++) {
        for (j = 0; j < doctores[i]['speciality'].length; j++) {
          if (!ExisteEspecialidadEnArray(__specialities, doctores[i]['speciality'][j])) {
            __specialities.push(doctores[i]['speciality'][j]);
          }
        }
      }

      html = '<option>Seleciona una especialidad</option>';

      for (i = 0; i < __specialities.length; i++) {
        html += '<option value="' + __specialities[i]['id'] + '" >' + __specialities[i]['name'] + ' ' + __specialities[i]['price'] + '</option>';
      }

      $('select[name=speciality_id]').html(html);
    }
  });
}

$('.select-speciality.ajax').on('change', function () {
  var doctores = __doctors;
  var specialityId = $('.select-speciality.ajax').val();
  html = '<option>Selecciona un doctor</option>';

  for (i = 0; i < doctores.length; i++) {
    for (j = 0; j < doctores[i].speciality.length; j++) {
      if (doctores[i].speciality[j].id == specialityId) {
        html += '<option value="' + doctores[i]['id'] + '" >' + doctores[i]['name'] + '</option>';
      }
    }
  }

  $('select[name=doctor_id]').html(html);
});
/*=====  End of AJAX  ======*/

fijarMiHora = function fijarMiHora() {
  horaActual = $('.appointmentAjax input[name=my-time]').val();

  if (horaActual == undefined) {
    return;
  }

  if (horaActual.length > 0) {
    $('.appointmentAjax input#select-time').val(horaActual);
  }
};

$('.appointment-reestablecer-hora').click(function () {
  fijarMiHora();
});
/*=================================
=            functions            =
=================================*/

function formatDateToday() {
  var d = new Date(),
      month = '' + (d.getMonth() + 1),
      day = '' + d.getDate(),
      year = d.getFullYear();
  if (month.length < 2) month = '0' + month;
  if (day.length < 2) day = '0' + day;
  return [year, month, day].join('-');
}
/*=====  End of functions  ======*/

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
  html = "<div class=\"col-6 col-md-4 col-xl-3\">\n\t<div class=\"card card-pricing\">\n\t<div class=\"card-body \">\n\t<h6 class=\"card-category text-gray\">\n\t<i class=\"fal fa-user-md\"></i> ".concat(especialidad['countDoctors'], " Doctores</h6>\n\t<div class=\"icon icon-info\">\n\t<i class=\"fal fa-file-certificate\"></i>\n\t</div>\n\t<h3 class=\"card-title\">").concat(especialidad['price'], " <small>consulta</small></h3>\n\t<p class=\"card-description\">\n\t<span class=\"text-uppercase text-primary\">\n\t").concat(especialidad['name'], "\n\t</span>\n\t<div class=\"stars\">");

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