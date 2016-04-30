$(function() {
    var base_url = 'http://localhost/horse/';

    $('#search-box').keyup(function() {
        if($(this).val().length>2) {
            $('.helper').html('');
            var search = $('#search-box').val();

            $.ajax({
                url: base_url + 'profile/search/',
                type: 'POST',
                data: {'search': search},
                dataType: 'json',
                success: function (data) {
                    console.log(data);
                    if (typeof data.error == 'undefined') {
                        var user = '';
                        for(var i=0;i<data.length;i++) {
                            user += '<div class="searched-user">';
                            user += '<a href="'+base_url+'profile/user/'+data[i].profile_name+'">';
                            user += '<img src="'+base_url+data[i].user_image+'" width="50" height="50" class="img-circle pull-left">';
                            user += '<h5 class="text-info">'+data[i].first_name+' '+data[i].last_name+'</h5>';

                            user += '<div class="clearfix"></div>';
                            user += '</a>';
                            user += '</div>';
                        }
                        $('#results').html(user);
                    } else {
                        $('#results').html('<div class="alert alert-danger"><b><i class="fa fa-exclamation-triangle"></i></b> ' + data.error + '</div>');
                    }
                },
                error: function (xhr) {
                    $('#results').html('<div class="alert alert-danger"><b><i class="fa fa-exclamation-triangle"></i> </b>There was an error with the search, try again');
                },
                beforeSend: function() {
                    $('#results').html('<i class="fa fa-spinner fa-spin"></i> Searching User...');
                },
            });

        } else {
            $('.helper').html('At least three characters required');
        }
    });

});