@extends('layouts.app')

@section('content')
<!-- Masthead -->
    <header class="masthead text-white text-center" style=" background-image: url('{{asset('splash/img/hospital.gif')}}');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <h1 class="mb-5">Bienvenido a <i>La Salud es Primero</i>.</h1>
          </div>
        </div>
      </div>
    </header>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary"></i>
              </div>
              <h3>Moderno</h3>
              <p class="lead mb-0">Este hospital utiliza la mejor tecnología para garantizar tu satisfacción y comodidad.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary"></i>
              </div>
              <h3>Completo</h3>
              <p class="lead mb-0">En ningún lugar encontrarás un hospital con un servicio tan completo como el nuestro.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary"></i>
              </div>
              <h3>Excelente personal</h3>
              <p class="lead mb-0">Contamos con el mejor personal del Estado, dispuesto a servirte.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="footer bg-light">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="#">Acerca de</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Contacto</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Encuéntranos</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="#">Políticas de privacidad</a>
              </li>
            </ul>
            <p class="text-muted small mb-4 mb-lg-0">&copy; Universidad de Guadalajara.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fab fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a href="#">
                  <i class="fab fa-twitter-square fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-instagram fa-2x fa-fw"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
@endsection