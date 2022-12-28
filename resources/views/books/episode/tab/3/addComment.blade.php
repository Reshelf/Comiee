 @isset($episode)
   <div class="flex justify-between items-center mb-4">
     <h3 class="text-[13px] mr-4 md:mr-0 md:text-lg font-semibold mb-4">{{ __('応援コメント') }}</h3>
     <comment-post-modal>
       <template #btn-trigger>
         <span class="btn-border px-4 text-xs">{{ __('コメントをする') }}</span>
       </template>
       <template #header>{{ __('応援コメントを投稿する') }}</template>
       <form method="POST"
         action="{{ route('book.episode.comment.store', [
             'lang' => app()->getLocale(),
             'book_id' => $book->id,
             'episode_id' => $episode->id,
             'episode_number' => $episode->number,
         ]) }}">
         @csrf
         <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[5px]"
           placeholder="{{ __('ここは作品への応援コメントを投稿できる場所です！') }} &#10;&#10; {{ __('作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！') }}&#10;&#10; {{ __('不適切なコメントを見つけた場合は通報をお願いいたします！') }}&#10;&#10; {{ __('ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。') }}"
           autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>

         <button type="submit" class="btn-primary py-4 w-full">{{ __('投稿する') }}</button>
       </form>
     </comment-post-modal>
   </div>
 @endisset
