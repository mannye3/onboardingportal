@extends('layouts.master')
@section('title') @lang('Roles') @endsection
@section('content')
    @component('components.breadcrumb')
        @slot('li_1')  @endslot
        @slot('title') Roles @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Manage Roles</h4>
               
                </div><!-- end card header -->
                

                <div class="container">
    <div class="justify-content-center">
        
        <div class="card">
            <div class="card-header">
                    @if (\Session::has('success'))
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" role="alert">
            <strong> {{ \Session::get('success') }} </strong> </b> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif

        @if (count($errors) > 0)
                        <div><div class="alert alert-primary alert-dismissible shadow fade show" role="alert">
                        <strong>Opps!</strong> Something went wrong, please check below errors.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div></div>
        @endif


                @can('role-create')
                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal"
                                                        data-bs-target="#addRole"><i
                                            class="ri-add-line align-bottom me-1"></i> Add</button>
                @endcan
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $key => $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>
                                    <a class="btn btn-success" data-bs-toggle="modal"
                                        data-bs-target="#showRole-{{$role->id}}">Show</a>
                                    @can('role-edit')
                                        <a class="btn btn-primary"  data-bs-toggle="modal"
                                        data-bs-target="#editRole-{{$role->id}}">Edit</a>
                                    @endcan
                                    @can('role-delete')
                                    <button class="btn btn-danger remove-item-btn"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteRole-{{$role->id}}">Delete</button>
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
               
            </div>
         
        </div>
    </div>
</div>

            
            </div>
            <!-- end col -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    
   <!-- CREATE MODAL -->
   @foreach ($data as $key => $role)
    <div class="modal fade" id="addRole" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form  method="POST" action="{{ route('roleStore')}}" >
                    @csrf


             
                    <div class="modal-body">

                       

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Role Name</label>
                            <input type="text" name="name" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Permission:</label>
                            <br/>
                            @foreach($permission as $value)
                                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                        {{ $value->name }}</label>
                                    <br/>
                                    @endforeach
                        </div>


                        
                     
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           
                            <button type="submit" class="btn btn-success" id="edit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach



     <!-- Edit MODAL -->
   @foreach ($data as $key => $role)
    <div class="modal fade" id="editRole-{{ $role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
            
                <form  method="POST" action="{{ route('roleUpdate', $role->id)}}" >
                    @csrf
                <div class="modal-body">

                      

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Role Name</label>
                            <input type="text" name="name" value="{{$role->name}}" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Permission:</label>
                            <br/>
                            <?php
                                                         $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                                                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                                        ->all();
                                                        ?>


                                                    @foreach($permission as $value)
                                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                    {{ $value->name }}</label>
                                                <br/>
                                                @endforeach
                        </div>


                        
                     
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           
                            <button type="submit" class="btn btn-success" id="edit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach




     <!-- Edit MODAL -->
   @foreach ($data as $key => $role)
    <div class="modal fade" id="showRole-{{ $role->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-modal"></button>
                </div>
                <form  method="POST" action="{{ route('roleUpdate', $role->id)}}" >
                    @csrf
                    <div class="modal-body">

                       

                        <div class="mb-3">
                            <label for="customername-field" class="form-label">Role Name</label>
                            <input type="text" readonly name="name" value="{{$role->name}}" id="customername-field" class="form-control" placeholder="Enter Name"
                                required />
                        </div>

                        <div class="mb-3">
                            <label for="email-field" class="form-label">Permission:</label>
                            <br/>
                            <?php
                                        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                                       ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                       ->all();
                                       ?>




                                   @foreach($permission as $value)
                                   <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('disabled')) }}
                                   {{ $value->name }}</label>
                               <br/>
                               @endforeach
                        </div>


                        
                     
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                           
                            <button type="submit" class="btn btn-success" id="edit-btn">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach



    <!-- Delete Modal -->

    <!-- Modal -->
    @foreach ($data as $key => $role)
    <div class="modal fade zoomIn" id="deleteRole-{{$role->id}}" tabindex="-1" aria-hidden="true">
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
                            <p class="text-muted mx-4 mb-0">Are you Sure You want to Delete this Role ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <form  method="POST" action="{{ route('deleteRole', $role->id)}}" >
                            @csrf
                        <button type="submit" class="btn w-sm btn-danger " id="delete-record">Yes, Delete It!</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!--end modal -->
@endsection
@section('script')
    <script src="{{ URL::asset('assets/libs/prismjs/prismjs.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.js/list.js.min.js') }}"></script>
    <script src="{{ URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js') }}"></script>

    <!-- listjs init -->
    <script src="{{ URL::asset('assets/js/pages/listjs.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection












































