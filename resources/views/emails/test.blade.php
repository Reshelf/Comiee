<body style="margin:0;padding:0;">
    <table role="presentation" style="width:100%;border-collapse:collapse;border:0;border-spacing:0;background:#ffffff;">
        <tr>
            <td align="center" style="padding:0;">
                <table role="presentation"
                    style="width:602px;border-collapse:collapse;border:1px solid #cccccc;border-spacing:0;text-align:left;">

                    @include('emails._patials.header')

                    <tr>
                        <td style="padding:36px 30px 42px 30px; background:#f8f8f8;">
                            <table role="presentation"
                                style="width:100%;border-collapse:collapse;border:0;border-spacing:0;">
                                <tr>
                                    <td style="padding:0 0 36px 0;color:#153643;">
                                        <h1 style="font-size:24px;margin:0 0 20px 0;font-family:Noto Sans JP;">
                                            {{ $name }}さんの新規登録が完了しました</h1>
                                        <p
                                            style="margin:0 0 12px 0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tempus
                                            adipiscing felis, sit amet blandit ipsum volutpat sed. Morbi porttitor, eget
                                            accumsan et dictum, nisi libero ultricies ipsum, posuere neque at erat.</p>
                                        <p style="margin:0;font-size:16px;line-height:24px;font-family:Noto Sans JP;">
                                            <a href="http://www.example.com"
                                                style="color:#ee4c50;text-decoration:underline;">In tempus felis
                                                blandit</a>
                                        </p>
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
