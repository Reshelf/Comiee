<script setup>
function changeTheme() {
  if (
    localStorage.theme === "dark" ||
    (!("theme" in localStorage) &&
      window.matchMedia("(prefers-color-scheme: dark)").matches)
  ) {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
  } else {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
  }
}
</script>
<template>
  <div class="flex items-center w-full h-full p-3" @click="changeTheme">
    <label id="headlessui-listbox-label-3" class="sr-only"> Theme </label>
    <button
      id="headlessui-listbox-button-4"
      type="button"
      aria-haspopup="true"
      aria-expanded="false"
      aria-labelledby="headlessui-listbox-label-3 headlessui-listbox-button-undefined"
    >
      <svg
        width="20"
        height="20"
        viewBox="0 0 24 24"
        fill="none"
        class="block dark:hidden"
      >
        <path
          d="M2.03 12.42C2.39 17.57 6.76 21.76 11.99 21.99C15.68 22.15 18.98 20.43 20.96 17.72C21.78 16.61 21.34 15.87 19.97 16.12C19.3 16.24 18.61 16.29 17.89 16.26C13 16.06 9 11.97 8.98 7.13996C8.97 5.83996 9.24 4.60996 9.73 3.48996C10.27 2.24996 9.62 1.65996 8.37 2.18996C4.41 3.85996 1.7 7.84996 2.03 12.42Z"
          stroke="#292D32"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
      <svg
        width="20"
        height="20"
        viewBox="0 0 24 24"
        fill="none"
        class="hidden dark:block"
      >
        <path
          d="M12 18.5C15.5899 18.5 18.5 15.5899 18.5 12C18.5 8.41015 15.5899 5.5 12 5.5C8.41015 5.5 5.5 8.41015 5.5 12C5.5 15.5899 8.41015 18.5 12 18.5Z"
          stroke="#fff"
          stroke-width="1.5"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
        <path
          d="M19.14 19.14L19.01 19.01M19.01 4.99L19.14 4.86L19.01 4.99ZM4.86 19.14L4.99 19.01L4.86 19.14ZM12 2.08V2V2.08ZM12 22V21.92V22ZM2.08 12H2H2.08ZM22 12H21.92H22ZM4.99 4.99L4.86 4.86L4.99 4.99Z"
          stroke="#fff"
          stroke-width="2"
          stroke-linecap="round"
          stroke-linejoin="round"
        />
      </svg>
    </button>
    <span class="pl-5">ダークモード</span>
  </div>
</template>
