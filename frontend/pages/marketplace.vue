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
              <p class="font-bold mb-3 text-white">Marketplace</p>
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

              <div class="flex justify-end pt-5 space-x-2">
                <!-- Previous Page Button -->

                <!-- Pagination Links -->
                <div class="flex space-x-2">
                  <!-- You can loop through the pages dynamically in your actual application -->
                  <!-- For simplicity, I'm manually adding links for pages 1 to 34 -->

                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                  >
                    1
                  </a>
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                  >
                    2
                  </a>
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                  >
                    3
                  </a>
                  <a
                    href="#"
                    class="bg-gray-900 text-blue-500 border px-4 py-2 font-bold"
                  >
                    4
                  </a>
                </div>

                <!-- Next Page Button -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>
<script>
import Vue from "vue";
import CarComponent from "../components/cars/car-component.vue";
import Search from "../components/cars/search.vue";

export default Vue.extend({
  name: "Cars",
  components: {
    CarComponent,
    Search,
  },
});
</script>

<style scoped></style>
