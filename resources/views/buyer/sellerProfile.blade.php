@extends('layouts.app')
@section('title','Seller Profile | Buyer')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Seller Profile</h3>
        </div>
        <div class="section-body">
        <div class="container mt-5">
    
    <div class="row d-flex justify-content-center">
        
        <div class="col-md-12">
            
            <div class="card p-3 py-4">
                
                <div class="text-center">
                    <img @if($seller->profile_photo) src="{{asset('storage/uploads/'.$seller->profile_photo)}}" @else src="{{asset('assets/images/default-avatar.png')}}" @endif width="100" class="rounded-circle">
                </div>
                
                <div class="text-center mt-3">
                    
                    <h5 class="mt-2 mb-0"></h5>
                    
                    
                    <div class="px-4 mt-1">
                        <p class="fonts">{{ ($seller->description)? $seller->description:"No Description Added Yet"}} </p>
                    
                    </div>

                    <h5 class="mt-5 mb-0"> Rate Chart</h5>
                    
                    <table class="table table-striped mt-3 mb-0">
                        <thead>
                            <tr>
                            <th scope="col">#SL No</th>
                            <th scope="col">Orange Type</th>
                            <th scope="col">Rate(Rupees/Kg)</th>
                          
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($seller->rateChart as $key=>$chart)
                            <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$chart->type}}</td>
                            <td>{{$chart->rate}}</td>
                           
                            </tr>
                            @empty
                            
                            <tr>
                                     <td align="center" colspan="3">No Data Exists.</td>
                            </tr>
                            @endforelse
                            
                        </tbody>
                    </table>

                    
                   
                    
                    
                </div>
                
               
                
                
            </div>
            
        </div>
        
    </div>
    
</div>
        </div>
    </section>

    
@endsection
