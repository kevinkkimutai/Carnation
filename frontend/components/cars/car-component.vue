<template>
  <div class="relative mx-auto w-full">
    <div
      class="rounded-lg border border-gray-200 bg-white shadow dark:bg-gray-800 dark:border-gray-700"
    >
      <a :href="`/inventory/${car.id}`">
        <div
          class="relative flex h-52 justify-center overflow-hidden rounded-lg"
        >
          <div
            class="w-full transform transition-transform duration-500 ease-in-out hover:scale-110"
          >
            <div class="absolute inset-0 bg-black bg-opacity-80 bg-red-500">
              <img
                :src="car.featured_image"
                :alt="`Image of ${car.title}`"
                class="object-cover h-52 w-full"
                loading="lazy"
              />
            </div>
          </div>
          <!-- sold span -->
          <span
            v-if="car.availability === 'unavailable'"
            class="absolute object-cover transform transition-transform duration-500 ease-in-out hover:scale-110"
          >
            <img
              src="../../assets/sold.png"
              alt=""
              class="object-cover h-52 md:p-2 w-full rounded-t-lg"
              loading="lazy"
              style="height: 140px"
            />
          </span>

          <span
            class="absolute top-0 left-0 z-10 mt-3 ml-3 inline-flex select-none rounded-full bg-green-900 px-2 py-1 text-xs font-semibold text-white"
          >
            {{ car.car_usage === "local" ? "Locally used" : "Foreign used" }}
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
            >{{ car.title }}
          </h2>
          <!-- <h2 class="text-md md:text-md text-start w-1/4">
            <span
              class="inline-flex select-none rounded-full px-2 py-1 text-xs font-semibold text-white"
              :class="
                car.availability === 'available' ? 'bg-green-900' : 'bg-red-900'
              "
            >
              {{ car.availability === "In Stock" ? "" : "Sold" }}
            </span>
          </h2> -->
          <h2
            v-if="car.availability === 'unavailable'"
            class="font-bold md:text-md text-start w-1/4"
          >
            <span
              class="me-2 md:me-2 float-right bg-red-700 pr-1 pl-1 font-semibold rounded text-white"
              >Sold</span
            >
          </h2>
          <h2 v-else class="font-bold md:text-md text-start w-1/4">
            <span
              class="me-2 md:me-2 float-right bg-green-900 pr-1 pl-1 font-semibold rounded text-white"
              >In Stock</span
            >
          </h2>
        </div>

        <div class="justify-center flex-row">
          <div
            class="mt-2 ms- flex space-x-1 overflow-hidden rounded-lg px-1 text-gray-900 dark:text-white"
          >
            <p class="flex items-center w-1/3">
              <span class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg">
                {{ car.fuel }}</span
              >
            </p>

            <p class="flex items-center w-1/3">
              <span class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg">
                {{ car.cc }} Cc
              </span>
            </p>
            <p class="flex items-center w-1/3">
              <span class="bg-gray-300 dark:bg-gray-900 pr-1 pl-1 rounded-lg">
                {{ car.transmission }}
              </span>
            </p>
          </div>
          <div
            style="min-height: 40px"
            class="mt-4 ms- text-center flex space-x-1 overflow-hidden rounded-lg px-1 text-gray-900 dark:text-white"
          >
            <P>
              {{ car.description }}
            </P>
          </div>
        </div>
      </a>
      <div class="mt-4 mb- grid grid-cols-2 border-gray-600 border-t pt-2">
        <h3
          class="text-lg ms-1 text-white text-left float-left font-bold hover:text-gray-400 transition duration-300 ease-in-out capitalize"
        >
          Ksh {{ car.price }}
        </h3>

        <a
          :href="`/inventory/${car.id}`"
          class="text-white text-center float-right bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-1 mr-2 mb-2 dark:bg-blue-600 dark:hover-bg-blue-700 focus:outline-none dark:focus-ring-blue-800 ms-"
        >
          Details
        </a>
      </div>
    </div>
  </div>
</template>
<script lang="ts">
import Vue from "vue";

export default Vue.extend({
  name: "CarComponent",

  props: {
    car: {
      required: true,
      type: Object,
    },
  },
});
</script>
