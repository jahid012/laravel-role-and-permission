@extends('layouts.guest')
@section('content')
    <section class="ftco-section">
		<div class="container"> 

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<h3 class="text-center mb-4">Are you Admin?</h3>
					<form method="POST" action="{{ route('admin.login') }}" class="login-form">
                            
		      		<div class="form-group">
		      			<input type="text" name="email" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
	            <div class="form-group d-flex">
	              <input type="password" name="password" class="form-control rounded-left" placeholder="{{__('Password')}}" required>
	            </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
	            <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">{{ __('Remember me') }}
                            <input type="checkbox" name="remember">
                            <span class="checkmark"></span>
                        </label>
                    </div> 			
                    @if(Route::has('password.request'))
                        <div class="w-50 text-md-right">
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        </div>
                    @endif		
	            </div>
	            <div class="form-group">
	            	<button type="submit" class="btn btn-primary rounded submit p-3 px-5">{{ __('Get Started') }}</button>
	            </div>
                @csrf
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>
    @endsection


