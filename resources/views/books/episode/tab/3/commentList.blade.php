 {{-- コメント --}}
 @empty($comment->parent_id)
     <div id="comment-episode-{{ $episode->number }}" class="mb-2 pt-2 px-2 pb-2">
         @include('books.episode.tab.3.comment')
     </div>
 @endempty

 {{-- リプライ --}}
 @empty(!$comment->parent_id)
     <div id="comment-episode-{{ $episode->number }}" class="mb-2 pt-2 px-2 pb-2 ml-8">
         @include('books.episode.tab.3.comment')
     </div>
 @endempty
