<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">

                    @include('emails.atoms.header')

                    <tr>
                        <td style="padding:36px 30px 42px 30px; background:#fff;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 20px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            {{ $mailData['user']->name }}さんが新しいエピソードを投稿しました！</h1>

                                        @empty($mailData['book']->thumbnail)
                                            <img style="width:200px;height:200px;object-fit:cover;"
                                                src="{{ asset('/img/bg.svg') }}" alt="">
                                        @else
                                            <img style="width:200px;height:200px;object-fit:cover;"
                                                src="{{ asset('/img/book/thumbnail/' . $mailData['book']->thumbnail) }}"
                                                alt="">
                                        @endempty

                                        <p>{{ $mailData['book']->title }}</p>
                                        <p>{{ $mailData['episodeNumber'] }}話</p>
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"
                                        style="background:#2473E1;border-radius:3px;box-shadow:0 10px 20px -10px rgba(#2473E1,0.5);">
                                        <a href="http://localhost/"
                                            style="padding:20px 0;display:block;color:#fff;text-decoration:none;width:100%;height:100%;">
                                            {{ $mailData['episodeNumber'] }}話を読む
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                    @include('emails.atoms.footer')
                </table>
            </td>
        </tr>
    </table>
</body>
