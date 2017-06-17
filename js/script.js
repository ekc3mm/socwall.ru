
jQuery(function(){
jQuery('.targetDiv').hide();
        jQuery('.showBranch').click(function(){
       
              jQuery('#post'+$(this).attr('target')).slideToggle();
        });

        
        jQuery('.showForm').click(function(){
             
              jQuery('#form'+$(this).attr('target')).slideToggle();
        });

        jQuery('.showsubForm').click(function(){
             
              jQuery('#subform'+$(this).attr('target')).slideToggle();
        });
});

