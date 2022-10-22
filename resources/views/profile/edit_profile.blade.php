<div id="EditProfileModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form method="POST" id="" enctype="multipart/form-data" action="{{route('seller.update_profile')}}">
                
                <div class="modal-body">
                    <div class="alert alert-danger d-none" id="editProfileValidationErrorsBox"></div>
                    
                    {{csrf_field()}}
                    <div class="row">
                        
                        <div class="form-group col-sm-6 d-flex">
                            <div class="col-sm-4 col-md-6 pl-0 form-group">
                                <label>Profile Image:</label>
                                <br>
                                <label
                                        class="image__file-upload btn btn-primary text-white"
                                        tabindex="2"> Choose
                                    <input type="file" name="profile_photo"  class="d-none">
                                </label>
                            </div>
                            <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                <img id='edit_preview_photo'
                                     class="img-thumbnail user-img user-profile-img profilePicture"
                                     @if(Auth()->user()->profile_photo) src="{{asset('storage/uploads/'.Auth()->user()->profile_photo)}}" @else src="{{asset('assets/images/default-avatar.png')}}"@endif/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label>Description:</label>
                            <textarea type="text" name="description"  class="form-control" row="20" col="10">{{Auth()->user()->description}}</textarea>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnPrEditSave"
                                data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing..."
                                tabindex="5">Save
                        </button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

