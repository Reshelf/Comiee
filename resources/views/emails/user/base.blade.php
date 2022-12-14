<table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
  <tbody>
    <tr>
      <td align="center">
        <table border="0" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse">
          <tbody>
            <tr>
              <td width="1280" align="center">
                <div style="max-width:640px;margin:0 auto" dir="ltr" bgcolor="#ffffff">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center"
                    style="border-collapse:collapse;max-width:640px;margin:0 auto">
                    <tbody>
                      <tr>
                        <td
                          style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
                          <table border="0" width="100%" cellspacing="0" cellpadding="0"
                            style="border-collapse:collapse">
                            <tbody>
                              <tr>
                                <td height="20" style="line-height:20px" colspan="3"></td>
                              </tr>


                              {{-- アイコン --}}
                              <tr>
                                <td>
                                  <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                    style="border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td height="15" style="line-height:15px" colspan="3"></td>
                                      </tr>
                                      <tr>
                                        <td width="32" align="left" valign="middle"
                                          style="height:32;line-height:0px">
                                          <a href="{{ config('app.stripe_url') }}"
                                            style="color:#1b74e4;text-decoration:none" target="_blank">
                                            {{-- アイコン --}}
                                            <embed width="32" src="https://onl.bz/Wzxv4Uq" alt="">
                                          </a>
                                        </td>
                                      </tr>
                                      <tr style="border-bottom:solid 1px #e5e5e5">
                                        <td height="15" style="line-height:15px" colspan="3"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>


                              {{-- 内容 --}}
                              <tr>
                                <td>
                                  <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                    style="border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td height="28" style="line-height:28px">
                                        </td>
                                      </tr>

                                      @yield('email-content')

                                      <tr>
                                        <td height="28" style="line-height:28px"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>


                              {{-- マイページへ or トップページへ --}}
                              <tr>
                                <td>
                                  <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                    style="border-collapse:collapse">
                                    <tbody>
                                      <tr>
                                        <td height="2" style="line-height:2px" colspan="3"></td>
                                      </tr>
                                      <tr>
                                        <td>
                                          <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                            style="border-collapse:collapse">
                                            <tbody>
                                              <tr>
                                                <td
                                                  style="border-collapse:collapse;border-radius:6px;text-align:center;display:block;background:#e4e6eb;padding:8px 16px 10px 16px">
                                                  @isset($mailData['received_user'])
                                                    <a href="{{ config('app.stripe_url') . '/' . app()->getLocale() . '/' . $mailData['received_user']->username }}"
                                                      style="color:#1b74e4;text-decoration:none;display:block"
                                                      target="_blank">
                                                      <center>
                                                        <font size="3">
                                                          <span
                                                            style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#050505;font-size:17px;font-weight:500;font-family:Roboto-Medium,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:14px">マイページへ</span>
                                                        </font>
                                                      </center>
                                                    </a>
                                                  @else
                                                    <a href="{{ config('app.stripe_url') }}"
                                                      style="color:#1b74e4;text-decoration:none;display:block"
                                                      target="_blank">
                                                      <center>
                                                        <font size="3">
                                                          <span
                                                            style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#050505;font-size:17px;font-weight:500;font-family:Roboto-Medium,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:14px">トップページへ</span>
                                                        </font>
                                                      </center>
                                                    </a>
                                                  @endisset

                                                </td>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                        <td width="100%">
                                        </td>
                                      </tr>
                                      <tr>
                                        <td height="32" style="line-height:32px" colspan="3"></td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </td>
                              </tr>


                              {{-- 配信停止 --}}

                              <tr>
                                <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                  style="border-collapse:collapse">
                                  <tbody>
                                    <tr style="border-top:solid 1px #e5e5e5">
                                      <td height="19" style="line-height:19px"></td>
                                    </tr>
                                    <tr>
                                      <td
                                        style="font-family:Roboto-Regular,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#8a8d91;line-height:16px;font-weight:400;">

                                        @isset($mailData['received_user'])
                                          このメッセージは
                                          <a href="mailto:{{ $mailData['received_user']->email }}"
                                            style="color:#1b74e4;text-decoration:none" target="_blank">
                                            {{ $mailData['received_user']->email }}
                                          </a>に送信されたものです。
                                          今後Starbooksからこのようなメールを受信したくない場合は、設定の"メール通知"から
                                          <a href="{{ config('app.stripe_url') . '/' . app()->getLocale() . '/' . $mailData['received_user']->username . '/settings' }}"
                                            style="color:#1b74e4;text-decoration:none" target="_blank">
                                            配信を停止
                                          </a>してください。<br>
                                        @endisset

                                        <span
                                          style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823;font-family:Roboto-Regular,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#8a8d91;line-height:16px;font-weight:400">
                                          アカウントを保護するため、このメールを転送しないでください。<br>
                                          Starbooks, LLC.
                                        </span>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td height="20" style="line-height:20px" colspan="3"></td>
                                    </tr>
                                  </tbody>
                                </table>
                              </tr>



                            </tbody>
                          </table>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </td>
    </tr>
  </tbody>
</table>
