@extends('layouts.app')

@section('content')
    <div class="page-container">
        <!-- HEADER DESKTOP-->
       
        <!-- HEADER DESKTOP-->

        <!-- MAIN CONTENT-->
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">

                    <div class="row card card-body card-block">
                         @if (Session::has('message'))
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="alert alert-success alert-dismissible">
                                    {{ Session::get('message')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                            </div>
                        </div>
                        @endif

                            <form method="POST" action="{{ asset('/appointment/search') }}" aria-label="">
                              @csrf

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="-input" class=" form-control-label"> from </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="-input" name="from" value="{{ old('from') }}" placeholder="Enter Date" class="form-control">
                                    @if ($errors->has('from'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('from') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="-input" class=" form-control-label">   To </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="-input" name="to" value="{{ old('to') }}" placeholder="Enter Date" class="form-control">
                                    @if ($errors->has('to'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('to') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                          

                                        
                               

                              <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"> clinic</label>
                                </div>
                                <div class="col-12 col-md-9">
                  

                                    {{ Form::select('clinic_id', $clinics, old('clinic_id'), ['placeholder' => 'choose a clinic...','class'=>"form-control" ])}}
                                    @if ($errors->has('clinic_id'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('clinic_id') }}</strong>
                                            </span>
                                        @endif
                             </div>
                            </div>

                             <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Search
                                </button>
                              
                            </div>
                            </form>

                    <div class="table-responsive m-b-40">
                                    <table class="table table-borderless table-data3">
                                        <thead>
                                            <tr>
                                                <th>patient name</th>
                                                <th>clinic name</th>
                                                <th>status</th>
                                                <th>date</th>
                                                <th>edit</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                         @foreach ($appointments as $appointment)
                                            <tr>
                                                <td>{{$appointment->patient->name}}</td>
                                                <td>{{$appointment->clinic->name}}</td>
                                                <td>{{$appointment->status}}</td>
                                                <td>{{$appointment->date}}</td>
                                                <td><a href="{{asset('/appointment/show'.'/'.$appointment->id)}}">edit </a></td>

                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>   
                   </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MAIN CONTENT-->
        <!-- END PAGE CONTAINER-->
    </div>

@endsection
