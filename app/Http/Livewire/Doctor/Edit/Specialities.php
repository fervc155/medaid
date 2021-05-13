<?php

namespace App\Http\Livewire\Doctor\Edit;

use App\Doctor;
use App\Doctor_speciality;
use App\Speciality;
use Livewire\Component;

class Specialities extends Component
{
  public $doctor;
  public $doctor_specialities=[];
  public $specialities;
 

  public $selected_speciality;
  public $cost;

  protected $listeners = ['render','update'];


  protected function init(){
    $this->doctor = Doctor::find($this->doctor->id);
     $this->cost=0;
    $this->specialities = Speciality::all();
    $this->doctor_specialities= $this->doctor->doctor_speciality;
    $this->render();
  }
    public function mount(Doctor $doctor){
      $this->doctor=$doctor;
     
      $this->init();
    }


    public function render()
    {
        return view('livewire.doctor.edit.specialities');
    }


    public function new_speciality(){

      if(!$this->doctor->hasSpeciality($this->selected_speciality)){
          $relation = new Doctor_speciality;

          $relation->doctor_id = $this->doctor->id;
          $relation->speciality_id = $this->selected_speciality;
          $relation->cost = $this->cost;
          $relation->save();
          $this->isSuccess('Especialidad agregada correctamente');




      }else{

        $this->isError('Ya existe esta especialidad');

      }

      $this->init();


    }


    public function update($data){

      $relation = Doctor_speciality::find($data[0]);
      $relation->cost =$data[1];
      $relation->save();
      $this->isSuccess('Actualizado correctamente');
      $this->init();

    }

    protected function isSuccess($message){
      $this->emit('success',$message);
    }

   protected function isError($message){
      $this->emit('error',$message);
    }

    public function eliminar($id){

      $relation = Doctor_speciality::find($id);
      $relation->delete();
      $this->isSuccess('Especialidad eliminada correctamente');

    }
}
