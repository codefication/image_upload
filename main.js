$(document.body).ready(function(){

  $("#drop-area").on('dragenter', function (e){
    e.preventDefault();
  });

  $("#drop-area").on('dragover', function (e){
    e.preventDefault();
  });

  $("#drop-area").on('drop', function (e){
    e.preventDefault();
    var image = e.originalEvent.dataTransfer.files;
    createFormData(image);
  });

  $("#btnupload").click(function(){
    $("#image").trigger("click");
  });

  $("#image").change(function(){
    var postData = new FormData($("#frmupload")[0]);
    uploadFormData(postData);
  });

  $(".fa-trash").click(function(){
    var id = $(this).parents('.imgCls').find('img').attr('id');
    $.ajax({
      url: 'delete.php',
      data: {id: id},
      type: 'POST',
      datatype : "json",
      success: function(data) {
        console.log(data);
        alert(data);
        window.location.reload();
      }
    });
  });

  $('img.downloadable').each(function(){
    var $this = $(this);
    $this.wrap('<a href="' + $this.attr('src') + '" download />');
  });

  function createFormData(image) {
    var len = image.length;
    var formImage = new FormData();
    if(len === 1){
      formImage.append('image[]', image[0]);
    }else{
      for(var i=0; i<len; i++){
        formImage.append('image[]', image[i]);
      }
    }
    uploadFormData(formImage);
  }
  function uploadFormData(formData) {
    $.ajax({
      url: 'upload.php',
      data: formData,
      type: 'POST',
      datatype : "json",
      processData: false,
      contentType: false,
      cache: false,
      success: function(data) {
        console.log(data);
        alert(data);
        window.location.reload();
      }
    });
  }
});