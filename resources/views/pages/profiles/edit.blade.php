@extends('pages.layouts.template')
@section('content')
<section class="kandidat" id="partai">
  <div class="container">
    <h2 class="text-center mb-4">Edit Profile</h2>
    <div class="row">
      <div class="col-md-8 mx-auto">
        <div class="card">
          <div class="card-body text-center">
            @if (Auth::user()->photo)
            <img id="preview" src="{{ asset('assets/images/users/' . Auth::user()->photo) }}" class="img-account-profile rounded-circle mb-2 min-w-6 max-w-9" alt="Profile Picture Preview">
            @else
            <img id="preview" src="{{ asset('assets/images/users/default.png') }}" class="img-account-profile rounded-circle mb-2 min-w-6 max-w-6" alt="Profile Picture Preview">
            @endif
          </div>
          <div class="card-body">
            <form action="{{ route('profiles.update', Auth::user()) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group mt-2">
                  <label for="photo">Profile Picture</label>
                  <input type="file" class="form-control" id="photo" name="photo" onchange="previewFile(this)">
              </div>
              <div class="form-group mt-2">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
              </div>
              <div class="form-group mt-2">
                <label for="email">NIK</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ Auth::user()->nik }}" readonly>
              </div>
              <div class="form-group mt-2">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
              </div>
              <div class="form-group mt-2">
                <label for="date_of_birth">Date of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ Auth::user()->date_of_birth }}">
              </div>
              <div class="form-group mt-2">
                <label for="place_of_birth">Place of Birth</label>
                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{ Auth::user()->place_of_birth }}">
              </div>
              <div class="form-group mt-2">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                  <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
              </div>
              <div class="form-group mt-2">
                <label for="religion">Religion</label>
                <select class="form-control" id="religion" name="religion">
                  <option value="islam" {{ Auth::user()->religion == 'islam' ? 'selected' : '' }}>Islam</option>
                  <option value="christian" {{ Auth::user()->religion == 'christian' ? 'selected' : '' }}>Christian</option>
                  <option value="catholic" {{ Auth::user()->religion == 'catholic' ? 'selected' : '' }}>Catholic</option>
                  <option value="hindu" {{ Auth::user()->religion == 'hindu' ? 'selected' : '' }}>Hindu</option>
                  <option value="buddha" {{ Auth::user()->religion == 'buddha' ? 'selected' : '' }}>Buddha</option>
                  <option value="confucian" {{ Auth::user()->religion == 'confucian' ? 'selected' : '' }}>Confucian</option>
                  <option value="other" {{ Auth::user()->religion == 'other' ? 'selected' : '' }}>Other</option>
                </select>
              </div>
              <div class="form-group mt-2">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}">
              </div>
              <div class="form-group mt-2">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
              </div>
 
              <button type="submit" class="btn btn-primary my-3">Update Profile</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
function previewFile(input){
    var file = $("input[type=file]").get(0).files[0];

    if(file){
        var reader = new FileReader();

        reader.onload = function(){
            $("#preview").attr("src", reader.result);
        }

        reader.readAsDataURL(file);
    }
}
</script>
@endsection
