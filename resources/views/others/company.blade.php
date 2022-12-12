@extends('app')

@section('title', '会社概要（運営会社）')

@section('content')
    @include('atoms._nav', ['tab' => 0])

    <div class="max-w-4xl mx-8 lg:mx-auto mt-12 mb-32 tracking-widest">
        <h2 class="text-xl font-semibold mb-8">Company Info</h2>
        <div class="">
            <div class="flex items-center mb-8">
                <div class="w-1/2 md:w-32 text-xs font-semibold">会社名</div>
                <div class="w-1/2 md:w-auto text-base">Reshelf合同会社</div>
            </div>
            <div class="flex items-center mb-8">
                <div class="w-1/2 md:w-32 text-xs font-semibold">設立</div>
                <div class="w-1/2 md:w-auto text-base">2021年06月23日</div>
            </div>
            <div class="flex items-center mb-8">
                <div class="w-1/2 md:w-32 text-xs font-semibold">事業内容</div>
                <div class="w-1/2 md:w-auto text-base">マンガ投稿アプリ「Starbooks」の企画・開発・運用</div>
            </div>
            <div class="flex items-center mb-8">
                <div class="w-1/2 md:w-32 text-xs font-semibold">代表者</div>
                <div class="w-1/2 md:w-auto text-base">田中 俊一朗</div>
            </div>
            <div class="flex items-start">
                <div class="w-1/2 md:w-32 text-xs font-semibold">所在地</div>
                <div class="w-1/2 md:w-auto text-base">
                    〒107-0062<br>
                    東京都港区南青山２丁目２番１５号<br>
                    WIN青山531
                </div>
            </div>
        </div>
    </div>

    @include('atoms._footer')
@endsection
