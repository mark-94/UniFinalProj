
function saveToDatabase(editableObj,field,id) 
{
    //$(editableObj).css("background","#FFF url(<?php echo site_url('img/loaderIcon.gif');?>loaderIcon.gif) no-repeat right");
    
    //var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;
    var pathArray = window.location.pathname.split( '/' );
    var segment_3 = pathArray[3];

    $.ajax({
        url: segment_3+'/update',
        type: 'POST',
        data:'field='+field+'&editedValue='+editableObj.innerHTML+'&id='+id,
        success: function(){
            $(editableObj).addClass('success');
        }        
   });
}

function saveSelection(editableObj,field,id) 
{
    //$(editableObj).css("background","#FFF url(<?php echo site_url('img/loaderIcon.gif');?>loaderIcon.gif) no-repeat right");
    
    //var newURL = window.location.protocol + "://" + window.location.host + "/" + window.location.pathname;
    var pathArray = window.location.pathname.split( '/' );
    var segment_3 = pathArray[3];

    $.ajax({
        url: segment_3+'/addSelection',
        type: 'POST',
        data:'field='+field+'&editedValue='+editableObj.innerHTML+'&id='+id,
        success: function(){
            //Add div with name to list
        }        
   });
}

//function getDiagnosisCourses(diagnosisID)
//{
//    var pathArray = window.location.pathname.split( '/' );
//    var segment_3 = pathArray[3];
//
//    $.ajax({
//        url:segment_3+'/getDiagnosisCourses',
//        data: 'diagnosisID='+diagnosisID,
//        dataType: 'xml',
//        success: function()
//        {
//            
//        }
//    });
//}