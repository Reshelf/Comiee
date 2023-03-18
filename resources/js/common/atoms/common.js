/*
|--------------------------------------------------------------------------
| 自己紹介
|--------------------------------------------------------------------------
|
|
*/

let count_2 = document.querySelector(".count_2");
let string_count_2 = document.querySelector(".string_count_2");
if (count_2) count_2.addEventListener("keyup", onKey_2);
function onKey_2() {
    let input_2 = null;
    if (count_2) input_2 = count_2.value;
    if (input_2 !== null) string_count_2.innerText = input_2.length;
}

/*
|--------------------------------------------------------------------------
| お問い合わせ よくあるご質問 内容文字数
|--------------------------------------------------------------------------
|
|
*/

let count_6 = document.querySelector(".count_6");
let string_count_6 = document.querySelector(".string_count_6");
if (count_6) count_6.addEventListener("keyup", onKey_6);
function onKey_6() {
    let input_6 = null;
    if (count_6) input_6 = count_6.value;
    if (input_6 !== null) string_count_6.innerText = input_6.length;
}

/*
|--------------------------------------------------------------------------
| お問い合わせ フッター 内容文字数
|--------------------------------------------------------------------------
|
|
*/

let count_7 = document.querySelector(".count_7");
let string_count_7 = document.querySelector(".string_count_7");
if (count_7) count_7.addEventListener("keyup", onKey_7);
function onKey_7() {
    let input_7 = null;
    if (count_7) input_7 = count_7.value;
    if (input_7 !== null) string_count_7.innerText = input_7.length;
}

/*
|--------------------------------------------------------------------------
| 作品追加 あらすじの文字数
|--------------------------------------------------------------------------
|
|
*/

let count_11 = document.querySelector(".count_11");
let string_count_11 = document.querySelector(".string_count_11");
if (count_11 && string_count_11) count_11.addEventListener("keyup", onKey_11);
function onKey_11() {
    let input_11 = null;
    if (count_11) input_11 = count_11.value;
    if (input_11 !== null) string_count_11.innerText = input_11.length;
}

let count_12 = document.querySelector(".count_12");
let string_count_12 = document.querySelector(".string_count_12");
if (count_12) count_12.addEventListener("keyup", onKey_12);
function onKey_12() {
    let input_12 = null;
    if (count_12) input_12 = count_12.value;
    if (input_12 !== null) string_count_12.innerText = input_12.length;
}

let count_13 = document.querySelector(".count_13");
let string_count_13 = document.querySelector(".string_count_13");
if (count_13) count_13.addEventListener("keyup", onKey_13);
function onKey_13() {
    let input_13 = null;
    if (count_13) input_13 = count_13.value;
    if (input_13 !== null) string_count_13.innerText = input_13.length;
}

let count_14 = document.querySelector(".count_14");
let string_count_14 = document.querySelector(".string_count_14");
if (count_14) count_14.addEventListener("keyup", onKey_14);
function onKey_14() {
    let input_14 = null;
    if (count_14) input_14 = count_14.value;
    if (input_14 !== null) string_count_14.innerText = input_14.length;
}

let count_15 = document.querySelector(".count_15");
let string_count_15 = document.querySelector(".string_count_15");
if (count_15) count_15.addEventListener("keyup", onKey_15);
function onKey_15() {
    let input_15 = null;
    if (count_15) input_15 = count_15.value;
    if (input_15 !== null) string_count_15.innerText = input_15.length;
}

/*
|--------------------------------------------------------------------------
| エピソード追加 作者から一言の文字数
|--------------------------------------------------------------------------
|
|
*/
let count_16 = document.querySelector(".count_16");
let string_count_16 = document.querySelector(".string_count_16");
if (count_16) count_16.addEventListener("keyup", onKey_16);
function onKey_16() {
    let input_16 = null;
    if (count_16) input_16 = count_16.value;
    if (input_16 !== null) string_count_16.innerText = input_16.length;
}

/*
|--------------------------------------------------------------------------
| 送信ボタン ローディング追加
|--------------------------------------------------------------------------
|
|
*/
document.addEventListener("DOMContentLoaded", function () {
    const registerForm = document.getElementById("registerForm");
    const progress = document.querySelector(".progress");

    if (!registerForm || !progress) {
        return;
    }

    registerForm.addEventListener("submit", function () {
        progress.style.display = "block"; // .progress要素を表示

        // ここでsubmit_btn関数を呼び出す
        submit_btn();

        // 非同期処理が終わったら、フォームを送信
        registerForm.submit();
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
