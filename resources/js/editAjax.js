$(document).ready(function () {
    
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    

    //Save data into database
    $('body').on('click', '#submit', function (event) {
        event.preventDefault()
        var id = $("#post_id").val();
        var title = $("#post-title").val();
        var text = $("#post-text").innerHTML();
       
        $.ajax({
          url: 'post/update',
          type: "POST",
          data: {
            id: id,
            title: title,
            text: text
          },
          dataType: 'json',
          success: function (data) {
              
              $('#postdata').trigger("reset");
              $('#modal-id').modal('hide');
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                timer: 1500
              })
              
          },
          error: function (data) {
              console.log('Error......');
          }
      });
    });
    
    //Edit modal window
    $('body').on('click', '#editPost', function (event) {
    
        event.preventDefault();
        var id = $(this).data('id');
       
        $.get('post/'+ id+'/edit', function (data) {
             
             $('#userCrudModal').html("Edit Post");
             $('#submit').val("Update Post");
             $('#modal-id').modal('show');
             $('#post_id').val(data.data.id);
             $('#post-title').val(data.data.title);
             $('#post-text').innerHTML(data.data.text);
         })
    });
});