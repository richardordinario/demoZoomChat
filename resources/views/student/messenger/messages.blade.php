@if($messages->isNotEmpty())
<div class="" style="height:560px;overflow:auto">
    @foreach($messages as $message)
    <div class="direct-chat-msg {{$messages->from == Auth::user()->id ? 'right' : ''}}">
        <div class="direct-chat-infos clearfix">
            <span class="direct-chat-name float-left">{{$message->to}}</span>
            <span class="direct-chat-timestamp float-right">{{$message->created_at->diffForHuman()}}</span>
        </div>
        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="">
        <div class="direct-chat-text">
            {{$message->message}}
        </div>
    </div>
    @endforeach
</div>
<form action="#" method="post">
    <div class="input-group mt-3">
        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
        <span class="input-group-append">
            <button type="button" class="btn btn-info">Send</button>
        </span>
    </div>
</form>
@endif