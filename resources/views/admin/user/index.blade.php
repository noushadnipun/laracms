@extends('admin.layouts.master')
@section('site-title')
User
@endsection

@section('page-content')
    @include('admin.layouts.message')

    <div class="row">
        <div class="col-md-4">
            <form action="{{ (!empty($editUser)) ? route('admin_user_update') : route('admin_user_store') }}" method="POST">
                @csrf
                @if(!empty($editUser))
                    <input type="hidden" name="id" value="{{$editUser->id}}">
                @endif
                <div class="card card-purple card-outline">
                    <div class="card-header {{ (!empty($editUser)) ? 'bg-purple text-white' : '' }}">
                        <h3 class="card-title">{{ (!empty($editUser)) ? 'Edit ' : 'Add' }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="Name">Name</label>
                            <input type="text" name="name" class="form-control" id="" placeholder="Enter Name" value="{{ (!empty($editUser)) ? $editUser->name : old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="email" class="form-control" id="" placeholder="Enter Email" value="{{ (!empty($editUser)) ? $editUser->email : old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="" placeholder="Enter Phone Number" value="{{ (!empty($editUser)) ? $editUser->phone : old('phone') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="Address">Address</label>
                            <input type="text" name="address" class="form-control" id="" placeholder="Enter Address" value="{{ (!empty($editUser)) ? $editUser->address : old('address') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="" placeholder="Enter City" value="{{ (!empty($editUser)) ? $editUser->city : old('city') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="State">State</label>
                            <input type="state" name="state" class="form-control" id="" placeholder="Enter State" value="{{ (!empty($editUser)) ? $editUser->State : old('state') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="postcode">PostCode</label>
                            <input type="text" name="postcode" class="form-control" id="" placeholder="Enter Postcode" value="{{ (!empty($editUser)) ? $editUser->postcode : old('postcode') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="country">Country</label>
                            <input type="text" name="country" class="form-control" id="" placeholder="Enter country" value="{{ (!empty($editUser)) ? $editUser->country : old('country') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="outletName">Password</label>
                            <input type="text" name="password" class="form-control" id="" placeholder="Enter Password" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="outletName">Confirm Password</label>
                            <input type="text" name="password_confirmation" class="form-control" id="" placeholder="Enter Confirm Password" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="Role">Select Role</label>
                            <select name="user_type" id="" class="form-control">
                                <option value="admin" {{ (!empty($editUser)) && $editUser->user_type == 'admin'  ? 'selected' : '' }}>Admin</option>
                                <option value="merchant" {{ (!empty($editUser)) && $editUser->user_type == 'merchant'  ? 'selected' : '' }}>Merchant</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn bg-purple">Submit</button>
                    </div>
                </div>
            </form>
        </div><!-- End Col  4 -->
        <div class="col-md-8">
            <div class="card card-primary card-outline">
            <div class="card-header">
            <h3 class="card-title">All User Records </h3> <a href="{{ route('admin_user_index') }}" class=" ml-1 btn-xs btn-success" title="Add New">  <i class="fa fa-plus"></i></a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="customDataTable" class="table table-bordered table-hover table-head-fixed">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address(s)</th>
                  <th>Role(s)</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($getUser as $key => $data)  {?>
                <tr>
                    <td>{{ $data->id  }}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td>
                    <td class="text-danger">{{$data->user_type}}</td>
                    <td>
                        <a href="{{route('admin_user_edit', $data->id)}}" class="btn-sm btn-success" title="Edit"><i class="fa fa-pen"></i></a>  
                        <a href="{{route('admin_user_delete', $data->id)}}" class="btn-sm btn-danger" onclick="return confirm('Are you sure want to Delete?')" title="Delete"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
                <?php } ?>
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                {{$getUser->links()}}
            </div>
          </div>
        </div>
    </div>


@endsection