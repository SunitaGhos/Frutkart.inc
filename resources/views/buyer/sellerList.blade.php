@extends('layouts.app')
@section('title','sellerList | Buyer')

@section('content')

<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Seller Lists</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                       
                        <div class="mt-3">
                        <div>
                        <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                      
                                        <th class="text-center">Sl No</th>
                                        
                                        <th class="text-center">Email</th>
                                       
                                        <th class="text-center">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sellers as $key => $seller)
                                <tr class="align-middle">
                                  
                                        <td class="text-center"><div class="">{{$key+1}}</div></td>
                                        <td class="text-center"><div>{{$seller->email}}</div></td>
                                       
                                        
                                        <td class="text-center">
                                          
                                            <a href="{{route('buyer.viewSellerProfile',$seller->id)}}" data-toggle="tooltip" title="View Profile">
                                              <i class="fas fa-eye text-primary icon-size"></i>
                                            </a>
                                        </td>
                                   

                                </tr>

                                @empty

                                 <tr>
                                     <td align="center" colspan="7">No Data Exists.</td>
                                 </tr>
                                @endforelse

                                 

                               

                            </tbody>
                        </table>
                        <div class="mt-2 d-flex justify-content-end">
                        {{$sellers->links()}}
                        </div>
                        
                    </div>
                    </div>
                    
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection