@extends('layouts.app')
@section('content')
    <div class="row">
             <div class="col-12">
               <div class="card">
                 <form method="POST" action="{{ route('admin.users.update',$user->id)}}" class="m-4">
                   @csrf
                   @method('put')
                   <div class="form-group row">
                    <label for="inputUserName" class="col-sm-2 col-form-label font-weight-bold">User Name</label>
                    <div class="col-sm-10">
                      <input name="name" type="text" class="form-control" id="inputUserName" placeholder="Enter Name" value="{{ old('name',$user->name) }}">
                    </div>
                  </div>
  
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                   
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label font-weight-bold">Email</label>
                    <div class="col-sm-10">
                      <input name="email" type="email" class="form-control" id="inputEmail" placeholder="Enter Email" value="{{ old('email',$user->email) }}">
                    </div>
                  </div>
                  
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
  
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label font-weight-bold">Password</label>
                    <div class="col-sm-10">
                      <input name="password" type="password" class="form-control" id="inputPassword" placeholder="Enter Password" value="{{ old('password') }}">
                    </div>
                  </div>
  
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
  
                   <div class="form-group row">
                    <label for="inputComformPassword" class="col-sm-2 col-form-label font-weight-bold">Confirm Password</label>
                    <div class="col-sm-10">
                      <input name="password_confirmation" type="password" class="form-control" id="inputComformPassword" placeholder="Confirm Password">
                    </div>
                  </div>
 
                 <h3 class="text-xl my-4 text-gray-600">Role</h3>
                 <div class="grid grid-cols-3 gap-4">
                   @foreach($roles as $role)
                       <div class="flex flex-col justify-cente">
                           <div class="flex flex-col">
                               <label class="inline-flex items-center mt-3">
                                   <input type="checkbox" class="form-checkbox h-5 w-5 text-blue-600" name="roles[]" value="{{$role->id}}"
                                   @if(count($user->roles->where('id',$role->id)))
                                       checked 
                                   @endif
                                   ><span class="ml-2 text-gray-700">{{ $role->name }}</span>
                               </label>
                           </div>
                       </div>
                   @endforeach
                 </div>
                 <div class="text-center mt-16 mb-16">
                  <button type="submit" class="btn btn-primary" data-toggle="button" aria-pressed="false" autocomplete="off">
                    Submit
                  </button>
                 </div>
               </div>
 
              
             </div>
     </div>

@endsection