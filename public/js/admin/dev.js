$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn_courseModal').click(function() {
        $('.modal-title').text('New Course');
        $('.btn_create').text('Create');
        $('#courseModal').modal('show');
        $('#course_form')[0].reset();
    })
    
    var update_id;

    $(document).on('click','.edit_course',function(e){
        var $id = $(this).attr('id');
        $.ajax({
            url:'/admin/course/' + $id,
            type: 'GET',
            success: function(data) {     
                $('.modal-title').text('Edit Course');
                $('.ccode').val(data.course_code);
                $('.cdesc').val(data.course_description);
                $('.btn_create').text('Update');
                $('#courseModal').modal('show');
                update_id = $id;
            }
        })
    })
    
    $('#course_form').submit(function(e) {
        e.preventDefault()
        if($('.btn_create').text() == 'Create'){
            $.ajax({
                url: '/admin/course',
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'JSON',
                data: new FormData(this),
                beforeSend: function(){
                    $(".btn_create").addClass('d-none');
                    $(".btn_loading").removeClass('d-none');
                },
                success:function(data){
                    $('#courseModal').modal('hide');
                    $('#course_form')[0].reset();
                    toastr.success(data)
                    setTimeout(function(){
                        location.reload()
                    },2000)
                    console.log(data)
                }
            })
            .fail(function(data){
                $(".btn_loading").addClass('d-none');
                $(".btn_create").removeClass('d-none');
                let errors = data.responseJSON.errors;
                if(errors){
                  $.each(errors,function(key,value){
                    var elem = $('.' + key);
                    elem.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
                    elem.html("<div class='text-danger' role='alert'>"+value+"</div>");
                  });
                }
            })
        }else {    
            var ccode = $('.ccode').val();
            var cdesc = $('.cdesc').val();
           
            $.ajax({
                url: '/admin/course/'+ update_id,
                type: 'PUT',
                data: { ccode:ccode, cdesc:cdesc },
                beforeSend: function(){
                    $(".btn_create").addClass('d-none');
                    $(".btn_loading").removeClass('d-none');
                },
                success:function(data){
                    $('#courseModal').modal('hide');
                    $('#course_form')[0].reset();
                    toastr.success(data)
                    setTimeout(function(){
                        location.reload()
                    },2000)
                    console.log(data)
                }
            })
            .fail(function(data){
                $(".btn_loading").addClass('d-none');
                $(".btn_create").removeClass('d-none');
                let errors = data.responseJSON.errors;
                if(errors){
                  $.each(errors,function(key,value){
                    var elem = $('.' + key);
                    elem.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
                    elem.html("<div class='text-danger' role='alert'>"+value+"</div>");
                  });
                }
            })
        }
    })

    var delete_id;
    $(document).on('click', '.del_course', function(e) {
        delete_id = $(this).attr('id');
        $('.modal-title').text('Confirmation')
        $('#confirmModal').modal('show');
    })

    $('.btn_delete').click(function() {
        $.ajax({
            url:'/admin/course/' + delete_id,
            type: 'DELETE',
            beforeSend: function(){
                $('.btn_delete').addClass('d-none')
                $('.delete_loading').removeClass('d-none')
            },
            success: function(data) {
                $('.btn_delete').removeClass('d-none')
                $('.delete_loading').addClass('d-none')
                $('#confirmModal').modal('hide')
                toastr.success(data)
                setTimeout(function(){
                    location.reload()
                },1000)
            }
        })
    })

    //subject
    $('.btn_subjectModal').click(function() {
        $('.modal-title').text('New Subject');
        $('.sub_create').text('Create');
        $('#subjectModal').modal('show');
        $('#subject_form')[0].reset();
    })

    var update_sub;

    $(document).on('click','.edit_subject',function(e){
        var $id = $(this).attr('id');
        $.ajax({
            url:'/admin/subject/' + $id,
            type: 'GET',
            success: function(data) {     
                $('.modal-title').text('Edit Subject');
                $('.scode').val(data.subject_code);
                $('.sdesc').val(data.subject_description);
                $('.sub_create').text('Update');
                $('#subjectModal').modal('show');
                update_sub = $id;
            }
        })
    })
    $('#subject_form').submit(function(e) {
        e.preventDefault()
        if($('.sub_create').text() == 'Create'){
            $.ajax({
                url: '/admin/subject',
                type: 'POST',
                processData: false,
                contentType: false,
                dataType: 'JSON',
                data: new FormData(this),
                beforeSend: function(){
                    $(".sub_create").addClass('d-none');
                    $(".sub_loading").removeClass('d-none');
                },
                success:function(data){
                    $('#subjectModal').modal('hide');
                    $('#subject_form')[0].reset();
                    toastr.success(data)
                    setTimeout(function(){
                        location.reload()
                    },2000)
                    console.log(data)
                }
            })
            .fail(function(data){
                $(".sub_loading").addClass('d-none');
                $(".sub_create").removeClass('d-none');
                let errors = data.responseJSON.errors;
                if(errors){
                  $.each(errors,function(key,value){
                    var elem = $('.' + key);
                    elem.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
                    elem.html("<div class='text-danger' role='alert'>"+value+"</div>");
                  });
                }
            })
        }else {    
            var scode = $('.scode').val();
            var sdesc = $('.sdesc').val();
           
            $.ajax({
                url: '/admin/subject/'+ update_sub,
                type: 'PUT',
                data: { scode:scode, sdesc:sdesc },
                beforeSend: function(){
                    $(".sub_create").addClass('d-none');
                    $(".sub_loading").removeClass('d-none');
                },
                success:function(data){
                    $('#subjectModal').modal('hide');
                    $('#subject_form')[0].reset();
                    toastr.success(data)
                    setTimeout(function(){
                        location.reload()
                    },2000)
                    console.log(data)
                }
            })
            .fail(function(data){
                $(".sub_loading").addClass('d-none');
                $(".sub_create").removeClass('d-none');
                let errors = data.responseJSON.errors;
                if(errors){
                  $.each(errors,function(key,value){
                    var elem = $('.' + key);
                    elem.closest('div.form-group')
                    .removeClass('has-error')
                    .addClass(value.length > 0 ? 'has-error' : 'has-success')
                    .find('.text-danger').remove();
                    $("input[name='"+key+"']").addClass(value.length > 0 ? 'border border-danger' : 'border border-success')
                    elem.html("<div class='text-danger' role='alert'>"+value+"</div>");
                  });
                }
            })
        }
    })

    var delete_sub;
    $(document).on('click', '.del_subject', function(e) {
        delete_sub = $(this).attr('id');
        $('.modal-title').text('Confirmation')
        $('#confirmModal').modal('show');
    })

    $('.sub_delete').click(function() {
        $.ajax({
            url:'/admin/subject/' + delete_sub,
            type: 'DELETE',
            beforeSend: function(){
                $('.sub_delete').addClass('d-none')
                $('.subd_loading').removeClass('d-none')
            },
            success: function(data) {
                $('.sub_delete').removeClass('d-none')
                $('.subd_loading').addClass('d-none')
                $('#confirmModal').modal('hide')
                toastr.success(data)
                setTimeout(function(){
                    location.reload()
                },1000)
            }
        })
    })

    $('.textarea').summernote();

    $('.post').click(function() {
        $(this).addClass('dnone');
        $('.cpost').removeClass('dnone');
    })

    $('.hide-cpost').click(function() {
        $('.post').removeClass('dnone');
        $('.cpost').addClass('dnone');
    })

    $('.btn_meetingModal').click(function(e) {
        $('#meeting_form')[0].reset()
        $('.modal-title').text('Create Meeting')
        $('#meetingModal').modal('show')
    })

    var meeting_table = $('#meeting_table').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

    $('#meeting_form').submit(function(e) {
        e.preventDefault()
        var start_time = $('#start_time').val()
        var topic = $('#topic').val()
        var agenda = $('#agenda').val()
        $.ajax({
            url: '/admin/meeting',
            type: 'POST',
            cache: false,
            data: {
                start_time:start_time,topic:topic,agenda:agenda
            },
            success:function(data) {
                console.log(data);
                $('#meetingModal').modal('hide')
                toastr.success('Meeting Save!')
                setTimeout(function(){
                    location.reload()
                },2000)
            },
            error:function(data) {

            }
        })
    })

    $(document).on('click', '.delete-meeting', function() {
        var id = $(this).attr('id')
        $.ajax({
            url: '/admin/delete/meeting/'+ id,
            type: 'GET',
            cache: false,
            success:function(data) {
                console.log(data)
                toastr.success('Meeting Deleted!')
                setTimeout(function(){
                    location.reload()
                },2000)
            }
        })
    })
   ;
    $(document).on('click', '.edit-meeting', function() {
        var id = $(this).attr('id')
        $.ajax({
            url: '/admin/edit/meeting/'+ id,
            type: 'GET',
            cache: false,
            success:function(data) {
                
                console.log(data)
                $('.modal-title').text('Edit Meeting')
                var start_time = new Date(new Date(data.data.start_time).toString().split('GMT')[0]+' UTC').toISOString().split('.')[0]
                $('#start_time').val(start_time)
                $('#topic').val(data.data.topic)
                $('#agenda').val(data.data.agenda)
                $('#meetingModal').modal('show')
            }
        })
    })

    //load_meeting()

    function load_meeting() {
        $.ajax({
            url: '/admin/list',
            type:'GET',
            cache:false,
            success:function(data) {
                $.each(data, function(i, v) {
                    var content = ''
                    $.each(v.meetings, function(key, val) {
                        
                        content += '<tr>'
                        content += '<td>'+val.id+'</td>'
                        content += '<td>'+val.topic+'</td>'
                        content += '<td>'+val.agenda+'</td>'
                        content += '<td>'+val.timezone+'</td>'
                        content += '<td>'+val.start_time+'</td>'
                        content += '<td>'+val.created_at+'</td>'
                        content += '</tr>'
                    }) 
                    $("#meeting_content").append(content)
                })
            },
            error:function(data) {
               
                
            }
        })
    }
});
