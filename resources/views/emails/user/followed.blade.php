@extends('emails.base')

@section('email-content')
  {{-- タイトル --}}
  <tr>
    <td>
      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;word-break:break-word">
        <tbody>
          <tr>
            <td><span
                style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823"><a
                  style="color:#050505;text-decoration:none;font-family:Roboto-Medium,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:17px;line-height:21px;font-weight:600"
                  target="_blank">
                  {{ $mailData['send_user']->name }}</a> さんからComieeで新しくフォローされました。</span>
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
              style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;background:#ffffff;border:solid 1px #e4e6eb;border-radius:6px;padding:15px;display:block">
              <table border="0" width="100%" cellspacing="0" cellpadding="0" align="center"
                style="border-collapse:collapse;max-width:300px;word-break:break-word">
                <tbody>
                  <tr>
                    <td width="80" align="center">
                      <a href="{{ config('app.top_url') . '/' . app()->getLocale() . '/' . $mailData['send_user']->username }}"
                        style="color:#1b74e4;text-decoration:none" target="_blank">
                        @empty($mailData['send_user']->avatar)
                          <svg width="80" height="80" viewBox="0 0 42 42" fill="none">
                            <rect width="42" height="42" rx="21" fill="#ebebeb" />
                            <path
                              d="M21 21C23.7614 21 26 18.7614 26 16C26 13.2386 23.7614 11 21 11C18.2386 11 16 13.2386 16 16C16 18.7614 18.2386 21 21 21Z"
                              stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M29.5901 31C29.5901 27.13 25.7402 24 21.0002 24C16.2602 24 12.4102 27.13 12.4102 31"
                              stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                          </svg>
                        @else
                          <img width="80" src="{{ $mailData['send_user']->avatar }}" height="80"
                            style="border:solid 1px rgba(0,0,0,.15);background-color:#ebe9e7;border-radius:50%;object-fit:cover"
                            loading="lazy">
                        @endempty
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td height="7" style="line-height:7px"></td>
                  </tr>
                  <tr>
                    <td width="100%" align="center">
                      <a href="{{ config('app.top_url') . '/' . app()->getLocale() . '/' . $mailData['send_user']->username }}"
                        style="color:#141823;text-decoration:none;font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:18px;line-height:21px;font-weight:bold"
                        target="_blank">
                        {{ $mailData['send_user']->name }}
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td height="17" style="line-height:17px"></td>
                  </tr>

                  {{-- プロフィールを確認 --}}
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
                                      <a href="{{ config('app.top_url') . '/' . app()->getLocale() . '/' . $mailData['send_user']->username }}"
                                        style="color:#1b74e4;text-decoration:none;display:block" target="_blank">
                                        <center>
                                          <font size="3">
                                            <span
                                              style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-weight:500;font-family:Roboto-Medium,Roboto,-apple-system,BlinkMacSystemFont,Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:14px">プロフィールを確認</span>
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
