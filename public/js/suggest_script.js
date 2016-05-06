
$(document).ready(function(){
   
    $('.autosuggest').keyup(function(){
       
  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        var search_term=$(this).val();
       
       $.ajax({
           url:'Autosuggest',
           type:"post",
           data:{search_term:search_term},
           success:function(data)
      
         {
            $('.result').html(data);
            $('.result li').click(function(){
                var result_value=$(this).text();
            
                $('.autosuggest').val(result_value);
            });
                
        }
         });
       
    });
    
    
});


