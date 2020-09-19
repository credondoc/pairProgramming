@extends('default')

@section('content')
    @if (session('status'))
        <div class="alert alert-{{ session('status.status') }}">
            {{ session('status.message') }}
        </div>
    @endif
    <div class="row justify-content-md-center">
        <div class="col col-md-10">
            <div class="card">
                <div class="card-header">
                    <h1>
                        Crear concierto
                    </h1>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('concierto.create') }}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre del concierto</label>
                            <input @if (session('status')) value="{{ session('status.name') }}" @endif type="text" name="name" id="name" required class="form-control" placeholder="Nombre del concierto">
                        </div>

                        <div class="form-group">
                            <label for="date">Fecha del concierto</label>
                            <input @if (session('status')) value="{{ session('status.date') }}" @endif class="form-control" type="datetime-local" required name="date" id="date" placeholder="Lugar del concierto">
                        </div>

                        <div class="form-grooup">
                            <label for="place">Lugar del concierto</label>
                            <select class="form-control" name="place" required id="place">
                                @foreach($recintos as $recinto)
                                    <option value="{{ $recinto->id }}">{{ $recinto->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-grooup">
                            <label for="groups">Grupos del concierto</label>
                            <select class="form-control" name="groups[]" id="groups" required multiple="multiple">
                                @foreach($grupos as $grupo)
                                    <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-grooup">
                            <label for="spectators">Espectadores del concierto</label>
                            <input @if (session('status')) value="{{ session('status.spectators') }}" @else value="0" @endif class="form-control" type="number" min="0" required name="spectators" id="spectators" placeholder="Espectadores del concierto">
                        </div>

                        <div class="form-grooup">
                            <label for="sponsor">Promotor del concierto</label>
                            <select class="form-control" name="sponsor" id="sponsor"required >
                                @foreach($promotores as $promotor)
                                    <option value="{{ $promotor->id }}">{{ $promotor->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-grooup">
                            <label for="advertising">Medios de comunicacion del concierto</label>
                            <select class="form-control" name="advertising[]" id="advertising" multiple="multiple"required >
                                @foreach($medios as $medio)
                                    <option value="{{ $medio->id }}">{{ $medio->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-grooup mt-3">
                            <button type="submit" class="btn btn-success">Crear</button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
