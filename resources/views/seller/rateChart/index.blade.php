@extends('layouts.app')
@section('title','Rate Chart | Seller')

@section('content')

<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Rate Chart</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="row d-flex justify-content-end">
                          <div class="col-lg-2">
                            
                             <a href="{{route('seller.rateChart.create')}}" type="button" class="btn btn-primary w-100">Add Rate</a>
                          </div>
                        </div>
                        <div class="mt-3">
                        <div>
                        <div class="table-responsive">
                        <table class="table border mb-0">
                            <thead class="table-light fw-semibold">
                                <tr class="align-middle">
                                      
                                        <th class="text-center">Sl No</th>
                                        
                                        <th class="text-center">Type</th>
                                        <th class="text-center">Rate (Rupees/Kg)</th>
                                        <th class="text-center">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                @forelse($oranges as $key => $orange)
                                <tr class="align-middle">
                                  
                                        <td class="text-center"><div class="">{{$key+1}}</div></td>
                                        <td class="text-center"><div>{{$orange->type}}</div></td>
                                       
                                        <td class="text-center"><div class="">{{$orange->rate}}</td>
                                        <td class="text-center">
                                          
                                            <a href="{{route('seller.rateChart.edit',$orange->id)}}" data-toggle="tooltip" title="Edit">
                                              <i class="fas fa-edit text-primary icon-size"></i>
                                            </a>
                                        
                                           
                                           <a href="javascript:void(0);" onclick="deleteConfirmation('{{$orange->id}}')" title="Delete" class="" data-toggle="tooltip">
                                             <i class="fas fa-trash-alt text-danger icon-size"></i>
                                          </a>
                                             <form id="rate-form-{{$orange->id}}" action="{{route('seller.rateChart.destroy',$orange->id)}}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                            </form>
                                        
                                        </td>
                                   

                                </tr>

                                @empty

                                 <tr>
                                     <td align="center" colspan="4">No Data Exists.</td>
                                 </tr>
                                @endforelse

                                 

                               

                            </tbody>
                        </table>
                        <div class="">
                        {{$oranges->links()}}
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
<script type="text/javascript">

 function deleteConfirmation(id){
    
   Swal.fire(
  {
    title: "Are you sure?",
    text: "You want to delete rate.",
    type: "warning",   
    showCancelButton: true,   
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel it!",
  },

  
).then((result)=>{

if (result.isConfirmed) {
    $('#rate-form-'+id).submit()
}else{
    return false;
}

});


}
   
</script>

@endsection