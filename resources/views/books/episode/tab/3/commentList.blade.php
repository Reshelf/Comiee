 @foreach ($comments as $comment)
     <div class="mb-2 pt-2 px-2 pb-2 ml-[56px]">
         @include('books.episode.tab.3.comment')
     </div>

     <div class="mb-2 pt-2 px-2 pb-2 ml-[56px]">
         @include('books.episode.tab.3.commentList', ['comments' => $comment->replies])
     </div>
 @endforeach
