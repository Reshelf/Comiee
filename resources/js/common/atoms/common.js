/*
|--------------------------------------------------------------------------
| 文字数カウント
|--------------------------------------------------------------------------
|
|
*/
function updateCount(countSelector, stringCountSelector) {
    const countElement = document.querySelector(countSelector);
    const stringCountElement = document.querySelector(stringCountSelector);

    if (countElement && stringCountElement) {
        countElement.addEventListener("keyup", () => {
            const input = countElement.value;
            if (input !== null) {
                stringCountElement.innerText = input.length;
            }
        });
    }
}

// 自己紹介
updateCount(".count_2", ".string_count_2");

// お問い合わせ よくあるご質問 内容文字数
updateCount(".count_6", ".string_count_6");

// お問い合わせ フッター 内容文字数
updateCount(".count_7", ".string_count_7");

// 作品追加 あらすじの文字数
updateCount(".count_11", ".string_count_11");
updateCount(".count_12", ".string_count_12");
updateCount(".count_13", ".string_count_13");
updateCount(".count_14", ".string_count_14");
updateCount(".count_15", ".string_count_15");

// エピソード追加 クリエイターから一言の文字数
updateCount(".count_16", ".string_count_16");

/*
|--------------------------------------------------------------------------
| 送信ボタン ローディング追加
|--------------------------------------------------------------------------
|
|
*/
document.addEventListener("DOMContentLoaded", function () {
    const sendForm = document.getElementById("sendForm");
    const progress = document.querySelector(".progress");
    const overlay = document.getElementById("overlay");

    if (!sendForm || !progress || !overlay) {
        return;
    }

    sendForm.addEventListener("submit", function () {
        // event.preventDefault();
        progress.style.display = "block"; // .progress要素を表示
        overlay.classList.remove("hidden"); // #overlay要素を表示

        // ここでsubmit_btn関数を呼び出す
        // submit_btn();

        // 非同期処理が終わったら、フォームを送信
        // sendForm.submit();
    });
});

function submit_btn() {
    const submitButtons = document.querySelectorAll(
        ".submit_btn, .submit_btn2, .submit_btn3"
    );
    submitButtons.forEach((button) => button.classList.add("activeLoading"));
}
window.submit_btn = submit_btn;

/*
|--------------------------------------------------------------------------
| Stripe 接続ボタン
|--------------------------------------------------------------------------
|
|
*/
function stripe_connectbtn() {
    const stripe_connectbtn = document.querySelector(".stripe_connectbtn");
    stripe_connectbtn.classList.add("activeLoading");
    window.setTimeout(function () {
        stripe_connectbtn.classList.remove("activeLoading");
    }, 5000);
}
window.stripe_connectbtn = stripe_connectbtn;

/*
|--------------------------------------------------------------------------
| フォーム input ラベル
|--------------------------------------------------------------------------
|
|
*/
function updateLabel(input) {
    const label = input.nextElementSibling;
    if (input.value) {
        label.classList.add(
            "text-xs",
            "text-gray-500",
            "dark:bg-dark-1",
            "-translate-y-5",
            "bg-white",
            "px-2",
            "py-1",
            "z-20"
        );
    } else {
        label.classList.remove(
            "text-xs",
            "text-gray-500",
            "dark:bg-dark-1",
            "-translate-y-5",
            "bg-white",
            "px-2",
            "py-1",
            "z-20"
        );
    }
}
window.updateLabel = updateLabel;
