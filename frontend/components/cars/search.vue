<template>
  <!-- Search section -->
  <section class="mt-0 min-w-lg">
    <div class="container mx-auto opacity-100">
      <div class="flex flex-wrap">
        <div class="w-full md:w-full text-center">
          <div
            class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-600 w-full mb-8 shadow-lg rounded-lg"
          >
            <div class="px-4 py-2 flex-auto">
              <h1 class="text-2xl dark:text-white md:text-4xl font-bold mb-3">
                Car Search Engine
              </h1>
              <form>
                <!-- First layer of search fields -->
                <div class="grid md:grid-cols-5 md:gap-3 text-start">
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="make"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Make</label
                    >
                    <select
                      id="small"
                      v-model="make"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option
                        v-for="make in makes"
                        :key="make.id"
                        :value="make.slug"
                      >
                        {{ make.name }}
                      </option>
                    </select>
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="model"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Model</label
                    >
                    <select
                      id="small"
                      v-model="model"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <option
                        v-for="model in models"
                        :key="model.id"
                        :value="model.slug"
                      >
                        {{ model.name }}
                      </option>
                    </select>
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="minPrice"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Min Price</label
                    >
                    <input
                      type="number"
                      id="maxPrice"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Enter min price"
                      v-model="min_price"
                    />
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="maxPrice"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Max Price</label
                    >
                    <input
                      type="number"
                      id="maxPrice"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Enter max price"
                      v-model="max_price"
                    />
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <button
                      class="w-full mt-2 sm:mt-7 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                      @click="search"
                      type="button"
                    >
                      Search
                    </button>
                  </div>
                </div>
                <div
                  v-if="showSecondLayer"
                  class="grid md:grid-cols-4 md:gap-6 text-start mt-4"
                >
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="minYear"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Min Year</label
                    >
                    <input
                      type="text"
                      id="minYear"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Select min year"
                      v-model="min_year"
                    />
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="maxYear"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Max Year</label
                    >
                    <input
                      type="number"
                      id="maxYear"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                      placeholder="Select max year"
                      v-model="max_year"
                    />
                  </div>
                  <div class="relative z-0 w-full mb-2 group">
                    <label
                      for="car_usage"
                      class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                      >Usage</label
                    >
                    <select
                      id="small"
                      v-model="car_usage"
                      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                      <!-- <option selected>Select car car_usage</option> -->
                      <option value="local">Locally used</option>
                      <option value="foreign">Foreign used</option>
                    </select>
                  </div>
                </div>
                <div class="row text-left">
                  <a
                    @click="toggleSecondLayer"
                    class="text-white mb-2 ms-2 text-sm font-medium"
                  >
                    <span v-if="!showSecondLayer"
                      >More filters
                      <font-awesome-icon class="pl-1" icon="fa fa-chevron-down"
                    /></span>
                    <span v-else
                      >Close filters
                      <font-awesome-icon class="pl-1" icon="fa fa-chevron-up"
                    /></span>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Vue from "vue";
import { mapActions, mapState } from "vuex";
export default Vue.extend({
  data() {
    return {
      showSecondLayer: false,
      make: this.makes ? this.makes[0].slug : null,
      model: this.models ? this.models[0].slug : null,
      min_year: null,
      max_year: null,
      min_price: null,
      max_price: null,
      car_usage: null,
    };
  },
  async fetch() {
    this.getMakes();
    this.getModels();
  },

  computed: {
    ...mapState("lists", ["makes", "models"]),
  },
  methods: {
    ...mapActions("lists", ["getModels", "getMakes"]),
    toggleSecondLayer() {
      console.log("Sho secon layer called");
      this.showSecondLayer = !this.showSecondLayer;
    },

    search() {
      // Check if at least one field is entered
      if (
        !this.make &&
        !this.model &&
        !this.min_year &&
        !this.max_year &&
        !this.min_price &&
        !this.max_price
      ) {
        // Handle the case where no fields are entered
        console.log("Please enter at least one search criteria");
        return;
      }

      // Construct the params object with the selected values
      const params = {};
      if (this.make) params.make = this.make;
      if (this.model) params.model = this.model;
      if (this.min_year) params.min_year = this.min_year;
      if (this.max_year) params.max_year = this.max_year;
      if (this.min_price) params.min_price = this.min_price;
      if (this.max_price) params.max_price = this.max_price;
      if (this.car_usage) params.car_usage = this.car_usage;

      // Redirect to the search page with the selected parameters
      this.$router.push({ path: "/inventory/search", query: params });
    },
  },
});
</script>

<style scoped>
/* Your CSS styles go here */
</style>
