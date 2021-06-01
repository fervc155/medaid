
if($('.paso').length>0){


  /*=============================
  =            STEPS            =
  =============================*/
  
  
  

  
  const nPasos = $('.paso').length
  let counter=0;

  const  next = $('.btn.next');
  const prev = $('.btn.prev');


  let showStep =function(){

    $('.paso').fadeOut();

    setTimeout(()=>$($('.paso')[counter]).fadeIn(),370);
    

  }


  next.on('click',()=>{
    counter++;

    $(`.circulo[data-id=${counter}]`).addClass('completo');
    $(`.circulo[data-id=${counter}]`).html(`<i class=" fas fa-check"></i>`);




    $('.avance')[0].style.width=`${100/ (nPasos-1) * counter }%`;

     showStep();
    if(counter>=nPasos-1){
      next.hide();
    }else{

      prev.show();
    }
  })

  prev.on('click',()=>{
    $(`.circulo[data-id=${counter}]`).removeClass('completo');
    $(`.circulo[data-id=${counter}]`).html(`<i class=" fas fa-d">${counter}</i>`);

    counter--;
    $('.avance')[0].style.width=`${100/ (nPasos-1) * counter }%`;

    showStep();
    if(counter<=0){
      prev.hide();
    }
    else{
      next.show();
    }


  })  /*=====  End of STEPS  ======*/


  next.on('click',()=>{

    error=true;
    if(counter==nPasos-1){
      $('#confirm-description').html($('form [name=description]').val());  
      $('#confirm-patient').html($('form [name=patient_dni]').val()>0 ? '<i class="fas fa-check"></i>' : "X");  
      $('#confirm-office').html($('form [name=office_id]').val()>0 ? '<i class="fas fa-check"></i>' : "X");  
      $('#confirm-speciality').html($('form [name=speciality_id]').val()>0 ? '<i class="fas fa-check"></i>' : "X");  
      $('#confirm-doctor').html($('form [name=doctor_id]').val()>0 ? '<i class="fas fa-check"></i>' : "X");  
      $('#confirm-date').html($('form [name=date]').val());  
      $('#confirm-time').html($('form [name=time]').val());  
      $('#confirm-cost').html($('form [name=cost]').val());  


      if(
        $('form [name=description]').val().length>0 &&
        $('form [name=patient_dni]').val()>0 &&
        $('form [name=office_id]').val()>0 &&
        $('form [name=speciality_id]').val()>0 &&
        $('form [name=doctor_id]').val()>0 &&
        $('form [name=date]').val().length>0 &&
        $('form [name=cost]').val().length>0 &&
        $('form [name=time]').val().length>0

        )
        error =false;


    }


    if(error)
      $('button[type=submit]').addClass('d-none')
    else
      $('button[type=submit]').removeClass('d-none')

  }
  )






/*=======================================
=            OFFICE ONCHANGE            =
=======================================*/

$(document).on('click','.btn-selectOffice',(e)=>{

 let office_id =e.target.dataset.id
 $('[name=office_id]').val(office_id);

 $('.card-office').removeClass('selected');
 $(`.card-office[data-office=${office_id}]`).addClass('selected');

 

 exports.ajaxOffice(office_id);
})




/*=====  End of OFFICE ONCHANGE  ======*/




/*============================================
=            SPECIALITI oonchange            =
============================================*/
$(document).on('click','.btn-selectSpeciality',(e)=>{


  if($('.load-my-specialities').length>0)
  {

   $('[name=cost]').val(e.target.dataset.cost);
   $('.btn.next').click();
   return;
 }


 let speciality_id =e.target.dataset.id
 let office_id =$('[name=office_id]').val();
 $('[name=speciality_id]').val(speciality_id);

 $(`.card-speciality`).removeClass('selected');

 $(`.card-speciality[data-speciality=${speciality_id}]`).addClass('selected');
 console.log(speciality_id);
 $.ajax({
  method:'get',
  url:`${_API}/specialities/${speciality_id}/${office_id}/doctors`,
  success:function(data){

    data= JSON.parse(data)

    $('.btn.next').click();
    data.forEach((e)=>{

      let text  ='';
      let i=0;
      for(i;i<Math.ceil(e.stars);i++){

        text+='<i class="fas fa-star"></i>'
      }

      for(i;i<5;i++){

        text+='<i class="fal fa-star"></i>'
      }


      $('#doctors').append(`
        <div class="col-md-4">
        <div class="card card-profile  card-doctor" data-doctor="${e.id}">

        <div class="card-header card-header-image">
        <img style="max-width: 100%;" class="img img-fluid" src="${e.Profileimg}">

        </div>
        <div class="card-body ">
        <h2 class="card-category mt-4 text-gray"><i class="fal fa-file-certificate"></i>
        ${e.price}</h2>
        <h4 class="card-title"> ${e.name}</h4>
        <p class="card-description">
        <div class="stars">
        ${

         text

       }
       </div>
       <div>
       ${e.stars}
       </div>


       </p>
       <button type="button" data-id="${e.id}" data-cost="${e.price}" class="btn btn-info btn-round btn-selectDoctor">seleccionar</a>
       </div>
       </div>
       </div> 

       `)


    })

   },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
})

})



$(document).on('click','.btn-selectDoctor',(e)=>{

  let doctor_id = e.target.dataset.id;

  $('[name=doctor_id]').val(doctor_id);

  let cost = e.target.dataset.cost;

  $('[name=cost]').val(cost);

  $(`.card-doctor`).removeClass('selected');

  $(`.card-doctor[data-doctor=${doctor_id}]`).addClass('selected');
  $('.btn.next').click();
})

/*=====  End of SPECIALITI oonchange  ======*/



/*=================================
=            GET DIAYS            =
============================================*/
$('[name=date]').on('change',()=>{
 let doctor_id =$('[name=doctor_id]').val();
 let fecha =$('[name=date]').val();


 exports.obtenerHoras(fecha,doctor_id);



})



/*=====  End of GET DIAYS  ======*/







$(document).ready(()=>{

      //vars


      //start

      prev.hide();
      showStep();


      //load steps

      let tramo = 100 / (nPasos-1);

      for(let i=0;i<nPasos-1;i++){

        $('.paso-head .content .fondo').append(`<div class="tag" style="left:${tramo*i + tramo/2}% ">
         <div class="circulo" data-id="${i+1}"  >
         <i class=" fas fa-d">${i+1}</i>
         </div>
         <div class="titulo">
         <span>${ $('.paso')[i].dataset.title }</span>
         </div>
         </div>`);

        $($('.paso ')[i]).prepend(`<h2>${$('.paso')[i].dataset.title}</h2>`)

      }

      $($('.paso ')[nPasos-1]).prepend(`<h2>${$('.paso')[nPasos-1].dataset.title}</h2>`)




      //load patients

      if($('.load-patients').length){


        $.ajax({
          method:'get',
          url: _API+'/patients',
          success:function(data){
            data = JSON.parse(data);

            data.forEach((e)=>{
              $('#patient_dni optgroup').append(`<option value="${e.id}">${e.name}</option>`)
            })

           },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
        })
        
      }

      if($('.load-my-specialities').length){


        $.ajax({
          method:'get',
          url: _API+'/doctors/'+$('.load-my-specialities').data('doctor')+'/specialities',
          success:function(data){


            exports.specialityCard(JSON.parse(data));

           },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
        })
        
      }

      if($('.load-specialities').length){

        exports.ajaxOffice($('[name=office_id]').val());
      }



      if($('.load-offices').length){


        $.ajax({
          method:'get',
          url: _API+'/offices',
          success:function(data){
            data = JSON.parse(data);

            data.forEach((e)=>{
              $('#offices ').append(`
                <div class="col-md-4">
                <div class="card card-rotate card-office" data-office="${e.id}">
                <div class="front front-background" style="background-image: url(${e.Profileimg})">
                <div class="card-body">
                <a href="#pablo">
                <h3 class="card-title">${e.name}</h3>
                </a>
                <p class="card-description">
                ${e.address}
                <br>
                </p>
                <div class="stats text-center">
                <a target="_blank" href="${e.mapa}" type="button" name="button" class="btn btn-danger btn-fill btn-round btn-rotate">
                <i class="fal fa-map-marker"></i> Ver mapa
                </a>

                <button data-id="${e.id}"  class="btn btn-primary btn-round btn-selectOffice" type="button">seleccionar</button>



                </div>
                </div>
                </div>

                </div>  </div>

                `)
            })

           },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
        })


        
      }


    })





  /*================================
  =            AUTONEXT            =
  ================================*/
  
  $('#patient_dni').on('change',()=>$('.btn.next').click());
  $('.datepicker').on('change',()=>$('.btn.next').click());
  $(document).on('change','.timepicker',()=>$('.btn.next').click());
  
  /*=====  End of AUTONEXT  ======*/
  



  /*=================================
  =            GET HOURs            =
  =================================*/

  exports.specialityCard = function(data){
   data.forEach((e)=>{

    $('#specialities').append(`<div class="col-6 col-md-4 col-xl-3">
      <div class="card card-pricing card-speciality" data-speciality="${e.id}">
      <div class="card-body ">
      <h6 class="card-category text-gray">

      <div class="icon icon-info">
      <i class="fal fa-file-certificate"></i>
      </div>
      <p class="card-description">
      <span class="text-uppercase text-primary">

      ${e.name}

      </span>
      <span class="d-block">${e.price ? e.price :''}</span>


      </p>
      <button type="button" data-id="${e.id}" data-cost="${e.cost? e.cost:''}" class="btn btn-info btn-round btn-selectSpeciality">seleccionar</a>
      </div>
      </div>



      </div>`)


  })
 }


  exports.obtenerHoras = function(fecha,doctor){




    if( fecha==undefined || doctor ==undefined  || fecha.length<1 || doctor.length<1 )
      return false;


    $('.groupTimepickerCita .bmd-label-floating').html('Hora');



    $.ajax({

      type:'POST',
      url:_API+'/appointment/gettime',
      data:
      {
        date: fecha,
        doctor:doctor,
        _token: $('.appointmentAjax input[name="_token"]').val()
      },

      success:function(data){
        __datos= JSON.parse(data);

        var cantidad =Object.keys(__datos).length
        if (document.getElementsByClassName('timepicker'))
        {

          horaMax=  __datos['outTime'][0]+__datos['outTime'][1];  
          minutoMax ="00";

          if (__datos['outTime'][3]=='0')
          {
            minutoMax='30';

            horaMax = horaMax-1;
          }


          horaMin =__datos['inTime'][0]+__datos['inTime'][1];
          minutoMin=__datos['inTime'][3]+__datos['inTime'][4]; 





          $('.groupTimepickerCita').html('<label class="bmd-label-floating">Hora</label><input class="form-control timepicker timepickerCita" name="time" type="time" value=""  id="select-time">');




          $('.timepickerCita').pickatime({
            min: [horaMin,minutoMin],
            max:[horaMax,minutoMax],
            clear: 'Quitar Hora',
            interval: 30,
            format: 'H:i',
            onClose: function() {
              $('.groupTimepickerCita .bmd-label-floating').html('');
            },})


          for(t=0;t<__datos['hours'].length;t++)
          {
            $('[aria-label="'+ __datos['hours'][t] +'"]').remove();
          }


        }


       },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }


    })
  }

  exports.ajaxOffice= function(office_id){

    $.ajax({
      method:'get',
      url:_API+'/offices/'+office_id+'/specialities',
      success:function(data){

        if($('.load-offices').length)
          $('.btn.next').click();

        exports.specialityCard(data);



      },
      error:function(){
        alert('hubo un error al descargar la informacion porfavor recargue la pagina');
      }
    })
  }

/*=====  End of GET HOURs  ======*/




}

