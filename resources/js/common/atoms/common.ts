interface Window {
    stripe_connectbtn: () => void;
    updateLabel: (input: HTMLInputElement) => void;
}

/*
|--------------------------------------------------------------------------
| 文字数チェック
|--------------------------------------------------------------------------
|
|
*/
function updateCharacterCount(
    inputSelector: string,
    outputSelector: string
): void {
    const inputElement =
        document.querySelector<HTMLInputElement>(inputSelector);
    const outputElement = document.querySelector<HTMLElement>(outputSelector);

    if (inputElement && outputElement) {
        inputElement.addEventListener("keyup", () => {
            const input = inputElement.value;
            if (input !== null) {
                outputElement.innerText = input.length.toString();
            }
        });
    }
}
// 自己紹介
updateCharacterCount(".count_2", ".string_count_2");
// お問い合わせ よくあるご質問 内容文字数
updateCharacterCount(".count_6", ".string_count_6");
// お問い合わせ フッター 内容文字数
updateCharacterCount(".count_7", ".string_count_7");
// 作品追加 あらすじの文字数
updateCharacterCount(".count_11", ".string_count_11");
updateCharacterCount(".count_12", ".string_count_12");
updateCharacterCount(".count_13", ".string_count_13");
updateCharacterCount(".count_14", ".string_count_14");
updateCharacterCount(".count_15", ".string_count_15");
// エピソード追加 クリエイターから一言の文字数
updateCharacterCount(".count_16", ".string_count_16");

/*
|--------------------------------------------------------------------------
| 送信ボタン ローディング追加
|--------------------------------------------------------------------------
|
|
*/
document.addEventListener("DOMContentLoaded", function () {
    const sendForm = document.getElementById("sendForm") as HTMLFormElement;
    const progress = document.querySelector<HTMLElement>(".progress");
    const overlay = document.getElementById("overlay") as HTMLElement;

    if (!sendForm || !progress || !overlay) {
        return;
    }

    sendForm.addEventListener("submit", function () {
        progress.style.display = "block";
        overlay.classList.remove("hidden");
        submit_btn();
    });
});

function submit_btn(): void {
    const submitButtons = document.querySelectorAll<HTMLElement>(
        ".submit_btn, .submit_btn2, .submit_btn3"
    );
    submitButtons.forEach((button) => button.classList.add("activeLoading"));
}

/*
|--------------------------------------------------------------------------
| Stripe 接続ボタン
|--------------------------------------------------------------------------
|
|
*/
function stripe_connectbtn(): void {
    const stripe_connectbtn =
        document.querySelector<HTMLElement>(".stripe_connectbtn");
    stripe_connectbtn?.classList.add("activeLoading");
    window.setTimeout(function () {
        stripe_connectbtn?.classList.remove("activeLoading");
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
function updateLabel(input: HTMLInputElement): void {
    const label = input.nextElementSibling as HTMLElement;
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

export {};
