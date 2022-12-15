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
