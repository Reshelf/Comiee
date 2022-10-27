 {{-- コメント --}}
 {{-- @empty($comment->parent_id)
     <div id="comment-episode-{{ $episode->number }}" class="mb-2 pt-2 px-2 pb-2">
         @include('books.episode.tab.3.comment')
     </div>
 @endempty --}}

 @if (count((array) $comments))
     @foreach ($comments as $comment)
         <div class="mb-2 pt-2 px-2 pb-2 ml-[56px]">
             @include('books.episode.tab.3.comment')
         </div>

         <div class="mb-2 pt-2 px-2 pb-2 ml-[56px]">
             @if (count((array) $comment->replies))
                 @include('books.episode.tab.3.commentList', ['comments' => $comment->replies])
             @endif
         </div>
     @endforeach
 @endif
