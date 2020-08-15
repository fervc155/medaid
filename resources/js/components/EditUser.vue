<template>
    <div>
         <div class="form-group form-inline align-items-end align-items-end">
            <div class="icon-form">
              <i class="fal fa-at"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating"> Email</label>
              <input id="email" type="email" class="form-control $errors->has('email') ? ' is-invalid' : '' " name="email" :value="mail" required autofocus>


            </div> 
          </div>
          <div class="form-group form-inline align-items-end align-items-end">
            <div class="icon-form">
              <i class="fal fa-lock"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating"> Password</label>
              <input id="password" type="password" class="form-control $errors->has('password') ? ' is-invalid' : '' " name="password" value="" required autofocus>


            </div> 
          </div>
          <div class="form-group form-inline align-items-end align-items-end">
            <div class="icon-form">
              <i class="fal fa-lock"></i>
            </div>
            <div class="form-group">
              <label class="bmd-label-floating"> Nuevo Password</label>
              <input id="newpassword" type="password" class="form-control $errors->has('newpassword') ? ' is-invalid' : '' " name="newpassword" value="" required autofocus>


            </div> 
          </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        props: ['mail']
    }
</script>
