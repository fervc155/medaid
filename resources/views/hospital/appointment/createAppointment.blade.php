@extends('layouts.nav-admin')

@section('content')




<div class="container mb-5 appointmentAjax">
	<div class="row justify-content-center">

		<div class="col-12 ">
			<div class="card">

				<div class="card-encabezado">

					<div class="card-cabecera-icono bg-info sombra-2 ">

						<i class="fal fa-calendar-check"></i>
					</div>
					<div class="card-title">Datos de la cita</div>
				</div>


				<div class="card-body">
  
         <div class="paso-head mb-5">

          <div class="content">

     
            <div class="fondo">
              <div class="avance">

              </div>
            </div>
          </div>
        </div>

        {!! Form::open(['action' => 'AppointmentController@store', 'method' => 'POST']) !!}
        <input type="hidden" name="_token" value="{{ csrf_token()}}">


        

          <!--=====================================
          =            DESCRIPCION            =
          ======================================-->
          <div class="paso" data-title="Motivo">


            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-quote-left"></i>
              </div>

              <div class="form-group">

                <label class="bmd-label-floating">Razón de la cita</label>

                {{Form::text('description', old('description'), ['class'=>'form-control'] )}}
              </div>
            </div>

          </div>



          <!--====  End of DESCRIPCION  ====-->


          <!--=============================
          =            PATIENT            =
          ==============================-->
          
          @if(Auth::user()->isPatient())
          <input type="hidden" name="patient_dni" id="patient_dni" value="{{Auth::user()->id_user ?? ''}}">

          @endif




          @if(Auth::user()->Doctor())
          <span class="d-none load-patients"></span>

            <div class="paso" data-title="Paciente">


              <div class="form-group form-inline align-items-end">
                <div class="icon-form">
                  <i class="fal fa-user-injured"></i>
                </div>


                <div class="form-group">

                  <select class="select2" name="patient_dni" id="patient_dni" data-style="select-with-transition" title="Selecciona un paciente" data-size="sd7">

                    <option>Selecciona un paciente</option>
                    <optgroup label="O prueba buscando su nombre">




                    </optgroup>
                  </select>


                </div>
              </div>

            </div>
          @endif

          
          <!--====  End of PATIENT  ====-->


          <!--============================
          =            OFFICE            =
          =============================-->


            <input type="text" name="office_id" value="{{old('office_id', $doctor->office_id  ?? ( $office->id ?? '' )  

            )}}" class="d-none">

            @if(isset($office))
                          <span class="d-none load-specialities"></span>

            @endif

          @if(!isset($doctor) && !isset($office))
          <div class="paso" data-title="Clinica">
            <span class="d-none load-offices"></span>


            <div class="icon-form">
              <i class="fal fa-hospital"></i>
            </div>
            Selecciona una oficina


            

            <div class="row"  id="offices" >


            </div>

          </div>
          @endif

          
          <!--====  End of OFFICE  ====-->

          <!--==================================
          =            SPECIALITIES            =
          ===================================-->
                <input type="text" name="speciality_id" value="{{old('speciality_id',$speciality->id??'')}}" class="d-none">
          @if(!isset($speciality))
            @if(isset($doctor))
            <span class="d-none load-my-specialities" data-doctor="{{$doctor->id}}"></span>
            @endif

          <div class="paso" data-title="Especialidad">
            <div class="form-group form-inline align-items-end ">
              <div class="icon-form">
                <i class="fal fa-hospital"></i>
              </div>



 



                <div class="row w-100"  id="specialities" >


                </div>

 
            </div>

          </div>
          @endif
          
          <!--====  End of SPECIALITIES  ====-->


          <!--============================
          =            DOCTOR            =
          =============================-->
                <input type="text" name="doctor_id" value="{{old('doctor_id', $doctor->id??'')}}" class="d-none">
                <input type="text" name="cost" value="{{old('cost',$speciality->id??'')}}" class="d-none">
          @if(!isset($doctor))
          <div class="paso" data-title="Doctor">
            <div class="form-group form-inline align-items-end ">
              <div class="icon-form">
                <i class="fal fa-hospital"></i>
              </div>


 




                <div class="row w-100"  id="doctors" >


                </div>

              

            </div>


          </div>
          @endif
          
          <!--====  End of DOCTOR  ====-->


          <!--==================================
          =            SELECT FECHA            =
          ===================================-->
          
          <div class="paso" data-title="Dia">
            <div class="form-group form-inline align-items-end">

              <div class="icon-form">
                <i class="fal fa-calendar-week"></i>
              </div>

              <div class="form-group">

                <label class="bmd-label-floating">Fecha</label>

                {{Form::date('date', '', ['class'=>'form-control datepicker'] )}}

              </div>
            </div>

          </div>
          
          <!--====  End of SELECT FECHA  ====-->

          <!--=================================
          =            SELECT HORA            =
          ==================================-->

          <div class="paso" data-title="Hora">



            <div class="form-group form-inline align-items-end">
              <div class="icon-form">
                <i class="fal fa-clock"></i>
              </div>

              <div class="form-group groupTimepickerCita">


                <label class="bmd-label-floating">Hora</label>

                {{Form::time('time', '', ['class'=>'form-control timepickerCita'] )}}
              </div>
            </div>


          </div>
          <!--====  End of SELECT HORA  ====-->
          
          
          
          
          
          






          <div class="paso" data-title="Confirmar">  
           <div class="my-3">

            <span class="d-block lead">Motivo: <span id="confirm-description"></span></span>
            <span class="d-block lead">Paciente: <span id="confirm-patient"></span></span>
            <span class="d-block lead">Clinica: <span id="confirm-office"></span></span>
            <span class="d-block lead">Especialidad: <span id="confirm-speciality"></span></span>
            <span class="d-block lead">Doctor: <span id="confirm-doctor"></span></span>
            <span class="d-block lead">Dia: <span id="confirm-date"></span></span>
            <span class="d-block lead">Hora: <span id="confirm-time"></span></span>
            <span class="d-block lead">costo: <span id="confirm-cost"></span></span>
            <button type="submit" class="btn btn-primary btn-block"><i class="fal fa-plus"> Agendar</i></button>
          </div>
        </div>
      </div>
    </form>
     <div class="d-flex justify-content-center mb-3">

              <button class="btn  btn-secondary  btn-round btn-sm prev"><i class="fas fa-chevron-left"></i> Anterior </button>
              

              <button class="btn  btn-primary  btn-round btn-sm next">Siguiente <i class="fas fa-chevron-right"></i></button>
            </div>


  </div>
</div>
</div> <!-- Fila -->
</div> <!-- Contenedor -->

@endsection