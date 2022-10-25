 {{-- コメント --}}
 @empty($comment->parent_id)
     <div id="comment-episode-{{ $episode->number }}" class="mb-2 pt-2 px-2 pb-2">
         <div class="flex items-center justify-between">
             <div class="flex items-center">
                 <a href="{{ route('users.show', ['username' => $comment->user->username]) }}" class="flex items-center">
                     @empty($comment->user->avatar)
                         <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden h-8 w-8 rounded-full">
                         <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                             class="hidden dark:block h-8 w-8 rounded-full">
                     @else
                         <img src="{{ asset('/img/users/avatar/' . $comment->user->avatar) }}" alt=""
                             class="h-8 w-8 rounded-full">
                     @endempty
                     <div class="flex flex-col ml-2">
                         <div class="flex items-center">
                             <span>{{ $comment->user->name }}</span>
                             @if ($book->user->id === $comment->user->id)
                                 <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none">
                                     <path
                                         d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                                         class="fill-primary" />
                                 </svg>
                             @endif
                         </div>

                         <span class="text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                     </div>
                 </a>
             </div>

             <div class="flex items-center">
                 {{-- 通報 --}}
                 @if ($book->user->id !== $comment->user->id)
                     <comment-post-modal>
                         <template #trigger>
                             <span class="text-666 leading-4 pr-4">通報する</span>
                         </template>
                         <template #header>コメントに対して通報する</template>
                         <form method="POST"
                             action="{{ route('others.report', ['user' => Auth::user(), 'reportedUser' => $comment->user->email, 'comment' => $comment->comment]) }}">
                             @csrf
                             <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                             <textarea class="dark:bg-dark-1 w-full h-[250px] rounded-[3px]" placeholder="お問い合せ内容を記入してください。" autocomplete="off"
                                 autofocus="on" type="text" name="body" maxlength="400" required></textarea>
                             <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                                 class="btn w-full">送信する</button>
                         </form>
                     </comment-post-modal>
                 @endif

                 <comment-post-modal>
                     <template #trigger>
                         <span class="text-666 leading-4">返信する</span>
                     </template>
                     <template #header>{{ $comment->user->username }}さんに返信する</template>
                     <form method="POST"
                         action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_number' => $episode->number, 'parent_id' => $comment->id]) }}">
                         @csrf
                         <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                         <textarea class="w-full h-[250px] rounded-[3px]"
                             placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                             autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                         <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                             class="btn w-full">返信する</button>
                     </form>
                 </comment-post-modal>
                 @if ($comment->user->id == Auth::id())
                     <form method="POST"
                         action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode->id, 'comment_id' => $comment->id]) }}"
                         class="text-xs text-666 ml-2 leading-4">
                         @csrf
                         @method('DELETE')
                         <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                             class="leading-4">削除する</button>
                     </form>
                 @endif
             </div>
         </div>
         <div class="px-4 pt-4 text-666">{!! nl2br($comment->comment) !!}</div>
     </div>
 @endempty

 {{-- リプライ --}}
 @empty(!$comment->parent_id)
     <div id="comment-episode-{{ $episode->number }}" class="mb-2 pt-2 px-2 pb-2 ml-8">
         <div class="flex items-center justify-between">
             <div class="flex items-center">
                 <a href="{{ route('users.show', ['username' => $comment->user->username]) }}" class="flex items-center">
                     @empty($comment->user->avatar)
                         <img src="{{ asset('/img/bg.svg') }}" alt="" class="block dark:hidden h-8 w-8 rounded-full">
                         <img src="{{ asset('/img/bg-dark.svg') }}" alt=""
                             class="hidden dark:block h-8 w-8 rounded-full">
                     @else
                         <img src="{{ asset('/img/users/avatar/' . $comment->user->avatar) }}" alt=""
                             class="h-8 w-8 rounded-full">
                     @endempty
                     <div class="flex flex-col ml-2">
                         <div class="flex items-center">
                             <span>{{ $comment->user->name }}</span>
                             @if ($book->user->id === $comment->user->id)
                                 <svg class="ml-1 w-[14px] h-[14px]" viewBox="0 0 24 24" fill="none">
                                     <path
                                         d="M12 2C6.49 2 2 6.49 2 12C2 17.51 6.49 22 12 22C17.51 22 22 17.51 22 12C22 6.49 17.51 2 12 2ZM16.78 9.7L11.11 15.37C10.97 15.51 10.78 15.59 10.58 15.59C10.38 15.59 10.19 15.51 10.05 15.37L7.22 12.54C6.93 12.25 6.93 11.77 7.22 11.48C7.51 11.19 7.99 11.19 8.28 11.48L10.58 13.78L15.72 8.64C16.01 8.35 16.49 8.35 16.78 8.64C17.07 8.93 17.07 9.4 16.78 9.7Z"
                                         class="fill-primary" />
                                 </svg>
                             @endif
                         </div>

                         <span
                             class="text-xs text-666 dark:text-ddd">{{ $comment->created_at->format('Y/m/d H:i') }}</span>
                     </div>
                 </a>
             </div>

             <div class="flex items-center">
                 <comment-post-modal>
                     <template #trigger>
                         <span class="text-666 leading-4">返信する</span>
                     </template>
                     <template #header>{{ $comment->user->username }}さんに返信する</template>
                     <form method="POST"
                         action="{{ route('book.episode.comment.store', ['book_id' => $book->id, 'episode_number' => $episode->number, 'parent_id' => $comment->id]) }}">
                         @csrf
                         <input value="{{ Auth::id() }}" type="hidden" name="user_id" />
                         <textarea class="w-full h-[250px] rounded-[3px]"
                             placeholder="ここはエピソードへの応援コメントを投稿できる場所です！&#10;&#10;作品内容と関係がないコメント、作品や作家を中傷するようなコメント、ネタバレやその他不適切なコメントは投稿しないでね！&#10;&#10;不適切なコメントを見つけた場合は通報をお願いいたします！&#10;&#10;ひどい場合は、断りなくコメントの削除やアカウントを凍結させていただく場合があります。"
                             autocomplete="off" autofocus="on" type="text" name="comment" maxlength="400" required></textarea>
                         <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                             class="btn w-full">返信する</button>
                     </form>
                 </comment-post-modal>
                 @if ($comment->user->id == Auth::id())
                     <form method="POST"
                         action="{{ route('book.episode.comment.destroy', ['book_id' => $book->id, 'episode_id' => $episode->id, 'comment_id' => $comment->id]) }}"
                         class="text-xs text-666 ml-2 leading-4">
                         @csrf
                         @method('DELETE')
                         <button onclick="this.disabled='disabled'; this.form.submit();" type="submit"
                             class="leading-4">削除する</button>
                     </form>
                 @endif
             </div>
         </div>
         <div class="px-4 pt-4 text-666">{!! nl2br($comment->comment) !!}</div>
     </div>
 @endempty
