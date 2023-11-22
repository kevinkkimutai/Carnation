<template>
  <div class="c">
    <!-- searvh section -->
    <Search />
    <div
      class="md:px-0 px-2 md:px-10 grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 w-full"
      id="cardContainer"
    >
      <!-- Card 1 -->
      <div
        class="relative mx-auto w-full"
        v-for="car in filteredCars"
        :key="car.id"
      >
        <div
          class="rounded-lg border border-gray-200 bg-white shadow dark:bg-gray-800 dark:border-gray-700"
        >
          <router-link
            :to="'/details/' + car.id"
            class="relative inline-block w-full"
          >
            <div
              class="relative flex h-52 justify-center overflow-hidden rounded-lg"
            >
              <div
                class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110"
              >
                <div class="absolute inset-0 bg-black bg-opacity-80 bg-red-500">
                  <img
                    :src="car.profile_image"
                    alt=""
                    class="object-cover h-52 w-full rounded-t-lg"
                    loading="lazy"
                  />
                </div>
              </div>
              <!-- sold span -->
              <span
                v-if="car.availability === 'sold'"
                class="absolute object-cover transform transition-transform duration-500 ease-in-out hover:scale-110"
              >
                <img
                  src="../../assets/sold.png"
                  alt=""
                  class="object-cover h-52 md:p-2 w-full rounded-t-lg"
                  loading="lazy"
                />
              </span>

              <span
                v-if="car.availability === 'available'"
                class="absolute top-0 left-0 z-10 mt-3 ml-3 inline-flex select-none rounded-full bg-green-900 px-2 py-1 text-xs font-semibold text-white"
              >
                Available
              </span>
            </div>

            <!-- bottom section of the card -->
            <div class="mt-3 w-full flex text-gray-900 dark:text-white">
              <h2
                class="text-md font-bold line-clamp-1 md:text-lg text-start ms-2 float-left w-3/4"
              >
                <span
                  class="font-semibold bg-gray-300 dark:bg-gray-900 pr-1 pl-1 me-1 rounded"
                >
                  {{ car.year }}</span
                >{{ car.make }} {{ car.model }}
              </h2>
              <h2
                v-if="car.availability === 'available'"
                class="text-md md:text-md text-start w-1/4"
              >
                <span
                  class="float-right bg-green-900 pr-1 pl-1 font-semibold rounded me-2 md:me-2 text-white"
                  >In Stock</span
                >
              </h2>
              <h2
                v-if="car.availability === 'sold'"
                class="font-bold md:text-md text-start w-1/4"
              >
                <span
                  class="me-2 md:me-2 float-right bg-red-700 pr-1 pl-1 font-semibold rounded text-white"
                  >Sold</span
                >
              </h2>
            </div>

            <div class="justify-center flex-row">
              <div
                class="mt-2 ms- flex space-x-1 overflow-hidden rounded-lg px-1 text-gray-900 dark:text-white"
              >
                <p class="flex items-center font-medium w-1/3">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="1em"
                    viewBox="0 0 512 512"
                    class="me-2"
                  >
                    <path
                      d="M32 64C32 28.7 60.7 0 96 0H256c35.3 0 64 28.7 64 64V256h8c48.6 0 88 39.4 88 88v32c0 13.3 10.7 24 24 24s24-10.7 24-24V222c-27.6-7.1-48-32.2-48-62V96L384 64c-8.8-8.8-8.8-23.2 0-32s23.2-8.8 32 0l77.3 77.3c12 12 18.7 28.3 18.7 45.3V168v24 32V376c0 39.8-32.2 72-72 72s-72-32.2-72-72V344c0-22.1-17.9-40-40-40h-8V448c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32V64zM96 80v96c0 8.8 7.2 16 16 16H240c8.8 0 16-7.2 16-16V80c0-8.8-7.2-16-16-16H112c-8.8 0-16 7.2-16 16z"
                    />
                  </svg>
                  <span
                    class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg"
                  >
                    Petrol</span
                  >
                </p>

                <p class="flex items-center font-medium w-1/3">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="1em"
                    viewBox="0 0 512 512"
                    class="me-2"
                  >
                    <path
                      d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"
                    />
                  </svg>
                  <span
                    class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg"
                  >
                    2400 Cc
                  </span>
                </p>
                <p class="flex items-center font-medium w-1/3">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="1em"
                    viewBox="0 0 640 512"
                    class="me-2"
                  >
                    <path
                      d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.9 8.4 167.2 8 160.4 8h-.7c-6.8 0-13.5 .4-20.1 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM112 176a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 304a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"
                    />
                  </svg>
                  <span
                    class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg"
                  >
                    Automatic
                  </span>
                </p>
              </div>
              <div
                class="mt-4 ms- text-center flex space-x-1 overflow-hidden rounded-lg px-1 text-gray-900 dark:text-white"
              >
                <P>
                  {{ car.model }}, {{ car.make }}, fabric seats , bright
                  interior, alloy reems,leather seats
                </P>
                <!-- <p class="flex items-center font-medium w-1/3">
                          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" class="me-2">
                          <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm320 96c0-26.9-16.5-49.9-40-59.3V88c0-13.3-10.7-24-24-24s-24 10.7-24 24V292.7c-23.5 9.5-40 32.5-40 59.3c0 35.3 28.7 64 64 64s64-28.7 64-64zM144 176a32 32 0 1 0 0-64 32 32 0 1 0 0 64zm-16 80a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm288 32a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM400 144a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                          </svg>
                          2400 Cc
                      </p>

                       <p class="flex items-center font-medium w-1/3">
                          <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 640 512" class="me-2">
                          <path d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.9 8.4 167.2 8 160.4 8h-.7c-6.8 0-13.5 .4-20.1 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM112 176a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 304a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"/></svg>
                           Automatic
                       </p> -->
              </div>
            </div>
          </router-link>
          <div class="mt-4 mb- grid grid-cols-2 border-gray-600 border-t pt-2">
            <h3
              class="text-lg ms-1 float-left font-bold hover:text-gray-400 transition duration-300 ease-in-out capitalize"
            >
              Ksh 2,450,000
            </h3>
            <router-link :to="'/details/' + car.id">
              <button
                class="text-white float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover-bg-blue-700 focus:outline-none dark:focus-ring-blue-800 ms-"
              >
                View
              </button>
            </router-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapState, mapActions } from "vuex";
import Vue from "vue";
import Search from "./search.vue";
export default Vue.extend({
  components: {
    Search,
  },
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
    // filteredCars() {
    //   return this.cars.filter((car) => {
    //     const modelMatch = car.model
    //       .toLowerCase()
    //       .includes(this.searchModel.toLowerCase());
    //     const makeMatch = car.make
    //       .toLowerCase()
    //       .includes(this.searchMake.toLowerCase());
    //     const yearMatch = String(car.year).includes(this.searchYear);

    //     return modelMatch && makeMatch && yearMatch;
    //   });
    // },
    // Modify slicedCars to display cars based on current page
    slicedCars() {
      const start = (this.currentPage - 1) * this.itemsPerPage;
      const end = start + this.itemsPerPage;
      return this.filteredCars.slice(start, end);
    },
  },
  methods: {
    ...mapActions("cars", ["getCars"]),
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
});
</script>

<style scoped>
/* Your CSS styles go here */
</style>
