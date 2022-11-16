<p>【通報者】</p>
<p style="margin:0 0 12px 0;">
    {{ $reports['user'] }}
</p>
<p>【通報内容】</p>
<p style="margin:0 0 12px 0;">
    {!! nl2br($reports['body']) !!}
</p>
<p>【通報されたユーザー】</p>
<p style="margin:0 0 12px 0;">
    {{ $reports['reportedUser'] }}
</p>
<p>【通報されたコメント内容】</p>
<p style="margin:0 0 12px 0;">
    {!! nl2br($reports['comment']) !!}
</p>
