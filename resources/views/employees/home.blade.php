@extends('layouts.app')

@section('title', 'Home')

@section('css')
<link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')

<div class="row" style="margin-top: 80px;">
    <div class="col-md-12 text-center">
        @include('layouts.message')
    </div>
</div>

<div class="container internia">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <a class="navbar-brand bootstrap-img" href="#">
                            <img src="{{ asset('images/employees.png') }}" width="120" alt="" loading="lazy">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse nav-frame" id="navbarToggleExternalContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item"><a class="nav-link" href = "" >Calendar</a></li>
                                <li class="nav-item"><a class="nav-link" href = "" >Statistics</a></li>
                                <li class="nav-item"><a class="nav-link active link-active" href = "{{ route('employee.home') }}" >Employees</a></li>
                                <li class="nav-item"><a class="nav-link" href = "" >Client</a></li>
                                <li class="nav-item"><a class="nav-link" href = "" >Equipment</a></li>
                            </ul>
                            <div class="form-inline my-2 my-lg-0 font_icons">
                              <i class="fa fa-bell fa-2x" aria-hidden="true"  ></i>
                              <i class="fa fa-envelope fa-2x" aria-hidden="true"  ></i>
                              <a href="#">
                                  <img src="{{ asset('images/avatar.png') }}" alt="Avatar" class="avatar">
                              </a>
                            </div>
                        </div>
                    </nav>
                </div>

                @include('employees.card-body')

            </div>
        </div>
    </div>
</div>


@include('employees.add')

@include('employees.edit')

@include('employees.delete')

@include('employees.footer')


@endsection


@section('script')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>


<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js" defer></script>


@include('layouts.script')

@include('layouts.table-script')

@endsection

