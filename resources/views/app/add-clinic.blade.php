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

                        <form method="POST" action="{{ asset('/clinic/add') }}" aria-label="">
                            @csrf
                             
                             

                            <div class="row form-group">
                                
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">clinic Name  </label>
                                </div>
                              
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="name" value="{{ old('name') }}" placeholder="Name" class="form-control">
                                         @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                         @endif
                                </div>

                            </div>


                            <div class="row form-group">
                            
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label"> clinic phone </label>
                                    </div>
                            
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email-input" name="phone"  value="{{ old('phone') }}" placeholder="Enter phone" class="form-control">
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                            </div>

                    



                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> Create
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> cancel
                                </button>
                            </div>
                        </form>
                        

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
