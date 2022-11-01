/* eslint-disable no-unused-vars */
"use strict";

function dragdrop_two(event) {
  let fileName = URL.createObjectURL(event.target.files[0]);
  let preview = document.getElementById("thumbnail-preview");
  let previewImg = document.createElement("img");
  previewImg.setAttribute("src", fileName);
  preview.innerHTML = "";
  preview.appendChild(previewImg);
}

function dragdrop_one(event) {
  let fileName = URL.createObjectURL(event.target.files[0]);
  let preview = document.getElementById("avatar-preview");
  let previewImg = document.createElement("img");
  previewImg.setAttribute("src", fileName);
  preview.innerHTML = "";
  preview.appendChild(previewImg);
}

function drag() {
  document.getElementById("uploadFile").parentNode.className =
    "draging dragBox";
}

function drop() {
  document.getElementById("uploadFile").parentNode.className = "dragBox";
}
