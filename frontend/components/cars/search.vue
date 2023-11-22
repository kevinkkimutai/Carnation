<template>
  <div class="c">
    <!-- searvh section -->
    <section class="mt-0 min-w-lg">
      <div class="container mx-auto opacity-100">
        <div class="flex flex-wrap">
          <div class="w-full md:w-full text-center">
            <div
              class="relative flex flex-col min-w-0 break-words bg-white dark:bg-gray-600 w-full mb-8 shadow-lg rounded-lg"
            >
              <div class="px-4 py-2 flex-auto">
                <h1 class="text-2xl dark text-white md:text-4xl font-bold mb-3">
                  Car Search Engine
                </h1>
                <form>
                  <div class="grid md:grid-cols-4 md:gap-6 text-start">
                    <div class="relative z-0 w-full mb-2">
                      <label
                        for="nodel"
                        class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Make</label
                      >
                      <input
                        type="text"
                        id="make"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter car make"
                        required
                        v-model="searchMake"
                      />
                    </div>
                    <div class="relative z-0 w-full mb-2 group">
                      <label
                        for="make"
                        class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Model</label
                      >
                      <input
                        type="text"
                        id="model"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter car model"
                        required
                        v-model="searchModel"
                      />
                    </div>
                    <div class="relative z-0 w-full mb-2 group">
                      <label
                        for="year"
                        class="block mb-2 ms-2 text-sm font-medium text-gray-900 dark:text-white"
                        >Year</label
                      >
                      <input
                        type="dig"
                        id="year"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Enter Year"
                        required
                        v-model="searchYear"
                      />
                    </div>
                    <div class="mb-2 md:mb-0">
                      <button
                        class="w-full mt-2 sm:mt-7 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        @click="search"
                        type="button"
                      >
                        Search
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
      currentPage: 1,
      itemsPerPage: 8,
      searchModel: "", // Initialize search variables
      searchMake: "",
      searchYear: "",
    };
  },
  computed: {
    ...mapState(["cars", "isLoading"]),
    // Modify computed property to filter cars based on search criteria
    filteredCars() {
      return this.cars.filter((car) => {
        const modelMatch = car.model
          .toLowerCase()
          .includes(this.searchModel.toLowerCase());
        const makeMatch = car.make
          .toLowerCase()
          .includes(this.searchMake.toLowerCase());
        const yearMatch = String(car.year).includes(this.searchYear);

        return modelMatch && makeMatch && yearMatch;
      });
    },
    // Modify slicedCars to display cars based on current page
    slicedCars() {
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = start + this.itemsPerPage;
      return this.filteredCars.slice(start, end);
    },
  },
  methods: {
    ...mapActions(["getCars"]),
    resetLoadingState() {
      this.isLoading = true;
      this.getCars().finally(() => {
        this.isLoading = false;
      });
    },
    prevPage() {
      if (this.currentPage > 1) {
        this.currentPage -= 1;
        window.scrollTo(0, 0);
      }
    },
    nextPage() {
      const maxPage = Math.ceil(this.filteredCars.length / this.itemsPerPage);
      if (this.currentPage < maxPage) {
        this.currentPage += 1;
        window.scrollTo(0, 0);
      }
    },
  },
  mounted() {
    this.getCars();
  },
};
</script>

<style scoped>
/* Your CSS styles go here */
</style>
