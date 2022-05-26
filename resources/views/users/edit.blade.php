@extends('layouts.master')
@section('title') @lang('translation.settings') @endsection
@section('content')


<div class="row">
   
    <!--end col-->
    <div class="col-xxl-9">
        <div class="card mt-xxl-n5">
            <div class="card-header">
                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                            role="tab">
                            <i class="fas fa-home"></i>
                            Personal Details
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                            <i class="far fa-user"></i>
                            Change Password
                        </a>
                    </li>
                   
                </ul>
            </div>
            <div class="card-body p-4">
                <div class="tab-content">
                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                   
                    <form  method="POST" action="{{ route('updateUser', $user->id)}}" >
                        @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="firstnameInput" class="form-label">
                                            Name</label>
                                        <input type="text" name="name" class="form-control" id="firstnameInput"
                                           value="{{$user->name}}" value="Dave">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="lastnameInput" class="form-label">Email
                                            </label>
                                        <input type="text" name="email" type="email" class="form-control" id="lastnameInput"
                                          value="{{$user->email}}">
                                    </div>
                                </div>
                                <!--end col-->
                                {{-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="phonenumberInput" class="form-label">Phone
                                            Number</label>
                                        <input type="text" class="form-control"
                                            id="phonenumberInput"
                                            placeholder="Enter your phone number"
                                            value="+(1) 987 6543">
                                    </div>
                                </div> --}}
                                <!--end col-->
                                {{-- <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">
                                            Department
                                            </label>
                                        <input type="text" class="form-control" id="emailInput"
                                            placeholder="Enter your email"
                                            value="IT">
                                    </div>
                                </div> --}}


                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <label for="emailInput" class="form-label">
                                            Role
                                            </label>
                                            {!! Form::select('roles[]', $roles, $userRole, array('class' => 'form-control','multiple')) !!}
                                    </div>
                                </div>
                                <!--end col-->
                               
                              
                                
                             
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="hstack gap-2 justify-content-end">
                                       
                                        <button type="submit"
                                            class="btn btn-soft-success">Update User</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                    </form>
                    </div>
                    <!--end tab-pane-->
                    <div class="tab-pane" id="changePassword" role="tabpanel">
                        <form action="javascript:void(0);">
                            <div class="row g-2">
                              
                                <!--end col-->
                                
                                <!--end col-->
                               
                                <!--end col-->
                                
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success">Generarte and Change
                                            Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                       
                        
              
                       
                      
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/js/pages/profile-setting.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection
