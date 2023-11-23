<template>
  <main class="bg-white dark:bg-gray-900 mt-2 pt-16">
    <!-- car list -->
    <section class="mt-0 min-w-lg">
      <div class="container mx-auto opacity-100">
        <div class="flex flex-wrap">
          <div class="w-full md:w-full">
            <div
              class="md:px-0 px-2 relative flex flex-col min-w-0 break-words w-full mb-2 rounded-lg"
            >
              <p class="font-bold mb-3 text-white">Our inventory</p>
              <!-- searvh section -->
              <Search />

              <div
                class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 w-full"
                id="cardContainer"
              >
                <!-- Card 1 -->
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
                <car-component></car-component>
              </div>

              <!-- <div class="flex justify-center pt-5 space-x-2">
                <div class="flex space-x-2">
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                    >1</a
                  >
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                    >2</a
                  >
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                    >3</a
                  >
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                    >4</a
                  >
                </div>
              </div> -->
              <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm pt-5 flex justify-end"
                aria-label="Pagination"
              >
                <a
                  href="#"
                  class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0"
                >
                  <span class="sr-only">Previous</span>
                  <svg
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
                <!-- Current: "z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600", Default: "text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:outline-offset-0" -->
                <a
                  href="#"
                  aria-current="page"
                  class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600"
                  >1</a
                >
                <a
                  href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0"
                  >2</a
                >
                <a
                  href="#"
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0 md:inline-flex"
                  >3</a
                >
                <span
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0"
                  >...</span
                >
                <a
                  href="#"
                  class="relative hidden items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0 md:inline-flex"
                  >8</a
                >
                <a
                  href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0"
                  >9</a
                >
                <a
                  href="#"
                  class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0"
                  >10</a
                >
                <a
                  href="#"
                  class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0"
                >
                  <span class="sr-only">Next</span>
                  <svg
                    class="h-5 w-5"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                  >
                    <path
                      fill-rule="evenodd"
                      d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z"
                      clip-rule="evenodd"
                    />
                  </svg>
                </a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
<script>
import Vue from "vue";
import CarComponent from "../../components/cars/car-component.vue";
import Search from "../../components/cars/search.vue";

export default Vue.extend({
  name: "Cars",
  components: {
    CarComponent,
    Search,
  },
});
</script>

<style scoped></style>
