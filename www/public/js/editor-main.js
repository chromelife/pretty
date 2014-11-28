// initializing editors
var titleEditor = new MediumEditor('.title-editable', {
  buttonLabels: 'fontawesome'
});
var bodyEditor = new MediumEditor('.content-editable', {
  buttonLabels: 'fontawesome'
});
$(function () {
  // initializing insert image on body editor
  $('.content-editable').mediumInsert({
    editor: bodyEditor,
    images: false,
    imagesUploadScript: ""
  });
  // deactivate editors on show view
  if ($('#hideEditor').length) {
    $('.content-editable').mediumInsert('disable');
    bodyEditor.deactivate();
    titleEditor.deactivate();
  }
});
// hiding messages
$('.error').hide().empty();
$('.success').hide().empty();

// create post
$('body').on('click', '#form-submit', function(e){
  e.preventDefault();
  var postTitle = titleEditor.serialize();
  var postContent = bodyEditor.serialize();

  $.ajax({
    type: 'POST',
    dataType: 'json',
    url : "http://localhost:8888/posts",
    headers: {
      'X-CSRF-Token' : $('meta[name=_token]').attr('content'),
      'Content-type' : ('application/json')
    },
    data: {
      post_title: postTitle['post-post_title']['value'],
      post_content: postContent['post-post_content']['value']
    },
    success: function(data) {
      if(data.success === false)
        {

          $('.error').append(data.message);
          $('.error').show();

        } else {
          $('.success').append(data.message);
          $('.success').show();

          setTimeout(function() {
            window.location.href = "http://localhost:8888/posts";
          }, 2000);
        }
      },
      error: function(xhr, textStatus, thrownError) {
        // alert('Something went wrong. Please Try again later...');
        console.log(arguments);
      }
    });
    return false;
  });

  // update post
  $('body').on('click', '#form-update', function(e){
    e.preventDefault();
    var postTitle = titleEditor.serialize();
    var postContent = bodyEditor.serialize();

    $.ajax({
      type: 'PUT',
      dataType: 'json',
      url : "{{ URL::action('PostsController@update', array(Request::segment(2))) }}",
      data: { post_title: postTitle['post-post_title']['value'], post_content: postContent['post-post_content']['value'] },
      success: function(data) {
        if(data.success === false)
          {
            $('.error').append(data.message);
            $('.error').show();
          } else {
            $('.success').append(data.message);
            $('.success').show();
            setTimeout(function() {
              window.location.href = "{{ URL::action('PostsController@index') }}";
            }, 2000);
          }
        },
        error: function(xhr, textStatus, thrownError) {
          alert('Something went wrong. Please Try again later...');
        }
      });
      return false;
    });
