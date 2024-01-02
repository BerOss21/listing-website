<div class="my_listing">
    <h4>basic information</h4>
    <form id="profile-form" method="post" action="{{route('dashboard.profile')}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="row">
            <div class="col-xl-8 col-md-12">
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label>First Name</label>
                            <div class="input_area">
                                <input type="text" placeholder="First Name" name="firstname" value="{{old('firstname',auth()->user()->firstname)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label>Last Name</label>
                            <div class="input_area">
                                <input type="text" placeholder="First Name" name="lastname" value="{{old('lastname',auth()->user()->lastname)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="my_listing_single">
                            <label>email</label>
                            <div class="input_area">
                                <input type="Email" name="email" value="{{old('email',auth()->user()->email)}}" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label>phone</label>
                            <div class="input_area">
                                <input type="text" placeholder="1234" name="phone" value="{{old('phone',auth()->user()->phone)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12">
                        <div class="my_listing_single">
                            <label>About Me</label>
                            <div class="input_area">
                                <textarea cols="3" rows="3" placeholder="Your Text" name="about">{{old('about',auth()->user()->about)}}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-12">
                        <div class="my_listing_single">
                            <label>Address</label>
                            <div class="input_area">
                                <input type="text" name="address" value="{{old('address',auth()->user()->address)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">Website</label>
                            <input type="text" class="form-control" name="website" value="{{ old('website',auth()->user()->website) }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">Facebook Link</label>
                            <input type="text" class="form-control" name="fb_link" value="{{ old('fb_link',auth()->user()->fb_link) }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">X Link</label>
                            <input type="text" class="form-control" name="x_link" value="{{ old('x_link',auth()->user()->x_link) }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">LinkedIn Link</label>
                            <input type="text" class="form-control" name="in_link" value="{{ old('in_link',auth()->user()->in_link) }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">WhatsApp Link</label>
                            <input type="text" class="form-control" name="wa_link" value="{{ old('wa_link',auth()->user()->wa_link) }}">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="my_listing_single">
                            <label class="">Instagram Link</label>
                            <input type="text" class="form-control" name="insta_link" value="{{ old('insta_link',auth()->user()->insta_link) }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-5">
                <div class="profile_pic_upload">
                    <img src="{{auth()->user()->avatar}}" alt="img" class="imf-fluid w-100">
                    <input type="file" name="avatar">
                </div>
            </div>
        </div>

        <div class="col-12">
            <button type="submit" id="profile-form-submit"  class="read_btn">update</button>
        </div>
    </form>
</div>

@push('dashboard_js')
<script>
    $("#profile-form-submit").on('click',function(e){
        e.preventDefault();
        $("#profile-form").submit();
    })
</script>
@endpush