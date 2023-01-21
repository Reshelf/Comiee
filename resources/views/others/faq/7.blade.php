@extends('app')

@section('title', 'その他 - 作者の方からよくあるご質問')

@section('description')
  <meta name="description" itemprop="description" content="ご利用ガイドのその他についてのページです。">
  <meta property="og:description" content="ご利用ガイドのその他についてのページです。">
  <meta name="twitter:description" content="ご利用ガイドのその他についてのページです。">
@endsection

@php
  $faqs = [
      [
          'title' => __('他の作者との合作はできますか？'),
          'description' => __('できます。ただし、著作権の帰属や収益の配分については、当事者間で決めていただく必要があります。また、万一トラブルが起きても、Comieeは責任を負いかねます。'),
      ],
      [
          'title' => __('自分の作品が通報された場合、どうなりますか？'),
          'description' => __('著作権法に違反していた場合、公開停止になる可能性があります。'),
      ],
      [
          'title' => __('他のユーザーに自分の作品を模倣されています。'),
          'description' => __('「お問い合わせ」画面から通報をお願いします。'),
      ],
      [
          'title' => __('自分の作品に、利用規約に違反していると思われるコメントが書き込まれました'),
          'description' => __('コメント横の「通報」から通報をお願いします。'),
      ],
      [
          'title' => __('他の出版誌やメディアで連載/掲載している作品を投稿することはできますか？'),
          'description' => __('作品が他者の権利を侵害するものでない限り、投稿していただくことに問題はありません。ただし、他の出版誌やメディア、賞での規約については関知しませんので、違反のないことをご確認のうえ投稿してください。'),
      ],
  ];
@endphp

@include('others.faq.atoms.faq_contents', ['title' => __('その他')])
