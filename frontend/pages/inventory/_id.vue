<template>
  <main class="bg-white dark:bg-gray-900 mt-2 pt-16">
    <!-- car list -->
    <section class="mt-0 min-w-lg">
      <div class="container mx-auto opacity-100">
        <div class="flex flex-wrap">
          <div class="w-full md:w-full">
            <div class="container w-full md:flex p-1 md:pt-14 md:p-10">
              <div id="controls-carousel" class="w-full relative md:w-1/2 pt-3">
                <!-- Carousel thumbnails-container -->
                <div class="relative overflow-hidden rounded-lg slide">
                  <!-- <div
                    v-for="(photo_url, index) in car.photos_urls"
                    :key="index"
                    :class="{ 'hidden flex': currentIndex !== index }"
                  >
                    <img
                      :src="photo_url"
                      :alt="photo_url.id"
                      class="object-cover max-h-80 md:max-h-96 w-full"
                    />
                  </div> -->
                  <div>
                    <img
                      src="../../assets/car1.jpg"
                      class="object-cover max-h-80 md:max-h-96 w-full"
                    />
                  </div>
                  <!-- <div>
                    <img
                      src="../../assets/car1.jpg"
                      class="object-cover max-h-80 md:max-h-96 w-full"
                    />
                  </div>
                  <div>
                    <img
                      src="../../assets/car1.jpg"
                      class="object-cover max-h-80 md:max-h-96 w-full"
                    />
                  </div> -->

                  <!-- Slider controls -->
                  <button
                    type="button"
                    class="absolute top-0 left-0 z-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none carousel-control-prev"
                    @click="previousSlide"
                  >
                    <span
                      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
                    >
                      <svg
                        class="w-4 h-4 text-white dark:text-gray-800"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M5 1 1 5l4 4"
                        />
                      </svg>
                      <span class="sr-only">Previous</span>
                    </span>
                  </button>
                  <button
                    type="button"
                    class="absolute top-0 right-0 z-0 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none carousel-control-next"
                    @click="nextSlide"
                  >
                    <span
                      class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none"
                    >
                      <svg
                        class="w-4 h-4 text-white dark:text-gray-800"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 6 10"
                      >
                        <path
                          stroke="currentColor"
                          stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="m1 9 4-4-4-4"
                        />
                      </svg>
                      <span class="sr-only">Next</span>
                    </span>
                  </button>
                </div>

                <!-- thumbnails -->
                <div class="thumbnails-container" ref="thumbnailContainer">
                  <div class="track gap-3">
                    <div class="thumbnail">
                      <img class="object-cover" src="../../assets/car1.jpg" />
                    </div>
                    <!-- <div class="thumbnail"> -->
                    <!-- <img class="object-cover" src="../../assets/car1.jpg" />
                    </div>
                    <div class="thumbnail">
                      <img class="object-cover" src="../../assets/car1.jpg" />
                    </div> -->
                    <!-- <div
                      class="thumbnail"
                      v-for="(photo_url, index) in car.photos_urls"
                      :key="index"
                      :class="{ active: index === currentIndex }"
                      @click="changeSlide(index)"
                    >
                      <img
                        class="object-cover"
                        :src="photo_url"
                        :alt="photo_url.id"
                      />
                    </div> -->
                  </div>
                </div>

                <!-- video -->
                <div class="rounded-lg pt-4">
                  <iframe
                    class="w-full rounded-lg mb-2"
                    src="https://www.youtube.com/embed/1xev1N47S84?si=dUZHudb5XYDZ4vP2"
                    frameborder="0"
                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
                  >
                  </iframe>
                </div>
              </div>

              <div class="w-full md:w-1/2 pt-3 md:pt-3 md:pl-5 rounded-lg">
                <!-- ... Your car information table ... -->

                <div class="relative overflow-x-auto rounded-lg">
                  <table
                    class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg"
                  >
                    <tbody>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Year of Manufucture
                        </th>
                        <td class="px-6 py-3">2017</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Current Location
                        </th>
                        <td class="px-6 py-3">Kenya</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Availability
                        </th>
                        <td class="px-6 py-3">available</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Drive
                        </th>
                        <td class="px-6 py-3">AWD</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Millage
                        </th>
                        <td class="px-6 py-3">10,800 km</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Engine size
                        </th>
                        <td class="px-6 py-3">2000 cc</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Fuel Type
                        </th>
                        <td class="px-6 py-3">Petrol</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Horse Power
                        </th>
                        <td class="px-6 py-3">220 Hp</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Transmission
                        </th>
                        <td class="px-6 py-3">Automatic</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Torque
                        </th>
                        <td class="px-6 py-3">350 Nm</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Aspiration
                        </th>
                        <td class="px-6 py-3">Turbo</td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Acceleration (0-100 kph)
                        </th>
                        <td class="px-6 py-3">6 Secs</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <a href="https://wa.me/254703840814">
                  <button
                    type="button"
                    class="mt-3 ms-3 text-white bg-[#28a745] whatsapp hover:bg-[#28a745]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-full text-sm text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-10 h-10 bg-gray-100 text-gray-800 rounded-full dark:text-white fill-green-500"
                      viewBox="0 0 448 512"
                    >
                      <path
                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                      />
                    </svg>
                    <span class="s-only ms-2 me-2 font-bold md:text-xl"
                      >Send a Message</span
                    >
                  </button>
                  <button
                    type="button"
                    class="mt-3 ms-3 text-white bg-[#28a745] whatsapp hover:bg-[#28a745]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-full text-sm text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      class="w-10 h-10 bg-gray-100 text-gray-800 rounded-full dark:text-white fill-green-500"
                      viewBox="0 0 448 512"
                    >
                      <path
                        d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"
                      />
                    </svg>
                    <span class="s-only ms-2 me-2 font-bold md:text-xl"
                      >Call us directly</span
                    >
                  </button>
                </a>
                <SafetyFeatures />
                <EnquiryForm />
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
import CarComponent from "../../components/cars/car-component.vue";
import Search from "../../components/cars/search.vue";
import SafetyFeatures from "../../components/cars/safety-features.vue";
import EnquiryForm from "../../components/cars/enquiry-form.vue";

export default Vue.extend({
  name: "Cars",
  components: {
    CarComponent,
    Search,
    SafetyFeatures,
    EnquiryForm,
  },

  methods: {
    previousSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      } else {
        this.currentIndex = this.car.photos_urls.length - 1;
      }
    },
    nextSlide() {
      if (this.currentIndex < this.car.photos_urls.length - 1) {
        this.currentIndex++;
      } else {
        this.currentIndex = 0;
      }
    },
  },
});
</script>

<style scoped>
.thumbnails-container {
  display: flex;
  justify-content: center;
  align-items: center;
  overflow-x: auto;
  white-space: nowrap;
  scrollbar-width: thin; /* Firefox */
}

/* For WebKit-based browsers (Chrome, Safari) */
.thumbnails-container::-webkit-scrollbar {
  width: 6px; /* Adjust as needed */
}

.thumbnails-container::-webkit-scrollbar-thumb {
  background-color: transparent; /* Hide the thumb */
}

.thumbnails-container::-webkit-scrollbar-track {
  background-color: transparent; /* Hide the track */
}

.thumbnail {
  opacity: 0.8;
}

iframe {
  height: 29.5rem;
}

/* .whatsapp {
    border-radius: 10%;
  } */
.thumbnail.active {
  transform: scale(1.15);
  border: 1px solid #37ff00;
  border-radius: 1px;
  opacity: 1;
}

.thumbnails-container {
  height: 130px;
  overflow: hidden;
  position: relative;
  width: 100%;
  display: flex;
  align-items: center;
  overflow-x: auto;
}

.thumbnails-container:before,
.thumbnails-container:after {
  content: "";
  position: absolute;
  height: 130px;
  width: 150px;
  z-index: 10;
}

.thumbnails-container:after {
  right: 0;
  top: 0;
  transform: rotateZ(360deg);
}

.thumbnails-container:before {
  left: 0;
  top: 0;
}

.thumbnails-container .track {
  display: flex;
}

.thumbnails-container .thumbnail {
  width: 95px;
}

.thumbnails-container .thumbnail img {
  height: 90px;
  width: 100%;
}

@media (max-width: 640px) {
  .thumbnails-container {
    max-width: 100%;
  }

  iframe {
    height: 20rem;
  }

  .slide {
    height: auto;
  }
}
</style>
