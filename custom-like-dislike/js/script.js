$(document).ready(function(){

	// like button press

	$(".like-btn").on('click', function(e){

		// getting post ID
		let postId = $(this).parent('div').parent('div').attr('id');

// --------------------------------------------------------------------------------------
		// already dliked and try to like same POST
		// if($(this).next('button>sapn').hasClass('dislike')){
			
		// 	// sub dislike count increase like count of specific POST
		// 	// decreasing dislikes
		// 	// $(this).next('button>span').removeClass('dislike');
			
		// 	// increasing likes
		// 	// var increase = $(this).children('.like').text();
		// 	// increase++;
		// }
// ---------------------------------------------------------------------------------------
		// toggle classes
		$(this).toggleClass('text-warning');

		// inner count (i.e likes count)
		var counter = $(this).find('span').text();
		
		// add custom class for check either btn is already presed or not?

		var check = $(this).find('span');
		
		$(check).toggleClass('like');

		status = check.attr('class');
		
		if(check.hasClass('like')){
			parseInt(counter++)
			check.text(counter);
		}

		if(!check.hasClass('like')){
			parseInt(counter--);
			check.text(counter);
		}
		
	});

	// dislike button press

	$(".dislike-btn").on('click', function(e){

		// getting post ID
		let postId = $(this).parent('div').parent('div').attr('id');


		// // already liked and try to dislike same POST
		// if($('.like-btn').child('span').hasClass(''))

		// toggle classes
		$(this).toggleClass('text-warning');

		// inner count (i.e dislikes count)
		var counter = $(this).find('span').text();
		
		// add custom class for check either btn is already presed or not?

		var check = $(this).find('span');
		
		$(check).toggleClass('dislike');

		status = check.attr('class');
		
		if(check.hasClass('dislike')){
			parseInt(counter++)
			check.text(counter);
		}

		if(!check.hasClass('dislike')){
			parseInt(counter--);
			check.text(counter);
		}
		
	});


});

