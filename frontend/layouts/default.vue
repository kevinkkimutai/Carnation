<template>
  <body class="bg-white dark:bg-gray-900">
    <nav
      class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200 dark:border-gray-600"
    >
      <div
        class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto sm-h-12"
      >
        <a href="/" class="flex items-center">
          <img
            src="../assets/car.png"
            class="md:h-14 h-12 mr-3"
            alt="carnation Logo"
          />
          <span
            class="self-center text-xl font-semibold whitespace-nowrap dark:text-white"
            >CarNation Auto Mart</span
          >
        </a>
        <div class="flex md:order-2">
          <div class="relative hidden md:block">
            <social-icons></social-icons>
          </div>
          <button
            data-collapse-toggle="navbar-search"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-search"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg
              class="w-5 h-5"
              aria-hidden="true"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 17 14"
            >
              <path
                stroke="currentColor"
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M1 1h15M1 7h15M1 13h15"
              />
            </svg>
          </button>
        </div>
        <div
          class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
          id="navbar-search"
        >
          <div class="mt-3 md:hidden">
            <social-icons
              class="flex items-center justify-center"
            ></social-icons>
          </div>
          <ul
            class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
          >
            <li>
              <a
                href="/"
                class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
                aria-current="page"
                >Home</a
              >
            </li>

            <li>
              <button
                id="dropdownNavbarLink"
                data-dropdown-toggle="dropdownNavbar"
                class="flex items-center justify-between w-full py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent"
              >
                Inventory
                <svg
                  class="w-2.5 h-2.5 ml-2.5"
                  aria-hidden="true"
                  xmlns="http://www.w3.org/2000/svg"
                  fill="none"
                  viewBox="0 0 10 6"
                >
                  <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m1 1 4 4 4-4"
                  />
                </svg>
              </button>
              <!-- Dropdown menu -->
              <div
                id="dropdownNavbar"
                class="z-10 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"
              >
                <ul
                  class="py-2 text-sm text-gray-700 dark:text-gray-400"
                  aria-labelledby="dropdownLargeButton"
                >
                  <li>
                    <a
                      href="/inventory"
                      class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      >New Cars</a
                    >
                  </li>
                  <li>
                    <a
                      href="/inventory"
                      class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                      >Locally Used Cars</a
                    >
                  </li>
                </ul>
              </div>
            </li>
            <li>
              <a
                href="/marketplace"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                aria-current="page"
                >Marketplace</a
              >
            </li>
            <li>
              <a
                href="/about"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >About</a
              >
            </li>
            <li>
              <a
                href="/contact"
                class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                >Contact Us</a
              >
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <Nuxt />
    <footer class="bg-white dark:bg-gray-900">
      <div class="mx-auto w-full p-4 py-6 lg:py-">
        <hr
          class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
        />
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <a href="/" class="flex items-center">
              <img
                src="../assets/Sticker1.png"
                class="h-20 mr-3"
                alt="FlowBite Logo"
              />
              <span
                class="self-center text-md md:text-xl font-semibold whitespace-nowrap dark:text-white"
                >CarNation Auto Mart</span
              >
            </a>
          </div>
          <div class="grid grid-cols-2 gap-6 sm:gap-8 sm:grid-cols-3">
            <div>
              <h2
                class="mb-6 font-semibold text-gray-900 uppercase dark:text-white"
              >
                For Inquiries
              </h2>
              <ul
                class="text-gray-500 dark:text-gray-400 text-sm md:font-medium"
              >
                <li class="">
                  <a href="/" class="hover:underline text-sm"
                    >info@carnationautomart.com</a
                  >
                </li>
                <li>
                  <a href="/" class="hover:underline">+254703840814</a>
                </li>
                <li>
                  <a href="/" class="hover:underline">+254719848282</a>
                </li>
                <li>
                  <a href="/" class="hover:underline">+254707222777</a>
                </li>
              </ul>
            </div>
            <div>
              <h2
                class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
              >
                Resources
              </h2>
              <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-">
                  <a
                    href="https://flowbite.com/"
                    class="hover:underline text-sm ms-"
                    >Import your car</a
                  >
                </li>
                <li>
                  <a href="https://tailwindcss.com/" class="hover:underline"
                    >Locally Used Cars</a
                  >
                </li>
                <li>
                  <a href="https://tailwindcss.com/" class="hover:underline"
                    >New on Site</a
                  >
                </li>
              </ul>
            </div>

            <div>
              <h2
                class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white"
              >
                Legal
              </h2>
              <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-">
                  <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <hr
          class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8"
        />
        <div class="sm:flex sm:items-center sm:justify-between">
          <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400"
            >© 2023 <a href="/" class="hover:underline">Carnation Auto Mart</a>.
            All Rights Reserved.
          </span>
          <SocialIcons />
        </div>
      </div>
    </footer>
  </body>
</template>
<script>
import Vue from "vue";
import SocialIcons from "../components/icons/social-icons.vue";
export default {
  name: "DefaultLayout",
  components: {
    SocialIcons,
  },
};
</script>
