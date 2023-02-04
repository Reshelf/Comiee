@extends('app')

@section('title', '利用規約')

@section('content')
  @include('atoms._nav', ['tab' => 0])

  <div class="max-w-4xl m-8 md:my-16 md:mx-auto leading-8">
    <h2 class="text-3xl font-semibold">利用規約</h2>
    <div class="mt-8 mb-16 text-[16px]">
      <p class="my-2">このComiee利用規約（以下、「本利用規約」といいます）は、Comiee（以下、「本サービス」といいます）の利用者に適用される、サービス利用のための契約です。</p>
      <p class="my-2">本利用規約は、以下の3つの規約から構成されています。</p>
      <p class="my-2">・本サービスの全ての利用者に適用される「Comiee基本規約」</p>
      <p class="my-2">・本サービスを作者として利用する場合に適用される「Comiee作者規約」</p>
      <p class="my-2">・本サービスを読者として利用する場合に適用される「Comiee読者規約」</p>
      <p class="my-2">本サービスをご利用いただく前に、これらをよくお読み頂き、同意下さいますようお願いします。</p>
      <p class="my-2">
        また、本サービス内には、本利用規約以外に「ヘルプ」や「プライバシーポリシー」等を定め、本サービスの利用方法や注意書きを提示いたします。それらも本利用規約の一部を構成するものとします。本利用規約の内容と、「ヘルプ」その他本利用規約外における本サービスの説明等とが異なる場合は、本利用規約の規定が優先して適用されるものとします。
      </p>
    </div>


    <h2 class="text-3xl font-semibold">Comiee基本規約</h2>

    <h3 class="text-2xl font-semibold my-4">1条 定義</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 本サービス上で運営する各種サービスを利用する者を総称して「ユーザー」といいます。</p>
      <p class="my-2">2. ユーザーのうち、本サービスの会員登録を行わないで本サービスを利用する者を「ゲストユーザー」といいます。</p>
      <p class="my-2">3. ユーザーのうち、本サービスの会員登録(4条)を行なった者を「会員ユーザー」といいます。</p>
      <p class="my-2">4. 会員ユーザーのうち、作品の制作および投稿をし、本サービス上でユーザーに対し購読・閲覧その他の利用をさせる者を「作者」といいます。</p>
      <p class="my-2">5. 会員ユーザーのうち、作者が投稿した作品を閲覧、購入したり、投稿作品に対してコメントやリプライ、イイねやお気に入り登録をする者を「読者」といいます。</p>
      <p class="my-2">6. 作品のうち、閲覧のための利用料金が設定されたものを「有料作品」といいます。</p>
      <p class="my-2">7. 本サービスのスマートフォンやタブレット向けアプリケーションを「アプリ版」といいます。</p>
      <p class="my-2">8. ウェブブラウザ上で動作する本サービスのウェブサイトを「ウェブ版」といいます。</p>
      <p class="my-2">9. 本サービスを運営する団体を「当運営」といいます。</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">2条 規約への同意</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 本サービスの利用と会員登録に当たっては、本利用規約に同意していただく必要があります。本サービスの利用開始または会員登録をすることによって、本利用規約に同意したものとみなされます。
      </p>
      <p class="my-2">2.
        未成年者が本サービスを利用する場合は、親権者など法定代理人の同意を得たうえで利用するものとします。未成年者が本サービスを利用することによって、親権者などの法定代理人の同意を得ているものとみなします。</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">3条 本利用規約の更新</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        本サービスについて、本利用規約の全部又は一部をユーザーに事前に通知することなく変更することがあります。この場合、本サービス上に変更後の利用規約を表示した時点より効力が生じるものとし、ユーザーが本規約の変更の効力が生じた後に本サービスを利用した場合には、変更後の利用規約の全てにつき、同意したものとみなします。
      </p>
    </div>


    <h3 class="text-2xl font-semibold my-4">4条 会員登録</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        ゲストユーザーは、本サービスの会員登録をしてアカウントを作成することで、本サービスで提供する全ての機能を利用することができます。なお、会員登録は任意であり、会員登録しない場合でも、本サービスの一部を利用できます。
      </p>
      <p class="my-2">2.
        会員登録は、本利用規約を遵守することに同意し、本サービス内で指示される手順に従って自身が利用可能なメールアドレスを当運営に送信することにより、登録の申請を行います。その後受信する通知に記載された手続きに従って、本サービスが定めた情報の登録を行うことをもって、会員登録が完了したものとします。
      </p>
      <p class="my-2">3. 会員登録を行う際には、常時受信が可能かつ自身が利用可能なメールアドレスを入力するものとします。</p>
      <p class="my-2">4.
        本サービスは、以下の各号のいずれかに該当する場合は、運営の判断により登録及び再登録を拒否することがあります。すでに登録が完了していた場合にも、本サービスの一部及び全部の利用制限、会員登録の取消しを行う場合があります。また、それによりユーザーまたは第三者が被った損害に関し、当運営は一切の責任を負わず、その理由についても開示義務を負わないものとします。<br>
        ⑴ 提供された登録情報に虚偽、誤記または記載漏れがあった場合<br>
        ⑵ 重複した会員登録があった場合<br>
        ⑶ 本規約に違反する行為がある、または違反したことがあった場合<br>
        ⑷ 反社会的勢力等である、又は、反社会的勢力等と何らかの交流もしくは関与を行っていると当運営が判断した場合<br>
        ⑸ その他、当運営が不適切と判断した場合</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">5条 メールアドレスとパスワード</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 会員ユーザーは、自己の責任で、自身の登録したメールアドレス及びパスワードの管理を行うこととします。</p>
      <p class="my-2">2. 本サービスに関するメールアドレス及びパスワードは、第三者に利用させ、または貸与、譲渡、名義変更、売買等をしてはならないものとします。</p>
      <p class="my-2">3. 会員ユーザーは、登録情報に変更があったときは、本サービスの定める方法により遅滞なく更新手続きを行うものとします。</p>
      <p class="my-2">4. メールアドレスとパスワードを利用して行われた行為、又は、ログイン中のアカウントを利用して行われた行為は、登録を行った者が行ったものとみなします。</p>
      <p class="my-2">5. メールアドレス及びパスワードの管理不十分、使用の過誤、第三者の使用により生じた損害の責任は会員ユーザーが負うものとし、当運営は一切の責任を負いません。</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">6条 取引契約</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 本サービスにおいて作者が有料または無料で作品を販売する際、作者と読者との間において直接契約が成立します。当運営はあくまで作者に作品販売の場を提供する立場にいます。</p>
      <p class="my-2">2.
        当運営は、当該契約について契約の当事者とはならず、当該契約に関する責任は負いません。これにより、当該契約に際し万一トラブルが生じた際には、関係する作者と読者の間で解決していただくことになります。</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">7条 退会</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 会員ユーザーは、所定の方法で当運営に通知することにより、退会（自己の会員ユーザーとしての登録を抹消すること）ができるものとします。</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">8条 プライバシー</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        運営は、本サービスの提供のために、ユーザーの利用目的に応じた必要最小限の情報を取得します。また、ユーザーから取得した個人情報ならびにクッキー（Cookie）、利用履歴及び購入履歴の利用情報などについて、別途定める「プライバシーポリシー」に従って、適法かつ適正に取り扱います。
      </p>
    </div>

    <h3 class="text-2xl font-semibold my-4">9条 禁止事項</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">当運営は、ユーザーが本サービスの利用するにあたり、以下の各号のいずれかに該当する行為を禁止します。</p>
      <p class="my-2">1. 本規約に違反する行為</p>
      <p class="my-2">2. 法令に違反する行為又は犯罪行為に関連する行為</p>
      <p class="my-2">3. 公の秩序又は善良の風俗を害するおそれのある行為</p>
      <p class="my-2">4. ネズミ講を開設し、またはこれを勧誘・運営する行為</p>
      <p class="my-2">5. 作者、当運営又は第三者の権利（著作権、商標権、特許権等の知的財産権、名誉権、プライバシー権、その他法令上又は契約上の権利）を侵害する行為</p>
      <p class="my-2">6. 本サービスで提供する作品の閲覧権及び利用権を、現金、財物その他の経済上の利益と交換する行為</p>
      <p class="my-2">7. 第三者になりすます行為又は意図的に虚偽の情報を流布させる行為</p>
      <p class="my-2">8. 暴力的・残虐的な表現等を行う行為</p>
      <p class="my-2">9. 詐欺または脅迫行為</p>
      <p class="my-2">10. 性行為やわいせつな行為を目的とする行為</p>
      <p class="my-2">11. 人種、国籍、信条、性別、社会的身分、門地等による差別につながる行為</p>
      <p class="my-2">12. 自殺、自傷行為、薬物乱用を誘引又は助長する行為</p>
      <p class="my-2">13. 当運営が許諾しない本サービス上での営利目的の宣伝、広告、勧誘、または営業行為</p>
      <p class="my-2">14. お気に入り数や閲覧回数等を不正に増加させる行為</p>
      <p class="my-2">15. その他、他人に不快感を与える表現をプロフィールに記載したり、投稿もしくは送信する行為</p>
      <p class="my-2">16. 他のユーザーに対する嫌がらせや誹謗中傷を目的とする行為</p>
      <p class="my-2">17. 不特定多数のユーザーに発信する行為等、当運営がスパムと判断する行為</p>
      <p class="my-2">18. 不正アクセス行為の防止等に関する法律に違反する行為、電子計算機損壊等業務妨害罪（刑法第234条の2）に該当する行為をはじめ、当社及び他人のコンピューターに対して不正な操作を行う行為
      </p>
      <p class="my-2">19. その他、当運営が不適切と判断する行為</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">10条 違反に対する処理</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        当運営は、ユーザーが10条に定める行為をしたと判断した場合、事前に通知することなく、そのユーザーが利用している全てのアカウントにおいて、利用停止、その他当運営が必要と判断する措置を講じることができるものとします。
      </p>
      <p class="my-2">2. 当運営は、本条に基づき当運営が行った行為によりユーザーに生じた損害について一切の責任を負いません。</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">11条 免責事項</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 当運営は、
        サービスの点検等、当運営が必要と判断した場合には、事前に通知することなく本サービスの全部又は一部の提供を中断することができるものとし、それに基づき生じた損害については、一切の責任を負いません。</p>
      <p class="my-2">2.
        当運営は、本サービスにて提供する作品及びその情報について、安全性、正確性、信憑性、商品的価値、有用性について保証するものではありません。また、それにより生じた損害について一切の責任を負いません。</p>
      <p class="my-2">3.
        当社は、本サービスに不具合や障害が生じないことについて、保証するものではありません。本サービスにおいて発生した不具合、エラー、障害などによるシステムの中断や遅滞、データの消失、第三者によるデータへの不正アクセスにより生じた損害、当運営又はユーザーに対する犯罪又は不法行為、自然災害などの不可抗力によって引き起こされた損害及び第9条に定める要因によって引き起こされた損害について、当運営に故意又は重過失がある場合を除き一切責任を負いません。
      </p>
      <p class="my-2">4.
        当運営は、当運営による本サービスの提供の中断、停止、終了、利用不能又は変更、会員ユーザーが本サービスに送信した情報の削除又は消失、会員ユーザーの抹消、本サービスの利用による登録データの消失又は機器の故障もしくは損傷、その他本サービスに関して会員ユーザーが被った損害につき、当運営の故意または重大な過失がある場合を除き、賠償する責任を一切負いません。
      </p>
      <p class="my-2">5. 本サービスに関連してユーザーと他のユーザー又は第三者との間において生じたトラブルについては、当運営は一切の責任を負いません。</p>
    </div>




    <h2 class="text-3xl font-semibold">Comiee作者規約</h2>

    <h3 class="text-2xl font-semibold my-4">1条 販売価格</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">
        1. 投稿作品の閲覧を有料にした場合、販売価格は1話あたり50円となります。販売価格は、作品の閲覧数やお気に入り登録者数、作品の投稿(更新)ペースなどによって変動します。<br>
      </p>
    </div>


    <h3 id="sales_and_author_profit" class="text-2xl font-semibold my-4">2条 売上と作者利益</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">
        1. 作者が受け取る金額は、以下に規定する計算式によって算出されます。<br>
        作者の収益＝（消費税引き後売上金額–決済手数料）× 70％<br>
        ※消費税＝作品の総売上金額の10％<br>
        ※決済手数料＝消費税引き後売上金額の3.6％<br>
        （例）10話分のエピソードがそれぞれ50エール(50円)、1話あたり100人の読者ユーザーに購入された場合<br>
        作者の利益額＝（50×10×100）×0.9×0.964×0.7＝¥30,366
      </p>
      <p class="my-2">
        2. 前項の規定に基づいて算出された作者への利益は、作者が指定した口座に毎週金曜日に入金されます。入金の対象になるのは、4営業日前までに購入処理が完了した分についてです。
      </p>
    </div>


    <h3 class="text-2xl font-semibold my-4">3条 禁止事項</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">以下に該当する作品の投稿、その他本サービスにおける情報の送信は禁止します。</p>
      <p class="my-2">1. 盗作、剽窃など、他者の著作権等を侵害しているもの。</p>
      <p class="my-2">2. 上記のほか、他者の財産権、商標権等の知的財産権、肖像権、名誉・プライバシー等を侵害するもの。</p>
      <p class="my-2">3. 詐欺やそのおそれがあるもの。</p>
      <p class="my-2">4. 差別につながる民族・宗教・人種・性別・年齢等に関するもの。</p>
      <p class="my-2">5. 自殺、集団自殺、自傷、違法薬物使用、脱法薬物使用等を勧誘・誘発・助長するおそれのあるもの。</p>
      <p class="my-2">6. マルチ商法等、当運営がユーザーに不利益をもたらすと判断する情報商材。</p>
      <p class="my-2">7. 株式の銘柄推奨、その他金融商品取引法に抵触するもの。</p>
      <p class="my-2">8. コンピュータウィルスその他有害なコンピューター・プログラムを含むもの。</p>
      <p class="my-2">9. オンラインゲーム等のアカウント、キャラクター、アイテム、通貨および仮想通貨などを譲渡しようとするもの。</p>
      <p class="my-2">10.
        不当景品類および不当表示防止法、医薬品、医療機器等の品質、有効性および安全性の確保等に関する法律、ならびに医療法その他の広告に関する法令に違反するもの、またはそのおそれのあるもの。</p>
      <p class="my-2">11. 特定の個人、特定のグループまたは組織になりすますもの。</p>
      <p class="my-2">12. マルチ商法等当運営がユーザーに対して不利益をもたらすものであると判断する情報商材の宣伝に直接もしくは間接的に利用するもの。</p>
      <p class="my-2">13. 未成年者を犯罪行為またはそのおそれのある行為に勧誘するもの。</p>
      <p class="my-2">14. 前各号の内容が掲載されているサイトへのリンクがあるもの。</p>
      <p class="my-2">15. その他、前各号に準じる不適切なもの。</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">4条 違反に対する処理</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">
        作者が以下に該当すると当運営が判断した場合、事前に通知することなく当運営は作者のご利用を停止させて頂き、作品を削除、または検索結果からの除外などの措置をすることがあります。これらの措置により作者に損害が生じた場合であっても、当運営は損害賠償責任その他一切の責任を負わないものとします。
      </p>
      <p class="my-2">1. 本利用規約に違反していると当運営が判断した場合。</p>
      <p class="my-2">2. スパム投稿、スパム行為であると当運営が判断した場合。</p>
      <p class="my-2">3. 反社会的勢力またはそれに準ずると当運営が判断した場合。</p>
      <p class="my-2">4. 投稿作品が不適切な内容であると当運営が判断した場合。</p>
      <p class="my-2">5. 本サービスのサーバーに過度に負担をかける場合。</p>
      <p class="my-2">6. 本サービスの運営に支障が生じると当運営が独自に判断した場合。</p>
    </div>


    <h3 class="text-2xl font-semibold my-4">5条 違約金</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        本利用規約に違反している作者については、当運営は販売した作品代金の支払いを拒否し、違約金として没収する場合があります。なお、既に支払い済みの場合には、返金の請求をする場合があります。</p>
      <p class="my-2">2.
        本利用規約に違反している疑いがあると当運営が判断した作者については、当運営は作者に対する代金の支払いを一時差し控えることができるものとします。また、当該措置により作者に生じた損害について、当運営は一切責任を負いません。
      </p>
    </div>



    <h2 class="text-3xl font-semibold">Comiee読者規約</h2>

    <h3 class="text-2xl font-semibold my-4">1条 購入</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. ユーザーが有料作品を購入する場合、本サービス上の作品購入画面において表示される金額を、当運営が定める決済方法のうちユーザーが選択した方法により、当社が徴収するものとします。</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">2条 閲覧制限</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. 当運営が作品について18歳以上向けの表現を含むと判断し、その旨の表示をした場合、18歳未満のユーザーは、当該作品を閲覧することはできません。</p>
    </div>

    <h3 class="text-2xl font-semibold my-4">3条 コメント/リプライの削除</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1.
        ユーザーはコメント欄に自由にコメントすることができます。ただし、当運営がユーザーからの通報を受けるなどして調査した結果、本利用規約に違反している内容であると運営側で独自に判断した場合、当該コメントを削除する場合があります。その場合、ユーザーに生じた一切の損害について、当運営は損害賠償責任その他の責任を負わないものとします。
      </p>
    </div>

    <h3 id="refund" class="text-2xl font-semibold my-4">4条 返金</h3>
    <div class="mb-10 mt-4 text-[16px]">
      <p class="my-2">1. ユーザーは、本サービスおよび取引契約の性質上、当運営に対しお支払いいただいた料金の返金等を受けることはできません。</p>
    </div>
  </div>

  @include('atoms._footer')
@endsection
