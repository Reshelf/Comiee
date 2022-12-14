@extends('emails.base')

@section('email-content')
  {{-- タイトル --}}
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;word-break:break-word">
        <tbody>
          <tr>
            <td>
              <span
                style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
                以下のボタンをクリックし、パスワードの再設定を行って下さい。
              </span>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
  <tr>
    <td height="28" style="line-height:28px"></td>
  </tr>

  {{-- 本文 --}}
  <tr>
    <td>
      <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
        <tbody>
          <tr>
            <td
              style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;background:#ffffff;padding:15px;display:block">
              <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center"
                style="border-collapse:collapse;max-width:300px;word-break:break-word">
                <tbody>
                  {{-- パスワードの再設定をする --}}
                  <tr>
                    <td width="100%" align="center">
                      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
                        <tbody>
                          <tr>
                            <td>
                              <table border="0" width="100%" cellspacing="0" cellpadding="0"
                                style="border-collapse:collapse">
                                <tbody>
                                  <tr>
                                    <td
                                      style="border-collapse:collapse;border-radius:6px;text-align:center;display:block;background:#1877f2;padding:8px 16px 10px 16px">
                                      <a href="{{ $restUrl }}"
                                        style="color:#1b74e4;text-decoration:none;display:block" target="_blank">
                                        <center>
                                          <font size="3">
                                            <span
                                              style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-weight:500;font-family:Roboto-Medium,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:14px">
                                              パスワードの再設定をする
                                            </span>
                                          </font>
                                        </center>
                                      </a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
              </table>
            </td>
          </tr>
        </tbody>
      </table>
    </td>
  </tr>
@endsection
