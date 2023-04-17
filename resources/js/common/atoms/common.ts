/*
|--------------------------------------------------------------------------
| 文字数カウント
|--------------------------------------------------------------------------
|
|
*/
function updateCount(countSelector: string, stringCountSelector: string): void {
    const countElement = document.querySelector(countSelector);
    const stringCountElement = document.querySelector(stringCountSelector);

    if (countElement && stringCountElement) {
        countElement.addEventListener("keyup", () => {
            const input = (countElement as HTMLInputElement).value;
            if (input !== null) {
                (stringCountElement as HTMLElement).textContent =
                    input.length.toString();
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
    const sendForm = document.getElementById("sendForm") as HTMLElement | null;
    const progress = document.querySelector(".progress") as HTMLElement | null;
    const overlay = document.getElementById("overlay") as HTMLElement | null;

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

function submit_btn(): void {
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
    if (stripe_connectbtn) {
        stripe_connectbtn.classList.add("activeLoading");
        window.setTimeout(function () {
            stripe_connectbtn.classList.remove("activeLoading");
        }, 5000);
    }
}
window.stripe_connectbtn = stripe_connectbtn;

/*
|--------------------------------------------------------------------------
| フォーム input ラベル
|--------------------------------------------------------------------------
|
|
*/
function addLabelClass(input: HTMLInputElement): void {
    const label = input.nextElementSibling as HTMLElement;
    label.classList.add("label-focused");
}

function removeLabelClass(input: HTMLInputElement): void {
    const label = input.nextElementSibling as HTMLElement;
    label.classList.remove("label-focused");
}

function updateLabel(input: HTMLInputElement): void {
    if (input.value !== null && input.value !== "") {
        addLabelClass(input);
    } else {
        removeLabelClass(input);
    }
}

(window as any).updateLabel = updateLabel;

document.addEventListener("DOMContentLoaded", function () {
    const inputs = document.querySelectorAll("#sendForm .input-field");

    inputs.forEach((inputElement) => {
        const input = inputElement as HTMLInputElement;

        input.addEventListener("input", () => {
            updateLabel(input);
        });

        input.addEventListener("focus", () => {
            updateLabel(input);
        });

        input.addEventListener("blur", () => {
            updateLabel(input);
        });

        // 初回ページロード時に、値が入力されている場合にラベルを上に移動する
        if (input.value) {
            updateLabel(input);
        }
    });
});
