@extends('layouts.app')
@section('content')
    <div class="row">
             <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div style="text-align: right">
                    @can('User create')
                      <a href="{{route('admin.users.create')}}" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">New User</a>
                    @endcan
                  </div>
                </div>
                 
 
               <div class="table-responsive">
                 <table class="table">
                   <thead class="thead-light">
                     <tr>
                       <th scope="col">User Name</th>
                       <th scope="col">Role</th>
                       <th scope="col" class="text-right">Actions</th>
                     </tr>
                   </thead>
                   <tbody>
                     
                     @can('User access')
                       @foreach($users as $user)
                       <tr class="hover:bg-grey-lighter">
                         <td scope="col"><p class="font-weight-bold">{{ $user->name }}</p></td>
                         <td scope="col">
                             @foreach($user->roles as $role)
                               <a href="#" class="badge badge-info">{{ $role->name }}</a>
                             @endforeach
                         </td>
                         <td scope="col" class="text-right">
                           @can('User edit') 
                           <a class="btn btn-primary" href="{{route('admin.users.edit',$user->id)}}" role="button">Edit</a>
                           @endcan
 
                           @can('User delete')
                           <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline">
                               @csrf
                               @method('delete')
                               <button type="submit" class="btn btn-danger">Delete</button>
                           </form>
                           @endcan
 
                         </td>
                       </tr>
                       @endforeach
                     @endcan
 
                   </tbody>
                 </table>
               </div>
              </div>
             </div>
        
     </div>
 </div>
@endsection