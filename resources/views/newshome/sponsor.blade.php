@extends('frontend.main')

@section('title')
Sponsor Us
@endsection
@section('content')
<section id="contentSection">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8">
			<div class="left_content">
				<div class="contact_area">
					@if (session('status'))
					<div class="alert alert-success" role="alert">
						{{ session('status') }}
					</div>
					@endif
					@if (session('error'))
					<div class="alert alert-danger" role="alert">
						{{ session('error') }}
					</div>
					@endif
					<h2>Sponsor Us</h2>
					<form action="{{route('sponsorStore')}}" id="Sponsor" class="contact_form" method="POST" enctype="multipart/form-data">
						@csrf
						<input class="form-control" name="company" type="text" placeholder="Company Name*">
						<input class="form-control"  name="website" type="text" placeholder="Website*">
						<input class="form-control" name="phone" style ="margin-bottom: 30px;" type="number" placeholder="Phone number">
						<input class="form-control" name="email" type="email" placeholder="Official Email*">
						<div class="sponsor-image">
							<select class="form-control" name="imageType" id="imageType">
								<option value="" disabled>Select Image type</option>
								<option value="normal">Normal</option>
								<option value="banner">Banner</option>
							</select><br>
							<img id="uploadPreview" width="80%" height="40%;" accept="image/gif, .gif"/>
							<br><br>
							<input class="bg-info" name="image"  id="uploadImage" type="file" onchange="PreviewImage();" style="border-radius: 2px; margin-left:2em;"/>
						</div>
						<br>
						<textarea name="message" class="form-control" cols="30" rows="10" placeholder="Message*"></textarea>
						<input type="checkbox" id="termsandcondition">
						<label>Agree to Terms and condition</label><br><br>
						<button class="btn btn-primary rounded font-weight-bold" type="submit" value="Submit" id="submitSponsor">Submit</button>
					</form>
					<br>
					<p><mark>* Details will be verified and approved for the ads to appear on the website.</mark></p>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')

<script type="text/javascript">  
	$('#submitSponsor').prop("disabled",true);
	$('#termsandcondition').change(function () {
		if(this.checked){
			$('#submitSponsor').prop("disabled",false);
		}else{
			$('#submitSponsor').prop("disabled",true);
		}
	});

	{{-- Preview image --}}
	function PreviewImage() {  
		var oFReader = new FileReader();  
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);  
		oFReader.onload = function (oFREvent) {  
			document.getElementById("uploadPreview").src = oFREvent.target.result;  
		};  
	};

</script>

@endsection