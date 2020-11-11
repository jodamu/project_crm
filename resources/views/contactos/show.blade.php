@extends('adminlte::layouts.app')

@section('htmlheader_title','Contacto: '.$contacto->nombres)  {{-- titulo pestaña  pagina --}}

@section('contentheader_title','Contacto: '.$contacto->nombres )  {{-- nombre pagina --}}


@section('breadcrumb')
<li class=""><a href="{{ url('/contacto') }}">Contactos</a></li>
<li class="active">{{ $contacto->nombres }}</li>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              {{-- <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="../../dist/img/user4-128x128.jpg"
                     alt="User profile picture">
              </div> --}}

              <h3 class="profile-username text-center">{{ $contacto->nombres }} {{ $contacto->apellidos }}</h3>

              <p class="text-muted text-center">{{ $contacto->cargo->name }}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email: </b> <a class="float-right">{{ $contacto->email }}</a>
                </li>
                <li class="list-group-item">
                  <b>Telefono: </b> <a class="float-right">{{ $contacto->telefono }}</a>
                </li>
                <li class="list-group-item">
                  <b>Empresa: </b> <a class="float-right">{{ $contacto->empresa }}</a>
                </li>
                <li class="list-group-item">
                  <b>Sector: </b> <a class="float-right">{{ $contacto->sector->name }}</a>
                </li>
              </ul>

              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Acerca de {{ $contacto->nombres }} {{ $contacto->apellidos }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
             {{--  <strong><i class="fas fa-book mr-1"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p> --}}

              <hr>

              <strong><i class="fas fa-map-marker-alt mr-1"></i> Ubicación</strong>

              <p class="text-muted">{{ $contacto->ciudad->name }} ( {{ $contacto->ciudad->estado->name }} ) , {{ $contacto->ciudad->estado->pais->name }}</p>

              <hr>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Estado Civil: </b> <a class="float-right">{{ $contacto->estado_civil->name }}</a>
                </li>
                <li class="list-group-item">
                  <b>Cumpleaños: </b> <a class="float-right">{{ $contacto->fechanacimiento }} </a>
                </li>
              </ul>
              <strong><i class="fas fa-pencil-alt mr-1"></i> </strong>
              
              

              <hr>

              
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
               
                <div class="tab-pane active" id="timeline">
                  <!-- The timeline -->
                  <div class="timeline timeline-inverse">
                    <!-- timeline time label -->
                    <div class="time-label">
                      <span class="bg-danger">
                        10 Feb. 2014
                      </span>
                    </div>
                    <!-- /.timeline-label -->
                    
                    <!-- timeline item -->
                    <div>
                      <i class="fa fa-user bg-info"></i>
                      <div class="timeline-item">
                        <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>
                        <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                        </h3>
                      </div>
                    </div>
                    <!-- END timeline item -->


                  
                
                    <div>
                    <i class="fas fa-clock bg-gray"></i>
                    </div>
                </div>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="settings">
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-10">
                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <div class="checkbox">
                          <label>
                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                          </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="offset-sm-2 col-sm-10">
                        <button type="submit" class="btn btn-danger">Submit</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div><!-- /.card-body -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>


@endsection