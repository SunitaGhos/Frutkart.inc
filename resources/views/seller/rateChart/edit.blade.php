@extends('layouts.app')
@section('title','Rate Chart | Seller')

@section('content')

<section class="section">
        <div class="section-header">
            <h3 class="page__heading">Edit Rate</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                        <div class="mt-3">
						<div class="manage-rate-create">
							<form method="post" action="{{route('seller.rateChart.update',$orange->id)}}">
								@csrf
								@method('PUT')
								<div class="form-group row">
									<label for="colFormLabel" class="col-sm-2 col-form-label">Type</label>
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control @error('type') is-invalid @enderror" id="colFormLabel" name="type"placeholder="Enter Orange Type"  value="{{ old('type',$orange->type) }}">
										@error('type')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
								</div>

							
								<div class="form-group row">
									<label for="colFormLabel" class="col-sm-2 col-form-label">Rate (in Rupees/Kg)</label>
									<div class="col-md-6 mb-3">
										<input type="text" class="form-control @error('rate') is-invalid @enderror" id="colFormLabel" name="rate"placeholder="Enter Rate" value="{{old('rate',$orange->rate)}}">
										@error('rate')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									
								</div>

							<div class="col-lg-2">
								<button type="submit" class="btn btn-primary w-100">Update
								</button>
							</div>
							
						</form>
						
					</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




@endsection