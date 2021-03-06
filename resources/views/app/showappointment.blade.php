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

                     
                        <form method="POST" action="{{ asset('/appointment/edit'.'/'.$appointment['id']) }}" aria-label="">
                            @csrf

                    
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="text-input" class=" form-control-label">patient national Id </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="text-input" name="national_id" value="{{ $patient['national_id'] }}" placeholder="National Id" class="form-control" disabled>
                                        
                                        <input type="text" id="text-input" name="id" value="{{ $patient['id'] }}" hidden>

                                    </div>
                                </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Patient Name  </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="name" value="{{ $patient['name'] }}" placeholder="Name" class="form-control" disabled> 
                                    @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="email-input" class=" form-control-label"> Patient phone </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="email-input" name="phone"  value="{{ $patient['phone'] }}" placeholder="Enter phone" class="form-control" disabled>
                                        @if ($errors->has('phone'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>

                          

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="select" class=" form-control-label"> clinic</label>
                                </div>
                                <div class="col-12 col-md-9">
                  

                                    {{ Form::select('clinic_id', $clinics, $appointment['clinic_id'] , ['placeholder' => 'choose a clinic...','class'=>"form-control" ,'disabled'])}}
                                    @if ($errors->has('clinic_id'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('clinic_id') }}</strong>
                                            </span>
                                        @endif
                             </div>
                            </div>



                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label class=" form-control-label">Patient Status </label>
                                </div>

                                <div class="col col-md-9">
                                    <div class="form-check-inline form-check">
                                    @switch($appointment['status'])
                                            @case('confirmed')
                            
                                        <label for="inline-radio3" class="form-check-label ">
                                            <input type="radio" id="inline-radio3" name="status" value="confirmed" class="form-check-input" checked> confirmed
                                        </label>

                                        <label for="inline-radio4" class="form-check-label ">
                                            <input type="radio" id="inline-radio4" name="status" value="to_confirm" class="form-check-input"> to confirm
                                        </label>

                                        <label for="inline-radio6" class="form-check-label ">
                                            <input type="radio" id="inline-radio6" name="status" value="closed_patient_treated" class="form-check-input"> closed patient treated
                                        </label>

                                        <label for="inline-radio5" class="form-check-label ">
                                            <input type="radio" id="inline-radio5" name="status" value="closed_visit_skipped" class="form-check-input"> closed visit skipped
                                        </label>

                                        <label for="inline-radio7" class="form-check-label ">
                                            <input type="radio" id="inline-radio7" name="status" value="canceled" class="form-check-input"> canceled
                                        </label>

                                                @break

                                    @case('to_confirm')
                                               
                                       <label for="inline-radio3" class="form-check-label ">
                                            <input type="radio" id="inline-radio3" name="status" value="confirmed" class="form-check-input" > confirmed
                                        </label>

                                        <label for="inline-radio4" class="form-check-label ">
                                            <input type="radio" id="inline-radio4" name="status" value="to_confirm" class="form-check-input" checked> to confirm
                                        </label>

                                        <label for="inline-radio6" class="form-check-label ">
                                            <input type="radio" id="inline-radio6" name="status" value="closed_patient_treated" class="form-check-input"> closed patient treated
                                        </label>

                                        <label for="inline-radio5" class="form-check-label ">
                                            <input type="radio" id="inline-radio5" name="status" value="closed_visit_skipped" class="form-check-input"> closed visit skipped
                                        </label>

                                        <label for="inline-radio7" class="form-check-label ">
                                            <input type="radio" id="inline-radio7" name="status" value="canceled" class="form-check-input"> canceled
                                        </label>

                                    @break

                                        @case('closed_patient_treated')
                                               
                                               <label for="inline-radio3" class="form-check-label ">
                                                    <input type="radio" id="inline-radio3" name="status" value="confirmed" class="form-check-input" > confirmed
                                                </label>
        
                                                <label for="inline-radio4" class="form-check-label ">
                                                    <input type="radio" id="inline-radio4" name="status" value="to_confirm" class="form-check-input" > to confirm
                                                </label>
        
                                                <label for="inline-radio6" class="form-check-label ">
                                                    <input type="radio" id="inline-radio6" name="status" value="closed_patient_treated" class="form-check-input" checked> closed patient treated
                                                </label>
        
                                                <label for="inline-radio5" class="form-check-label ">
                                                    <input type="radio" id="inline-radio5" name="status" value="closed_visit_skipped" class="form-check-input"> closed visit skipped
                                                </label>
        
                                                <label for="inline-radio7" class="form-check-label ">
                                                    <input type="radio" id="inline-radio7" name="status" value="canceled" class="form-check-input"> canceled
                                                </label>
        
                                        @break
                                            

                                        @case('closed_visit_skipped')
                                               
                                               <label for="inline-radio3" class="form-check-label ">
                                                    <input type="radio" id="inline-radio3" name="status" value="confirmed" class="form-check-input" > confirmed
                                                </label>
        
                                                <label for="inline-radio4" class="form-check-label ">
                                                    <input type="radio" id="inline-radio4" name="status" value="to_confirm" class="form-check-input" > to confirm
                                                </label>
        
                                                <label for="inline-radio6" class="form-check-label ">
                                                    <input type="radio" id="inline-radio6" name="status" value="closed_patient_treated" class="form-check-input" > closed patient treated
                                                </label>
        
                                                <label for="inline-radio5" class="form-check-label ">
                                                    <input type="radio" id="inline-radio5" name="status" value="closed_visit_skipped" class="form-check-input" checked> closed visit skipped
                                                </label>
        
                                                <label for="inline-radio7" class="form-check-label ">
                                                    <input type="radio" id="inline-radio7" name="status" value="canceled" class="form-check-input"> canceled
                                                </label>
        
                                        @break

                                        @case('canceled')
                                               
                                               <label for="inline-radio3" class="form-check-label ">
                                                    <input type="radio" id="inline-radio3" name="status" value="confirmed" class="form-check-input" > confirmed
                                                </label>
        
                                                <label for="inline-radio4" class="form-check-label ">
                                                    <input type="radio" id="inline-radio4" name="status" value="to_confirm" class="form-check-input" > to confirm
                                                </label>
        
                                                <label for="inline-radio6" class="form-check-label ">
                                                    <input type="radio" id="inline-radio6" name="status" value="closed_patient_treated" class="form-check-input" > closed patient treated
                                                </label>
        
                                                <label for="inline-radio5" class="form-check-label ">
                                                    <input type="radio" id="inline-radio5" name="status" value="closed_visit_skipped" class="form-check-input" > closed visit skipped
                                                </label>
        
                                                <label for="inline-radio7" class="form-check-label ">
                                                    <input type="radio" id="inline-radio7" name="status" value="canceled" class="form-check-input" checked> canceled
                                                </label>
        
                                        @break
                                        @endswitch
                                        
                                       
                                    </div>
                                    @if ($errors->has('status'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('status') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="-input" class=" form-control-label"> Appointments  date </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="date" id="-input" name="date" value="{{$appointment['date']}}" placeholder="Enter Date" class="form-control" disabled>
                                    <small class="help-block form-text">Please enter Appointments date</small>
                                    @if ($errors->has('date'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="d-input" class=" form-control-label"> Appointments  start at </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="time" id="d-input" name="start" value="{{$appointment['start'] }}" placeholder="Enter Appointments start at" class="form-control" disabled>
                                    <small class="help-block form-text">Please enter Appointments start</small>
                                    @if ($errors->has('start'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('start') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label"> Appointments  end at </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="time" id="email-input" name="end" value="{{ $appointment['end'] }}" placeholder="Enter Appointments end at" class="form-control" disabled>
                                    <small class="help-block form-text">Please enter Appointments end</small>
                                        @if ($errors->has('end'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('end') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="email-input" class=" form-control-label">cost </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="number" id="email-input" name="cost" value="{{ $appointment['cost']}}" placeholder="Enter Appointments cost " class="form-control" disabled>
                                    <small class="help-block form-text">Please enter Appointments cost</small>
                                    @if ($errors->has('cost'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('cost') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>


                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Clerk comment</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="comment" id="textarea-input" rows="9" placeholder="Content..." class="form-control" disabled>{{ $appointment['clerk_comment'] }}</textarea>
                                        @if ($errors->has('comment'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('comment') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>

                            <div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="textarea-input" class=" form-control-label">Doctor comment</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <textarea name="doctor_comment"  id="textarea-input" rows="9" placeholder="Content..." class="form-control">{{$appointment['doctor_comment']}}</textarea>
                                        @if ($errors->has('doctor_comment'))
                                            <span class="invalid-feedback" style="display:block" role="alert">
                                            <strong>{{ $errors->first('doctor_comment') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm">
                                    <i class="fa fa-dot-circle-o"></i> save
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
