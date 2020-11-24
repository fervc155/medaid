@extends('layouts.web')

@section('content')


<div class="container my-3">
  <div class="row">
    <div class="col">
      <h1>MedAid - Sistema medico para citas online</h1>


      <h3>Objetivo General</h3>
      
      <p>Facilitar la gestión de citas médicas y pagos en línea para pacientes, médicos y
oficinistas en consultorios. El sistema también facilitará la comunicación entre el
personal del hospital (es decir, médicos, oficinistas y administradores), además de
proveer un chatbot para simplificar la asistencia de pacientes.</p>

<h3>Antecedentes</h3>
<p>Un gran problema en varios consultorios médicos hoy en día, es el hecho que los
pacientes tienen que esperar una gran cantidad de tiempo para poder recibir el
servicio que desean. Esto se vuelve más complicado cuando tomamos en cuenta que
muchos consultorios y hospitales utilizan sistemas de gestión muy anticuados;
algunos llegando a tal punto que no utilizan ningún sistema digital.
Además de esto, vivimos en una era digital y muchos consultorios aún sólo aceptan
pagos en físico, lo cual puede ser más complicado, especialmente en estos tiempos de
pandemia, donde se debe evitar el contacto físico lo más posible, intentando
implementar pagos en línea en la mayoría de los sistemas que utilizamos.

Existen alternativas en el mercado, pero todas involucran pagos mensuales de
cantidades muy elevadas por médico, lo cual es una gran desventaja para personas de
bajos recursos. Hoy en día no existe ningún sistema que permita a pacientes
encontrar médicos y/o consultorios para tomar citas médicas dentro del mismo
sistema enfocado a su clínica, teniendo que pagar únicamente por la cita y no por
algún otro servicio. Hay otras alternativas de bajo costo como Bookly, LatePoint, pero
éstas se enfocan a citas en general, y no a citas médicas.
Hay otras aplicaciones que se asemejan al objetivo que queremos alcanzar (como
Docplanner o Zocdoc), pero ninguna de éstas está disponible en México.
El mercado necesita una opción no sólo de bajo costo, sino que también se enfoque a
mejorar los procesos dentro de una línea de consultorios médico, y a facilitarle la vida
tanto a los médicos (para atender sus citas) como a los pacientes</p>
<h3>Justificacion</h3>
<p>Como mencionamos en el punto anterior, todas las opciones en el mercado
involucran mensualidades considerablemente altas que muchas personas no pueden
pagar. Esto no significa que nuestro sistema vaya a ser gratuito, pero los pagos
involucrarán únicamente a las citas, y no a algún tipo de suscripción. Consideramos
que esto es importante para los servicios médicos, puesto que la salud debe ser
accesible para personas de toda clase social.
Además de esto, los sistemas existentes suelen enfocarse mayormente ya sea sólo en
pacientes, sólo en médicos, o muy rara vez en ambos. Nuestro sistema se enfoca en
tres entidades distintas: médicos, pacientes y el personal administrativo de las
clínicas. Además, debido a que se involucran consultorios, el paciente puede elegir
médicos en base al consultorio en el que confíe más, en vez de ver una lista de
nombres de médicos desconocidos, como hacen otras aplicaciones.
Asimismo, una ventaja que tenemos sobre otras aplicaciones en el mercado es el
hecho de ofrecer la posibilidad de que el personal de una clínica se comunique entre
sí, puesto que esto quita la necesidad de estar utilizando un servicio de correos
electrónicos de algún tercero.</p>
<h3>Impacto Social</h3>
<p>Este proyecto hará que los administradores de hospital y/o consultorios tengan más
facilidad para gestionar consultas y personal, además de permitir que los médicos
puedan administrar las citas con sus pacientes y poder realizar un seguimiento de su
tratamiento; y que los pacientes puedan obtener recordatorios de sus citas, sus
recetas, y cualquier otra información que se considere relevante. El hecho de que esté

construido en Laravel (PHP) hace que el mantenimiento y gastos del software en
eventos futuros sea relativamente barato, debido a que los servidores PHP son muy
baratos a comparación de un VPS común.
Además, esto le brindará a los usuarios un catálogo de clínicas y médicos fácil de
acceder sin costo, teniendo que pagar únicamente cuando toman cita con algún
médico. Consideramos que la agilización de procesos en sistemas de salud y la mejora
de accesibilidad para pacientes mejorará mucho el sector salud, específicamente para
países en desarrollo, de los cuales muchos aún no cuentan con sistemas avanzados de
gestión para este sector.</p>  
    </div>
  </div>
</div>



<!-- Footer -->



@endsection