
function saveToDatabase(editableObj,field,id) 
{
    
    var pathArray = window.location.pathname.split( '/' );
    var segment_3 = pathArray[3];

    $.ajax({
        url: segment_3+'/update',
        type: 'POST',
        data:'field='+field+'&editedValue='+editableObj.innerHTML+'&id='+id,
        success: function(){
            $(editableObj).addClass('bg-success');
        }        
   });
}

//Associate a treatment course with a diagnosis
$(document).ready(function(){
    $('ul.unselected-list').on('click','button',function(e)
    {
        
        e.preventDefault();
        var pathArray = window.location.pathname.split( '/' );
        var segment_3 = pathArray[3];
        var el = $(this);
        var course_name = el.text();
        var diag_id = el.closest('.diagnosis').attr('id');
        var treat_id = el.attr('id');
        

        $.ajax({
            url: segment_3+'/addSelection',
            type: 'POST',
            data:'&diag_id='+diag_id+'&treat_id='+treat_id,
            success: function(){
                
                
                el.remove();
                $('#selected_list'+diag_id).append('<li id="'+treat_id+'" class="list-group-item list-group-item-info">'+course_name+'<a href="#" id="deselect" class="pull-right"><i class="glyphicon glyphicon-remove"></i></a></li>');
            }        
        });
    });
});

$(document).ready(function(){
    $('ul.selected-list').on('click', 'a', function(e)
    {
        e.preventDefault();
        var pathArray = window.location.pathname.split( '/' );
        var segment_3 = pathArray[3];
        var el = $(this).parent();
        var course_name = el.text();
        var diag_id = $(this).closest('.diagnosis').attr('id');
        var treat_id = el.attr('id');
        


        $.ajax({
            url: segment_3+'/deleteSelection',
            type: 'POST',
            data:'&diag_id='+diag_id+'&treat_id='+treat_id,
            success: function(){
                
                el.remove();
                $('#unselected_list'+diag_id).append('<button id="'+treat_id+'" class="list-group-item list-group-item-warning btn unselected" >'+course_name+'</button>');

            }        
       });
    });
});