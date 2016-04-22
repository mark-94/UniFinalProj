//To use follow this structure:
//<div id="id-of-row-in-db" class="inline-id">
//  <div id="name-of-field-in-db" class="inline-edit" contenteditable="true">editable cotent</div>
//</div>
$(document).ready(function(){
    $('div.inline-edit').blur(function()
    {        
        var pathArray = window.location.pathname.split( '/' );
        var segment_3 = pathArray[3];
        if(segment_3 === "patient_referral")
        {
            segment_3 = "referral";
        }
        var editableObj = $(this);
        var editedType = editableObj.attr('type');
        
        var token_input = $('input.token');
        var token_name = token_input.attr('name');
        var save_data ={};        
        save_data[token_name] = token_input.attr('value');
        save_data['field'] = editableObj.attr('id');
        save_data['id'] = editableObj.closest('.inline-id').attr('id');
        save_data['editedValue'] = editableObj.text();
         
        if(validityChecker(save_data['editedValue'],editedType) === true)
        {
            $(editableObj).popover('destroy');
            $.ajax({
                url: segment_3+'/update',
                type: 'POST',
                data:save_data,
                success: function(data){
                        $(token_input).val(data);
                        $(editableObj).addClass('list-group-item-success');
                }        
            });
        }
        else
        {
            $(editableObj).popover({title: "Error!", content: "This field can only contain "+editedType+" values", placement: "top" , trigger:"manual"});
            $(editableObj).popover('show'); 
        }
    });
});

//Associate a treatment course with a diagnosis
$(document).ready(function(){
    $('ul.unselected-list').on('click','button',function(e)
    {
        e.preventDefault();
        var pathArray = window.location.pathname.split( '/' );
        var segment_3 = pathArray[3];
        var el = $(this);
        var post_data = {};
        var token_input = $('input.token');
        var token_name = token_input.attr('name');
        post_data[token_name]= token_input.attr('value');
        post_data['name'] = el.text();
        post_data['diag_or_treat_id'] = el.closest('.diag-treat').attr('id');
        post_data['treat_or_med_id'] = el.attr('id');
        
        $.ajax({
            url: segment_3+'/addSelection',
            type: 'POST',
            data:post_data,
            success: function(data){
                $(token_input).val(data);
                el.remove();
                $('#selected_list'+post_data['diag_or_treat_id']).append('<li id="'+post_data['treat_or_med_id']+'" class="list-group-item list-group-item-info">'+post_data['name']+'<a href="#" id="deselect" class="pull-right"><i class="glyphicon glyphicon-remove"></i></a></li>');
            }        
        });
    });
});


//remove assoication between a diagnosis and treatment course
$(document).ready(function(){
    $('ul.selected-list').on('click', 'a', function(e)
    {
        e.preventDefault();
        var pathArray = window.location.pathname.split( '/' );
        var segment_3 = pathArray[3];
        var el = $(this).parent();
        var post_data = {};
        var token_input = $('input.token');
        var token_name = token_input.attr('name');
        post_data[token_name]= token_input.attr('value');
        post_data['name'] = el.text();
        post_data['diag_or_treat_id'] = $(this).closest('.diag-treat').attr('id');
        post_data['treat_or_med_id'] = el.attr('id');
        
        $.ajax({
            url: segment_3+'/deleteSelection',
            type: 'POST',
            data:post_data,
            success: function(data){
                $(token_input).val(data);
                el.remove();
                $('#unselected_list'+post_data['diag_or_treat_id']).append('<button id="'+post_data['treat_or_med_id']+'" class="list-group-item list-group-item-warning btn-width-match-parent unselected" >'+post_data['name']+'</button>');

            }        
       });
    });
});

$(document).ready(function() {
    $(".clickable-row").click(function() 
    {
        window.document.location = $(this).data("href");
    });
});

//returns true/false after going through validation
function validityChecker(value, type) 
{
    type = type?type:'text';
    $('body').append('<input id="checkValidity" type="'+type+'" style="display:none;">');
    $('#checkValidity').val(value);
    validity = $('#checkValidity').val()?$('#checkValidity').val().length>0:false && $('#checkValidity')[0].checkValidity();
    $('#checkValidity').remove();
    return validity;
}
