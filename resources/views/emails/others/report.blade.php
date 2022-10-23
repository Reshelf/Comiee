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
                                        <h2 style="font-size:18px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            {{ $reports['user'] }}さんから通報がありました！</h2>
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            {!! nl2br($reports['body']) !!}
                                        </p>

                                        <h2 style="font-size:18px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            通報されたユーザー
                                        </h2>
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            {{ $reports['reportedUser'] }}
                                        </p>

                                        <h2 style="font-size:18px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            通報されたコメント
                                        </h2>
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            {!! nl2br($reports['comment']) !!}
                                        </p>
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
