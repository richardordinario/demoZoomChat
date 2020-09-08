$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var id = '';
    var my_id = $('.my_id').attr('id');
    
    $('.clicked_user').click(function() {
        $('.clicked_user').removeClass('active-clicked');
        $(this).addClass('active-clicked');
        $(this).find('.pending').remove();
        id = $(this).attr('id');
        loadMessages(id);
    })

    function loadMessages(id) {
        $.ajax({
            url: '/get-message/'+ id,
            type: 'GET',
            cache: false,
            success:function(data)
            {
                $('#messages').html(data.data);
                scrollToBottom();
            }
        })
    }

    Pusher.logToConsole = false;

    var pusher = new Pusher('b16ba45013da47f593a8', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('message-channel');
    channel.bind('message-event', function(data) {
        $('#pop_chat').play();
      if(my_id == data.from) {
      
      }else if (my_id == data.to) {
        if(id == data.from) {
            $('#' + data.from).click();
        }else {
            var pending = parseInt($('#' + data.from).find('.pending').html());
            
            if(pending)
            {
                $('#' + data.from).find('.pending').html(pending+1);
            }
            else
            {
                $('#' + data.from).append('<span class="badge badge-danger pending float-right">1</span>');
            }
        }
      }
    });
   

    $(document).on('keyup','.input-message', function(e) {
        e.preventDefault();
        var message = $(this).val();
        if(e.keyCode == 13 && message != '')
        {
            $.ajax({
                url: '/message',
                type: 'POST',
                cache: false,
                data: { id:id,message:message },
                success:function(data) 
                {
                    loadMessages(id)
                },
                error:function(data)
                {
                    console.log(data)
                },
                complete:function(data)
                {
                    scrollToBottom();
                }
            })
        }
    })

    function scrollToBottom()
    {
        $('.message-wrapper').animate({
            scrollTop: $('.message-wrapper').get(0).scrollHeight
        }, 50)
    }
 
});