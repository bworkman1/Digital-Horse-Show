jQuery(function() {
    var base_url = 'http://localhost/horse/user/';

    var lat = $('#lat').data('lat');
    var lng = $('#lng').data('lng');
    if(lat && lng) {
        var myCenter=new google.maps.LatLng(lat,lng);
        var marker;

        function initialize()
        {
            var mapProp = {
                center:myCenter,
                zoom:13,
                mapTypeId:google.maps.MapTypeId.ROADMAP
            };

            var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

            var marker=new google.maps.Marker({
                position:myCenter,
                animation:google.maps.Animation.DROP
            });

            marker.setMap(map);
        }

        google.maps.event.addDomListener(window, 'load', initialize);
    }

    $('#cancel-comment').click(function(event) {
        event.preventDefault();
        $('#comment-field').val('');
    });

    $('.comments').on('click', '.deleteComment', function() {
        var id = $(this).data('commentid');
        var elem = $(this);
        var url = base_url+'my-uploads/delete-comment/';
        $.ajax(url, {
            data: {
                id: id,
            },
            dataType: 'json',
            type: 'post',
            success: function(data) {
                console.log(data);
                if(typeof data.error == 'undefined') {
                    alertify.success('Your comment added successfully');
                    removeComment(elem);
                } else {
                    alertify.error(data.error);
                }
            },
            error: function(a, b, xhr) {
                alertify.error('Comment failed to delete, try again!');
            },
            beforeSend: function() {
                $(elem).html('<i class="fa fa-gear fa-spin fa-fw"></i> Deleting').attr('disabled', true);
            },
            complete: function() {
                $(elem).html('<i class="fa fa-times"></i> Delete').attr('disabled', false);
            }
        });
    });

    $('#add-comment-form').submit(function(event) {
        event.preventDefault();

        var url = $(this).attr('action');
        var comment = $('#comment-field').val();
        var videoId = $('input[name="video_id"]').val();
        $.ajax(url, {
            data: {
                comment: comment,
                id: videoId,
            },
            dataType: 'json',
            type: 'post',
            success: function(data) {
                console.log(data);
                if(typeof data.error == 'undefined') {
                    alertify.success('Your comment added successfully');
                    addNewComment(data.success);
                    $('#comment-field').val('');
                } else {
                    alertify.error(data.error);
                }
            },
            error: function(a, b, xhr) {
                alertify.error('Comment failed to save, try again!');
            },
            beforeSend: function() {
                $('#add-comment').html('<i class="fa fa-gear fa-spin fa-fw"></i> Sending...').attr('disabled', true);
            },
            complete: function() {
                $('#add-comment').html('Submit').attr('disabled', false);
            }
        });
    });


    function addNewComment(data) {
        var name = $('#name').val();
        var url = $('#url').val();
        var urserImage = $('#user-thumb').attr('src');
        var comment = '<img src="'+urserImage+'" class="img-responsive pull-left comment-img" alt="" width="70" height="70" style="margin: 0 8px -1px 0"><b>'+name+'</b><br><small></small><i class="fa fa-clock-o"></i> '+data.submitted+'</small><br><p>'+data.comment+'<div class="clearfix"></div></p>';

        setCommentCount('add');

        $('.comments').prepend(comment);
        $('.remove-after-comment').remove();
    }

    function setCommentCount(type)
    {
        var count = 1;
        if($('#commentCount').length) {
            count = parseInt($('#commentCount').html());
            if(type=='add') {
                $('#commentCount').html(count+1);
            } else {
                $('#commentCount').html(count-1);
            }
        } else {
            $('.comments').prev().html(count+' Comments');
        }
    }

    function removeComment(elem) {
        setCommentCount('remove');
        $(elem).closest('.comment').remove();
    }

});