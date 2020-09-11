var food=['varun','tirth','yash','foodzilla','autocomplete'];
$(document).ready(function(){
    $('#recipe_finder').autocomplete(
        { 
            source : food 
        },
        {
            autoFocus:true,
            minLength:2
        });
});