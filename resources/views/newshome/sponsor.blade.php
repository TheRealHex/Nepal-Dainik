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
					<h2>Sponsor Us</h2>
					<form action="#" class="contact_form">
						<input class="form-control" type="text" placeholder="Company Name*">
						<input class="form-control" type="text" placeholder="Website*">
						<input class="form-control" type="email" placeholder="Official Email*">
						<div class="sponsor-image">
							<img id="uploadPreview" width="80%" height="40%;" accept="image/gif, .gif"/>
							<select class="form-control" name="imgType" id="imgType">
								<option disabled selected>Select Image type</option>
								<option value="normal">Normal</option>
								<option value="banenr">Banner</option>
							</select>
							<br><br>
							<input class="bg-info" id="uploadImage" type="file" name="image" onchange="PreviewImage();" style="border-radius: 2px; margin-left:2em;"/>
						</div>
						<br>
						<textarea class="form-control" cols="30" rows="10" placeholder="Message*"></textarea>
						<input type="submit" value="Send Message">
					</form>
					<br>
					<p><mark>* Details will be verified and approved for the ads to appear on the website.</mark></p>
				</div>
			</div>
		</div>
	</div>
</section>
{{-- Preview image --}}
<script type="text/javascript">  
	function PreviewImage() {  
		var oFReader = new FileReader();  
		oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);  
		oFReader.onload = function (oFREvent) {  
			document.getElementById("uploadPreview").src = oFREvent.target.result;  
		};  
	};  
</script>
@endsection