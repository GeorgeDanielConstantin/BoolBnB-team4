@extends('layouts.app')




<div class="frame flex">
  <div class="center">
    
		<div class="profile">
			<div class="image">
				<div class="circle-1"></div>
				<div class="circle-2"></div>
				<img src="https://images.unsplash.com/photo-1536444894718-0021cbbeb45f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60" alt="Jessica Potter" width="70" height="70">
			</div>
			
			<div class="name">ADMIN</div>
			<div class="job">BoolBnb Host</div>
			
      <div>
        <svg xmlns="http://www.w3.org/2000/svg" 
           width="40px" height="30px"
           viewBox="5 0 80 60">
          <path id="wave" 
              fill="none" 
              stroke="#262626" 
              stroke-width="2"
              stroke-linecap="round">
          </path>
        </svg>
      </div>


			<div class="actions">
				<button class="btn hvr-underline-from-center">Follow</button>
				<button class="btn hvr-underline-from-center">Message</button>
			</div>
		</div>
		
		<div class="stats">
			<div class="box box1 hvr-underline-from-right">
				<span class="value">523</span>
				<span class="parameter">Posts</span>
			</div>
			<div class="box box2 hvr-underline-from-right">
				<span class="value">1387</span>
				<span class="parameter">Likes</span>
			</div>
			<div class="box box3 hvr-underline-from-right">
				<span class="value">146</span>
				<span class="parameter">Followers</span>
			</div>
		</div>
  </div>
</div>

@section('content')

  <!-- <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.update-profile-information-form')
        </div>

        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.update-password-form')
        </div> -->

        <div class="card p-4 mb-4 rounded-lg">
          @include('admin.profile.partials.delete-user-form')
        </div>
      </div>
    </div>
  </div>
@endsection




