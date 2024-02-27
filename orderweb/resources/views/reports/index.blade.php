@extends('templates.base')
@section('title', ' Reportes')
@section('header', 'Reportes')
@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte general técnicos 
                    </h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.technicians') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de usuarios 
                    </h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.users') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de actividades por técnico 
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.activities_technician') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="technician_id">Técnico</label>
                            </div>
                            <div class="col-lg-5">
                                <select name="technician_id" id="technician_id" class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician['document'] }}">
                                            {{ $technician['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-success btn-block col-lg-3 mb-4">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        Reporte de órdenes
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.orders') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="initial_date">Fecha inicial</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="initial_date" id="initial_date" class="form-control">
                            </div>
                            <div class="col-lg-2">
                                <label for="final_date">Fecha final</label>
                            </div>
                            <div class="col-lg-2">
                                <input type="date" name="final_date" id="final_date" class="form-control">
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-dark btn-block col-lg-3 mb4">
                                    <li class="fa-solid fa-file-pdf"></li>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection