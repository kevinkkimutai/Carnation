<template>
  <main class="bg-white dark:bg-gray-900 mt-2 pt-16">
    <!-- car list -->
    <section class="mt-0 min-w-lg">
      <div class="container mx-auto opacity-100">
        <div class="flex flex-wrap">
          <div class="w-full md:w-full">
            <div
              class="container w-full md:flex p-1 md:pt-14 md:pt-10 md:pl-10"
            >
              <h2
                class="text-md font-bold line-clamp-1 md:text-lg text-start ms-2 float-left"
              >
                <span
                  class="font-bold text-white bg-gray-300 dark:bg-gray-900 pr-1 pl-1 me-1 rounded"
                >
                  {{ car.title }}</span
                >
              </h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="mt-0 min-w-lg">
      <div class="container mx-auto opacity-100">
        <div class="flex flex-wrap">
          <div class="w-full md:w-full">
            <div
              v-if="car"
              class="container w-full md:flex p-1 md:pt-14 md:pt-1 md:pr-10 md:pl-10 md:pb-10"
            >
              <div
                id="controls-carousel"
                class="row w-full relative md:w-1/2 pt-3"
              >
                <!-- Carousel thumbnails-container -->
                <div class="relative overflow-hidden rounded-lg slide">
                  <div
                    v-for="(image, index) in car.images"
                    :key="index"
                    :class="{ 'hidden flex': currentIndex !== index }"
                  >
                    <img
                      :src="image.url"
                      :alt="image.index"
                      class="object-cover max-h-80 md:max-h-96 w-full"
                    />
                  </div>

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
                    <!-- <div class="thumbnail">
                      <img class="object-cover" src="../../assets/car1.jpg" />
                    </div> -->
                    <!-- <div class="thumbnail"> -->
                    <!-- <img class="object-cover" src="../../assets/car1.jpg" />
                    </div>
                    <div class="thumbnail">
                      <img class="object-cover" src="../../assets/car1.jpg" />
                    </div> -->
                    <div
                      class="thumbnail"
                      v-for="(image, index) in car.images"
                      :key="index"
                      :class="{ active: index === currentIndex }"
                      @click="changeSlide(index)"
                    >
                      <img
                        class="object-cover"
                        :src="image.url"
                        :alt="image.order"
                      />
                    </div>
                  </div>
                </div>

                <!-- video -->
                <div v-if="car.youtube_video_code" class="rounded-lg pt-4">
                  <iframe
                    class="w-full rounded-lg mb-2"
                    :src="`https://www.youtube.com/embed/${car.youtube_video_code}`"
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
                        <td class="px-6 py-3">{{ car.year }}</td>
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
                        <td class="px-6 py-3">
                          {{
                            car.availability == "available"
                              ? "Available"
                              : "Sold"
                          }}
                        </td>
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
                        <td class="px-6 py-3">
                          {{ formatText(car.drive_train) }}
                        </td>
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
                        <td class="px-6 py-3">{{ car.price }} km</td>
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
                        <td class="px-6 py-3">{{ car.cc }} cc</td>
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
                        <td class="px-6 py-3">{{ formatText(car.fuel) }}</td>
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
                        <td class="px-6 py-3">
                          {{ formatText(car.transmission) }}
                        </td>
                      </tr>
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Interior
                        </th>
                        <td class="px-6 py-3">
                          {{ formatText(car.interior) }}
                        </td>
                      </tr>
                      <!-- <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Drive
                        </th>
                        <td class="px-6 py-3">
                          {{ formatText(car.drive_train) }}
                        </td>
                      </tr> -->
                      <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Color
                        </th>
                        <td class="px-6 py-3">{{ car.color }}</td>
                      </tr>
                      <!-- <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700"
                      >
                        <th
                          scope="row"
                          class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white"
                        >
                          Acceleration (0-100 kph)
                        </th>
                        <td class="px-6 py-3">6 Secs</td>
                      </tr> -->
                    </tbody>
                  </table>
                </div>
                <div class="container flex items-center justify-center pt-4">
                  <a
                    href="https://wa.me/254703840814"
                    type="button"
                    class="flex items-center justify-center text-white bg-gradient-to-r from-green-500 via-green-600 to-green-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      x="0px"
                      y="0px"
                      width="20"
                      height="20"
                      viewBox="0 0 50 50"
                      class="me-2"
                    >
                      <path
                        d="M 25 2 C 12.309534 2 2 12.309534 2 25 C 2 29.079097 3.1186875 32.88588 4.984375 36.208984 L 2.0371094 46.730469 A 1.0001 1.0001 0 0 0 3.2402344 47.970703 L 14.210938 45.251953 C 17.434629 46.972929 21.092591 48 25 48 C 37.690466 48 48 37.690466 48 25 C 48 12.309534 37.690466 2 25 2 z M 25 4 C 36.609534 4 46 13.390466 46 25 C 46 36.609534 36.609534 46 25 46 C 21.278025 46 17.792121 45.029635 14.761719 43.333984 A 1.0001 1.0001 0 0 0 14.033203 43.236328 L 4.4257812 45.617188 L 7.0019531 36.425781 A 1.0001 1.0001 0 0 0 6.9023438 35.646484 C 5.0606869 32.523592 4 28.890107 4 25 C 4 13.390466 13.390466 4 25 4 z M 16.642578 13 C 16.001539 13 15.086045 13.23849 14.333984 14.048828 C 13.882268 14.535548 12 16.369511 12 19.59375 C 12 22.955271 14.331391 25.855848 14.613281 26.228516 L 14.615234 26.228516 L 14.615234 26.230469 C 14.588494 26.195329 14.973031 26.752191 15.486328 27.419922 C 15.999626 28.087653 16.717405 28.96464 17.619141 29.914062 C 19.422612 31.812909 21.958282 34.007419 25.105469 35.349609 C 26.554789 35.966779 27.698179 36.339417 28.564453 36.611328 C 30.169845 37.115426 31.632073 37.038799 32.730469 36.876953 C 33.55263 36.755876 34.456878 36.361114 35.351562 35.794922 C 36.246248 35.22873 37.12309 34.524722 37.509766 33.455078 C 37.786772 32.688244 37.927591 31.979598 37.978516 31.396484 C 38.003976 31.104927 38.007211 30.847602 37.988281 30.609375 C 37.969311 30.371148 37.989581 30.188664 37.767578 29.824219 C 37.302009 29.059804 36.774753 29.039853 36.224609 28.767578 C 35.918939 28.616297 35.048661 28.191329 34.175781 27.775391 C 33.303883 27.35992 32.54892 26.991953 32.083984 26.826172 C 31.790239 26.720488 31.431556 26.568352 30.914062 26.626953 C 30.396569 26.685553 29.88546 27.058933 29.587891 27.5 C 29.305837 27.918069 28.170387 29.258349 27.824219 29.652344 C 27.819619 29.649544 27.849659 29.663383 27.712891 29.595703 C 27.284761 29.383815 26.761157 29.203652 25.986328 28.794922 C 25.2115 28.386192 24.242255 27.782635 23.181641 26.847656 L 23.181641 26.845703 C 21.603029 25.455949 20.497272 23.711106 20.148438 23.125 C 20.171937 23.09704 20.145643 23.130901 20.195312 23.082031 L 20.197266 23.080078 C 20.553781 22.728924 20.869739 22.309521 21.136719 22.001953 C 21.515257 21.565866 21.68231 21.181437 21.863281 20.822266 C 22.223954 20.10644 22.02313 19.318742 21.814453 18.904297 L 21.814453 18.902344 C 21.828863 18.931014 21.701572 18.650157 21.564453 18.326172 C 21.426943 18.001263 21.251663 17.580039 21.064453 17.130859 C 20.690033 16.232501 20.272027 15.224912 20.023438 14.634766 L 20.023438 14.632812 C 19.730591 13.937684 19.334395 13.436908 18.816406 13.195312 C 18.298417 12.953717 17.840778 13.022402 17.822266 13.021484 L 17.820312 13.021484 C 17.450668 13.004432 17.045038 13 16.642578 13 z M 16.642578 15 C 17.028118 15 17.408214 15.004701 17.726562 15.019531 C 18.054056 15.035851 18.033687 15.037192 17.970703 15.007812 C 17.906713 14.977972 17.993533 14.968282 18.179688 15.410156 C 18.423098 15.98801 18.84317 16.999249 19.21875 17.900391 C 19.40654 18.350961 19.582292 18.773816 19.722656 19.105469 C 19.863021 19.437122 19.939077 19.622295 20.027344 19.798828 L 20.027344 19.800781 L 20.029297 19.802734 C 20.115837 19.973483 20.108185 19.864164 20.078125 19.923828 C 19.867096 20.342656 19.838461 20.445493 19.625 20.691406 C 19.29998 21.065838 18.968453 21.483404 18.792969 21.65625 C 18.639439 21.80707 18.36242 22.042032 18.189453 22.501953 C 18.016221 22.962578 18.097073 23.59457 18.375 24.066406 C 18.745032 24.6946 19.964406 26.679307 21.859375 28.347656 C 23.05276 29.399678 24.164563 30.095933 25.052734 30.564453 C 25.940906 31.032973 26.664301 31.306607 26.826172 31.386719 C 27.210549 31.576953 27.630655 31.72467 28.119141 31.666016 C 28.607627 31.607366 29.02878 31.310979 29.296875 31.007812 L 29.298828 31.005859 C 29.655629 30.601347 30.715848 29.390728 31.224609 28.644531 C 31.246169 28.652131 31.239109 28.646231 31.408203 28.707031 L 31.408203 28.708984 L 31.410156 28.708984 C 31.487356 28.736474 32.454286 29.169267 33.316406 29.580078 C 34.178526 29.990889 35.053561 30.417875 35.337891 30.558594 C 35.748225 30.761674 35.942113 30.893881 35.992188 30.894531 C 35.995572 30.982516 35.998992 31.07786 35.986328 31.222656 C 35.951258 31.624292 35.8439 32.180225 35.628906 32.775391 C 35.523582 33.066746 34.975018 33.667661 34.283203 34.105469 C 33.591388 34.543277 32.749338 34.852514 32.4375 34.898438 C 31.499896 35.036591 30.386672 35.087027 29.164062 34.703125 C 28.316336 34.437036 27.259305 34.092596 25.890625 33.509766 C 23.114812 32.325956 20.755591 30.311513 19.070312 28.537109 C 18.227674 27.649908 17.552562 26.824019 17.072266 26.199219 C 16.592866 25.575584 16.383528 25.251054 16.208984 25.021484 L 16.207031 25.019531 C 15.897202 24.609805 14 21.970851 14 19.59375 C 14 17.077989 15.168497 16.091436 15.800781 15.410156 C 16.132721 15.052495 16.495617 15 16.642578 15 z"
                      ></path>
                    </svg>
                    Enquire via WhatsApp
                  </a>
                  <a
                    href="https://wa.me/254703840814"
                    target="_blank"
                    type="button"
                    class="text-white bg-gradient-to-r from-indigo-500 via-indigo-600 to-indigo-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-indigo-300 dark:focus:ring-indigo-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"
                  >
                    <font-awesome-icon icon="phone" class="me-2" /> Call us
                    directly
                  </a>
                </div>

                <div class="container pb-4">
                  <CarFeatures :car="car" />
                </div>
                <EnquiryForm :car="car" />
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
import EnquiryForm from "../../components/cars/enquiry-form.vue";
import { mapActions } from "vuex";
import CarFeatures from "../../components/cars/car-features.vue";

export default Vue.extend({
  name: "Cars",
  components: {
    CarComponent,
    Search,
    CarFeatures,
    EnquiryForm,
  },

  data() {
    return {
      car: {},
      currentIndex: 0,
    };
  },

  async fetch() {
    const carId = this.$route.params.id;

    const response = await this.getDetails(carId);

    console.log("Response", response);

    this.car = response.data;

    console.log("Car ", this.car);
  },
  computed: {
    displayedImages() {
      return this.car.images;
    },
  },

  methods: {
    ...mapActions("inventory", ["getDetails"]),
    formatText(text) {
      return text
        ?.split("-")
        .map((word) => word.charAt(0).toUpperCase() + word.slice(1))
        .join(" ");
    },
    changeSlide(index) {
      this.currentIndex = index;
      this.scrollThumbnails(index);
    },
    scrollThumbnails(index) {
      // Access the thumbnails container using the ref attribute
      const container = this.$refs.thumbnailContainer;
      const thumbnails = container.querySelectorAll(".thumbnail");

      if (container && thumbnails.length < 0) {
        const containerWidth = container.offsetWidth;
        const thumbnailWidth = thumbnails[0].offsetWidth;
        const visibleThumbnails = Math.floor(containerWidth / thumbnailWidth);
        let scrollPosition;

        // Calculate the offset to keep the active thumbnail within the visible area
        const offset = Math.floor(visibleThumbnails / 2);

        // Calculate the scroll position with the offset
        if (index <= offset) {
          // Scroll to the beginning of the list
          scrollPosition = 1;
        } else if (index >= thumbnails.length - offset) {
          // Scroll to the end of the list
          scrollPosition = thumbnails.length * thumbnailWidth - containerWidth;
        } else {
          // Scroll to show the active thumbnail with the offset in the center
          scrollPosition = thumbnailWidth * (index - offset);
        }

        // Make the active thumbnail visible within the container
        thumbnails[index].scrollIntoView({
          behavior: "auto",
          block: "start",
        });

        container.scrollLeft = scrollPosition;
        container.scrollRight = scrollPosition;
      }
    },
    previousSlide() {
      if (this.currentIndex > 0) {
        this.currentIndex--;
      } else {
        this.currentIndex = this.car.images.length - 1;
      }
    },
    nextSlide() {
      if (this.currentIndex < this.car.images.length - 1) {
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
