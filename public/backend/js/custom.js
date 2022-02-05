$('#image').change(function(e){

	let reader = new FileReader();

	reader.readAsDataURL(this.files[0])

	

	reader.onload = function(e){



		let src = e.target.result

		$('#upd_img').attr('src',e.target.result)



	}





	


})







		




