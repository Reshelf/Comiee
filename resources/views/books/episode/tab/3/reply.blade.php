@foreach ($comment->replies as $reply)
    <div id="comment-episode-{{ $reply->number }}" class="mb-2 pt-2 px-2 pb-2 ml-[56px]">
    </div>
@endforeach
