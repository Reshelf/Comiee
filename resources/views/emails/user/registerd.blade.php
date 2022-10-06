<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">

                    @include('emails._patials.header')

                    <tr>
                        <td style="padding:36px 30px 42px 30px; background:#fff;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 20px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            Welcome to Starbooks!</h1>
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            {{ $name }}さん ようこそ！<br><br>
                                            Starbooksは漫画のグローバルプラットフォームです。<br>
                                            読者として新しい漫画と出会い、作者として漫画を投稿することができます。<br>
                                            作品との新しい出会いとあなたの作品を世界に届けるプラットフォームとしてStarbooksをご利用ください！<br><br>
                                            それではプラットフォームでお会いしましょう！
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="center"
                                        style="background:#2473E1;border-radius:3px;box-shadow:0 10px 20px -10px rgba(#2473E1,0.5);">
                                        <a href="http://localhost/"
                                            style="padding:20px 0;display:block;color:#fff;text-decoration:none;width:100%;height:100%;">
                                            プラットフォームに移動する
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>


                    @include('emails._patials.footer')
                </table>
            </td>
        </tr>
    </table>
</body>
