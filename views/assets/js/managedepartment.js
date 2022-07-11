
$(document).on("click", ".btnaexamssetting", function(){
    var stdid = $(this).attr("stdid");
    Swal.fire({
        title: 'Do you want delete this Record',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete This Record!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=examsettingrprt&stdid="+stdid;
        }
    })
});

$(document).on("click", ".btnaexamscript", function(){
    var scrid = $(this).attr("scrid");
    Swal.fire({
        title: 'Do you want delete this Record',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete This Record!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=scriptmarkingrprt&scrid="+scrid;
        }
    })

});
$(document).on("click", ".btnassignedmdl", function(){
    var tchid = $(this).attr("tchid");
    Swal.fire({
        title: 'Do you want delete this Modules Assigned',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete Modules Assigned!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=viewassigned&tchid="+tchid;

        }

    })

});

$(document).on("click", ".btndelstudent", function(){
    var stdid = $(this).attr("stdid");
    Swal.fire({
        title: 'Do you want delete this Student',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete Student!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=students&stdid="+stdid;

        }

    })

});

$(document).on("click", ".btnclassdel", function(){
    var crsid = $(this).attr("crsid");
    Swal.fire({
        title: 'Do you want delete this Data',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete Data!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=classes&crsid="+crsid;

        }

    })

});


$(document).on("click", ".btnDebrn", function(){
    var brid = $(this).attr("brid");
    Swal.fire({
        title: 'Do you want delete this Data',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete Data!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=departments&brid="+brid;

        }

    })

});

$(document).on("click", ".btncoarse", function(){
    var crsid = $(this).attr("crsid");
    Swal.fire({
        title: 'Do you want delete this course',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete course!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=courses&crsid="+crsid;

        }

    })

});



$(document).on("click", ".btneditclass", function(){
var crsid = $(this).attr("crsid");
var datas = new FormData();
 datas.append("classid",crsid);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#edid").val(answer["id"]);
    $("#editnostdnt").val(answer["totalsdnts"]);
 
  }
});
})




$(document).on("click", ".btneditstudent", function(){
var stdid = $(this).attr("stdid");
var datas = new FormData();
 datas.append("stdid",stdid);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#edid").val(answer["id"]);
    $("#editfullname").val(answer["fullname"]);
    $("#editregno").val(answer["regno"]);
    $("#editphone").val(answer["phone"]);
      
  }
});
})

$(document).on("click", ".btneditbran", function(){
var brid = $(this).attr("brid");
var datas = new FormData();
 datas.append("brid",brid);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#eidiii").val(answer["id"]);
    $("#edithod").val(answer["hod"]);
    $("#editinit").val(answer["initial"]);
    $("#editname").val(answer["name"]);
      
  }
});
})





$(document).ready(function(){
  
    $('#classdepart').on('change', function() {

      if ( this.value == 'Within Department')
      {
        $("#indepartment").show();
        $("#notindepartment").hide();
     
      }
       else if ( this.value == 'Not in Department')
      {
        $("#notindepartment").show();
        $("#indepartment").hide();
    
      }
      
      else
      {
        $("#indepartment").hide();
        $("#notindepartment").hide();
      }

    
    });
});





$(document).ready(function(){
  
    $('#entrytype3').on('change', function() {

      if ( this.value == 'Upload CSV')
      {
        $("#csvfileupload3").show();
        $("#studentfullname").hide();
     
      }
       else if ( this.value == 'Enter Single Info')
      {
        $("#studentfullname").show();
        $("#csvfileupload3").hide();
    
      }
      
      else
      {
        $("#csvfileupload3").hide();
        $("#studentfullname").hide();
      }

    
    });
});




$(document).ready(function(){
  
    $('#entrytype').on('change', function() {

      if ( this.value == 'Upload CSV')
      {
        $("#csvfileupload").show();
        $("#singlefullname").hide();
     
      }
       else if ( this.value == 'Enter Single Info')
      {
        $("#singlefullname").show();
        $("#csvfileupload").hide();
    
      }
      
      else
      {
        $("#csvfileupload").hide();
        $("#singlefullname").hide();
      }

    
    });
});

$(document).ready(function(){
  
    $('#entrytype1').on('change', function() {

      if ( this.value == 'Upload CSV')
      {
        $("#csvfileupload1mdls").show();
        $("#single1mdl").hide();
     
      }
       else if ( this.value == 'Enter Single Info')
      {
        $("#single1mdl").show();
        $("#csvfileupload1mdls").hide();
    
      }
      
      else
      {
        $("#csvfileupload1mdls").hide();
        $("#single1mdl").hide();
      }

    
    });
});



$(".csvfile").change(function(){
  var image = this.files[0];
  
  if (image["type"] != "application/vnd.ms-excel" ) {
    $(".csvfile").val("");

            Swal.fire({
            icon: "error",
            title: "Document  is supposed to be CSV Type",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
              
  } else if(image["size"] == 0 ){
     $(".csvfile").val("");

            Swal.fire({
            icon: "error",
            title: "Document selected is Empty",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
  }
  else{
    var imgData = new FileReader;
    imgData.readAsDataURL(image);
    $(imgData).on("load", function(event){
    var routeImg = event.target.result;
    $(".preview1").attr("src", routeImg);
    });
  }
})

$(".csvfilethree").change(function(){
  var image = this.files[0];
  
  if (image["type"] != "application/vnd.ms-excel" ) {
    $(".csvfilethree").val("");

            Swal.fire({
            icon: "error",
            title: "Document  is supposed to be CSV Type",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
              
  } else if(image["size"] == 0 ){
     $(".csvfilethree").val("");

            Swal.fire({
            icon: "error",
            title: "Document selected is Empty",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
  }
  else{
    var imgData = new FileReader;
    imgData.readAsDataURL(image);
    $(imgData).on("load", function(event){
    var routeImg = event.target.result;
    $(".preview1").attr("src", routeImg);
    });
  }
})
$(".csvfiletwo").change(function(){
  var image = this.files[0];
  
  if (image["type"] != "application/vnd.ms-excel" ) {
    $(".csvfiletwo").val("");

            Swal.fire({
            icon: "error",
            title: "Document  is supposed to be CSV Type",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
              
  } else if(image["size"] == 0 ){
     $(".csvfiletwo").val("");

            Swal.fire({
            icon: "error",
            title: "Document selected is Empty",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
  }
  else{
    var imgData = new FileReader;
    imgData.readAsDataURL(image);
    $(imgData).on("load", function(event){
    var routeImg = event.target.result;
    $(".preview1").attr("src", routeImg);
    });
  }
})


$(".phototwo").change(function(){
  var image = this.files[0];
  if (image["type"] != "image/jpeg" && image["type"] != "image/png" ) {
    $(".phototwo").val("");

            Swal.fire({
            icon: "error",
            title: "image is supposed to be jpeg or png",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
              
  

  }else if(image["size"] > 2000000){
    $(".phototwo").val("");
    Swal.fire({
      icon: "error",
      title: "Error uploading image",
      text: "¡Image too big. It has to be less than 2Mb!",
      showConfirmButton: true,
      confirmButtonText: "Close"
    });

  }else{
    var imgData = new FileReader;
    imgData.readAsDataURL(image);
    $(imgData).on("load", function(event){
    var routeImg = event.target.result;
    $(".previewtwo").attr("src", routeImg);
    });
  }
})

$(document).on("click", ".showsettngs", function(){
var setsid = $(this).attr("setsid");
var datas = new FormData();
 datas.append("setsid",setsid);
$.ajax({
  url:"ajax/settings.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){



    $("#idyrtwo").val(answer["yearinit"]);
  
    $("#edsemter2").val(answer["smster"]);
    $("#statuswitch").val(answer["displaystatus"]);
    $("#statuswitch").html(answer["displaystatus"]);
    $("#idsems").val(answer["id"]);
    
  }
});
})
$(document).on("click", ".editsettngs", function(){
var setsid = $(this).attr("setsid");
var datas = new FormData();
 datas.append("setsid",setsid);
$.ajax({
  url:"ajax/settings.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#idyear").val(answer["yearinit"]);
    $("#idyear").html(answer["yearinit"]);
    $("#edsemter").val(answer["smster"]);
    $("#edsemter").html(answer["smster"]);
    $("#eddatantry").val(answer["dataentryaccess"]);
    $("#eddatantry").html(answer["dataentryaccess"]);
    $("#idi").val(answer["id"]);
  }
});
})


$(".photothree").change(function(){
  var image = this.files[0];
  if (image["type"] != "image/jpeg" && image["type"] != "image/png" ) {
    $(".photothree").val("");

            Swal.fire({
            icon: "error",
            title: "image is supposed to be jpeg or png",
            showConfirmButton: true,
            confirmButtonText: "Close"
            });
              
  

  }else if(image["size"] > 2000000){
    $(".photothree").val("");
    Swal.fire({
      icon: "error",
      title: "Error uploading image",
      text: "¡Image too big. It has to be less than 2Mb!",
      showConfirmButton: true,
      confirmButtonText: "Close"
    });

  }else{
    var imgData = new FileReader;
    imgData.readAsDataURL(image);
    $(imgData).on("load", function(event){
    var routeImg = event.target.result;
    $(".previewthree").attr("src", routeImg);
    });
  }
})



$(document).on("click", ".btnedituser", function(){
var tchid = $(this).attr("tchid");
var datas = new FormData();
 datas.append("tchid",tchid);
$.ajax({
  url:"ajax/manageuser.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){
  var grp = new FormData();
  grp.append("brid",answer["departid"]);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: grp,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){
    $("#departname").val(answer["id"]);
    $("#departname").html(answer["name"]);
  
  }
})

    $("#tchidi").val(answer["id"]);
    $("#edtitle").val(answer["title"]);
    $("#edtitle").html(answer["title"]);
    $("#edfirst").val(answer["first"]);
    $("#edsnd").val(answer["secon"]);
    $("#edthird").val(answer["third"]);
    $("#edrole").val(answer["role"]);  
    $("#edrole").html(answer["role"]);  
    $("#edstatus").val(answer["status"]);  
    $("#edstatus").html(answer["status"]);  
    
  }
});
})



 $(document).on("click", ".btnActivate", function(){

  var userId = $(this).attr("userId");
  var userStatus = $(this).attr("userStatus");

  var datum = new FormData();
  datum.append("activateId", userId);
    datum.append("activateUser", userStatus);


    $.ajax({
    url:"ajax/manageuser.ajax.php",
    method: "POST",
    data: datum,
    cache: false,
      contentType: false,
      processData: false,
      success: function(answer){
      console.log("answer",answer);
              }

     })
    if(userStatus == 0){

      $(this).removeClass('btn-success');
      $(this).addClass('btn-danger');
      $(this).html('Deactivated');
      $(this).attr('userStatus',1);

    }else{

      $(this).addClass('btn-success');
      $(this).removeClass('btn-danger');
      $(this).html('Activate');
      $(this).attr('userStatus',0);

    
    }
    
      })

 

 $(document).on("click", ".btnmodule", function(){
    var mdlid = $(this).attr("mdlid");
    Swal.fire({
        title: 'Do you want delete this module',
        text: "if you're not sure you can cancel",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, delete module!'
        }).then(function(result){
        if(result.value){
         window.location = "index.php?route=modules&mdlid="+mdlid;

        }

    })

});

$(document).on("click", ".btneditmodule", function(){
var mdlid = $(this).attr("mdlid");
var datas = new FormData();
 datas.append("mdlid",mdlid);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#eidiii").val(answer["id"]);
    $("#editname").val(answer["name"]);
    $("#editcode").val(answer["code"]);
    $("#edithrs").val(answer["hrs"]);
    $("#editmin").val(answer["min"]);
      
  }
});
})


$(document).on("click", ".btneditcoarse", function(){
var mdlid = $(this).attr("mdlid");
var datas = new FormData();
 datas.append("coaresid",mdlid);
$.ajax({
  url:"ajax/managedepart.ajax.php",
  method:"POST",
  data: datas,
  cache: false,
  contentType: false,
  processData: false,
  dataType:"json",
  success:function(answer){

    $("#eidi").val(answer["id"]);
    $("#editneim").val(answer["name"]);
    $("#editinti").val(answer["intial"]);
      
  }
});
})
