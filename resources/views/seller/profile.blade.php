@extends('layouts.app')
@section('title','Profile | Seller')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Profile</h3>
        </div>
        <div class="section-body">
        <div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-7">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img @if(Auth()->user()->profile_photo) src="{{asset('storage/uploads/'.Auth()->user()->profile_photo)}}" @else src="{{asset('assets/images/default-avatar.png')}}" @endif width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    
                    <h5 class="mt-2 mb-0">{{Auth::user()->role==1?'Seller':'Buyer'}}</h5>
                    
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">{{ (Auth()->user()->description)? Auth()->user()->description:"Add Description"}} </p>
                    
                    </div>
                    
                  
                    
                    <div class="buttons">
                        
                        <button class="btn btn-outline-primary px-4 edit-profile">Edit Profile</button>
                        
                    </div>
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
        </div>
    </section>

    
@endsection
@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    @if($message = session('success'))
      Swal.fire(
        'Success!',
        '{{ $message }}',
        'success'
       )
    @endif  
    </script>
@endsection    
