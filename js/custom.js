// js file 





jQuery(document).ready(function() {
	jQuery(function(){
		jQuery('select').change(function(){ // when one changes
			jQuery('select').val( jQuery(this).val() )
			//alert(this.value);
			if(this.value == 'Right'){
				alert('righth');
				jQuery( '.fsm-option' ).css( "display", "none" );
			}
			//jQuery( '.fsm-option' ).css( "position", "sticky" );
			
			
	
		})
	})
});



