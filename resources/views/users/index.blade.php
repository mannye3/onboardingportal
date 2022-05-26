@extends('layouts.master')
@section('title') @lang('Users') @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')  @endslot
        @slot('title') Users @endslot
    @endcomponent
    <link href="{{ URL::asset('assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    
        <!-- Responsive datatable examples -->
        <link href="{{ URL::asset('assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center flex-wrap gap-2">
                        <div class="flex-grow-1">
                            <button class="btn btn-info add-btn" data-bs-toggle="modal"
                                data-bs-target="#showModal"><i
                                    class="ri-add-fill me-1 align-bottom"></i> Add</button>
                                    @if (\Session::has('success'))
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" permission="alert">
            <strong> {{ \Session::get('success') }} </strong> </b> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif

                     @if (count($errors) > 0)
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" permission="alert">
                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-9">
            <div class="card" id="contactList">
                <div class="card-header">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="search-box">
                                <input type="text" class="form-control search"
                                    placeholder="Search for contact...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-card mb-3">
                            <table class="table align-middle table-nowrap mb-0" id="customerTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>#</th>
                                        
                                        <th class="sort" data-sort="name" scope="col">Name</th>
                                        <th class="sort" data-sort="company_name" scope="col">Email
                                        </th>
                                        <th class="sort" data-sort="email_id" scope="col">Role</th>
                                        <th class="sort" data-sort="phone" scope="col">Department</th>
                                       
                                        <th class="sort" data-sort="date" scope="col">Created At
                                        </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="list form-check-all">
                                @foreach ($data as $key => $user)
                                    <tr>
                                        
                                       <td>{{ $loop->iteration }}</td>
                                        <td class="name">{{$user->name}}</td>
                                        <td class="company_name">{{$user->email}}</td>
                                        <td class="company_name">
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $val)
                                        <span class="badge bg-success">{{ $val }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                        <td class="phone">IT</td>
                                       
                                        <td class="date">{{$user->created_at}}</td>
                                        <td>
                                            <ul class="list-inline hstack gap-2 mb-0">
                                            @can('user-edit')
                                                <li class="list-inline-item edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="View">
                                                    <a href="{{ route('editUser',$user->id) }}"
                                                        class="text-muted d-inline-block">
                                                        <i class="ri-zoom-in-line fs-16"></i>
                                                    </a>
                                                </li>
                                                @endcan

                                                @can('user-delete')
                                                <li class="list-inline-item edit"
                                                    data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                    data-bs-placement="top" title="Delete">
                                                    <a data-bs-toggle="modal"
                                                        data-bs-target="#deleteuser-{{$user->id}}"
                                                        class="text-muted d-inline-block">
                                                        <i class="las la-trash fs-16"></i>
                                                    </a>
                                                </li>
                                                @endcan
                                                
                                            </ul>
                                        </td> 
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                            <div class="noresult" style="display: none">
                                <div class="text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                                        trigger="loop" colors="primary:#121331,secondary:#08a88a"
                                        style="width:75px;height:75px">
                                    </lord-icon>
                                    <h5 class="mt-2">Sorry! No Result Found</h5>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <div class="pagination-wrap hstack gap-2">
                                <a class="page-item pagination-prev disabled" href="#">
                                    Previous
                                </a>
                                <ul class="pagination listjs-pagination mb-0"></ul>
                                <a class="page-item pagination-next" href="#">
                                    Next
                                </a>
                            </div>
                        </div>
                    </div>




                    <div class="row">
                           
                        </div> <!-- end row -->


                    <!-- ADD USER MODAL -->
                    <div class="modal fade" id="showModal" tabindex="-1"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content border-0">
                                <div class="modal-header bg-soft-info p-3">
                                    <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close" id="close-modal"></button>
                                </div>
                                {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
                                    <div class="modal-body">
                                        <input type="hidden" id="id-field" />
                                        <div class="row g-3">
                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="name-field"
                                                        class="form-label">Name</label>
                                                    <input type="text" name="name" id="customername-field"
                                                        class="form-control" placeholder="Enter name"
                                                        required />
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12">
                                                <div>
                                                    <label for="company_name-field"
                                                        class="form-label">Department</label>
                                                    <input type="text" name="department"  id="company_name-field"
                                                        class="form-control"
                                                        placeholder="Enter company name"  />
                                                </div>
                                            </div> --}}
                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="email_id-field" class="form-label">Email
                                                        Address</label>
                                                    <input type="text" name="email" id="email_id-field"
                                                        class="form-control" placeholder="Enter email"
                                                        required />
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div>
                                                    <label for="email_id-field" class="form-label">Role
                                                        </label>
                                                        {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="phone-field"
                                                        class="form-label">Password</label>
                                                    <input type="password" name="password" id="phone-field"
                                                        class="form-control"
                                                        placeholder="Enter Password" required />
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="lead_score-field"
                                                        class="form-label">Confirm Password</label>
                                                    <input type="password" name="password_confirmation" id="lead_score-field"
                                                        class="form-control" placeholder="Enter Confirm Password"
                                                        required />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-success"
                                                id="add-btn">Add User</button>
                                          
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <!--end add modal-->

                  

                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
       
        <!--end col-->
    </div>

    <!-- Delete Modal -->

    <!-- Modal -->
    @foreach ($data as $key => $user)
    <div class="modal fade zoomIn" id="deleteuser-{{$user->id}}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you Sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this User ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>

                       
                            
                      
                        <form  method="POST" action="{{ route('deleteUser', $user->id)}}" >
                            @csrf
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('/assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/crm-contact.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    

    <script src="assets/libs/jquery/jquery.min.js"></script>
    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
       <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
       <!-- Buttons examples -->
       <script src="assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
       <script src="assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
       <script src="assets/libs/jszip/jszip.min.js"></script>
       <script src="assets/libs/pdfmake/build/pdfmake.min.js"></script>
       <script src="assets/libs/pdfmake/build/vfs_fonts.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
       <script src="assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
       <!-- Responsive examples -->
       <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
       <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

       <!-- Datatable init js -->
       <script src="assets/js/pages/datatables.init.js"></script> 

       <script src="assets/js/app.js"></script>
@endsection







































































































