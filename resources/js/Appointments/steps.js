if($('.paso').length>0){

  /*=============================
  =            STEPS            =
  =============================*/
  
  
  

  
  const nPasos = $('.paso').length
  let counter=0;

  let  next = $('.btn.next');
  let prev = $('.btn.prev');


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
    if(counter==nPasos-1){
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
    if(counter==0){
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

}