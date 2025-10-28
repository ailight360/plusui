jQuery(function($){
	$('.blogPager').click(function(){  
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': fletro_load_mores.posts, 
			'page' : fletro_load_mores.current_page
		};
 
		$.ajax({
			url : fletro_load_mores.ajaxurl,
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.html("<div class='jsLoad wait' data-text='loading'><svg viewBox='0 0 50 50' x='0px' y='0px'><path d='M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z'><animateTransform attributeName='transform' attributeType='xml' dur='0.6s' from='0 25 25' repeatCount='indefinite' to='360 25 25' type='rotate'/></path></svg></div>"); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 					
					button.html("<a class=\"jsLoad\" data-text=\"Load more\" href=\"javascript:;\"></a>").prev().before(data);  
					fletro_load_mores.current_page++;
 
					/* if ( fletro_load_mores.current_page == fletro_load_mores.max_page ) 
						button.html("<a class='jsLoad noPost' data-text='No Results Found' href='javascript:;'/>");  */
				} else {
					button.html("<div class='jsLoad noPost' data-text='No Results Found'/>"); 
				}
			}
		});
	});
});