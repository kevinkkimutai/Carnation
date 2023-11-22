<template>
  <div>
    <div class="topcont">
      <main class="bg-white dark:bg-gray-900 w-full">
        <div class="relative pt-1 mb-8 sm:mb-0 w-full inset-0 pb-0 landing">
          <div
            class="absolute top-0 sm:top-0 w-full bg-center bg-cover topsect"
          >
            <div
              class="relative justify-between w-full pt-6 sm:pt-20 lg:w-10/12 px-4 text-center m-auto sm:text-start"
            >
              <div
                class="pr-2 sm:text-lg sm:w-1/2 text-white bg-blue-900 rounded card"
              >
                <h1
                  class="text-white underline font-semibold text-3xl sm:text-5xl"
                >
                  CarNation Auto Mart
                </h1>
                <p class="mt-2 ms-2 sm:mt-5">
                  We are a reputable car dealership company committed to
                  providing exceptional sales experiences. Our knowledgeable
                  team strives to match customers with their ideal vehicles.
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- Search -->
        <section class="pb-2 sm:mt-8">
          <div class="container mx-auto opacity-100">
            <div class="flex flex-wrap">
              <div class="pt-0 md:pt-6 w-full md:w-full px-1 text-center">
                <div
                  class="relative flex flex-col min-w-0 break-words w-full mb-8 rounded-lg"
                >
                  <div class="flex-auto">
                    <!-- corausel -->
                    <Logos />
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- end -->
        <Search />
        <!-- car list -->
        <section class="mt-0 min-w-lg">
          <div class="container mx-auto opacity-100">
            <div class="flex flex-wrap">
              <div class="w-full md:w-full text-center">
                <div
                  class="relative flex flex-col min-w-0 break-words w-full mb-2 rounded-lg"
                >
                  <!-- searvh section -->

                  <div
                    class="md:px-0 px-2 grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 w-full"
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
                </div>
              </div>
            </div>
          </div>
        </section>

        <!-- dexription -->
        <div class="container mx-auto pt-5 opacity-100">
          <div class="flex flex-wrap">
            <div class="w-full md:w-full text-center">
              <div
                class="relative flex flex-col min-w-0 break-words w-full rounded-lg"
              >
                <h1 class="text-2xl text-white md:text-4xl font-bold pt-3 mb-1">
                  Our Products and Services
                </h1>
                <div class="lg:flex flex-auto">
                  <section class="pb- mt-2">
                    <div class="containe mx-auto opacity-100 px-4">
                      <div class="flex flex-wrap">
                        <div
                          class="sm:pt-6 w-full md:w-4/12 sm:px-4 text-center"
                        >
                          <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow dark:bg-gray-800 w-full mb-8 rounded-lg"
                          >
                            <div class="px-4 py-5 flex-auto">
                              <div
                                class="p-3 text-center inline-flex items-center justify-center w-14 h-14 mb-5 rounded-full bg-blue-400"
                              >
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  height="1em"
                                  viewBox="0 0 512 512"
                                  class="w-10 h-10"
                                >
                                  <path
                                    d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5C300.6 137.4 248.2 128 192 128c-8.3 0-16.4 .2-24.5 .6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80S512 35.8 512 80zM160.7 161.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4C369.3 204.9 384 221.7 384 240c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c0 0 0 0 0 0c-.1 .1-.3 .1-.4 .2l0 0 0 0c-.3 .2-.6 .3-.9 .5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8 .2-3.5 .2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336V300.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V304v5.7V336zm32 0V304 278.1c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7 .2-3.5 .2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432V396.6c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z"
                                  />
                                </svg>
                              </div>
                              <h6
                                class="text-xl font-semibold text-gray-700 dark:text-white"
                              >
                                Car financing
                              </h6>
                              <p
                                class="mt-2 text-gray-700 dark:text-gray-700 mb-4"
                              >
                                Our finance department provides flexible and
                                competitive financing options to help you
                                purchase your dream car with ease. We work with
                                trusted lenders to offer the best rates.
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="w-full md:w-4/12 sm:px-4 text-center">
                          <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow dark:bg-gray-800 w-full mb-8 rounded-lg"
                          >
                            <div class="px-4 py-5 flex-auto">
                              <div
                                class="text-center inline-flex items-center justify-center w-14 h-14 mb-5 rounded-full bg-green-400"
                              >
                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  height="1em"
                                  viewBox="0 0 512 512"
                                  class="w-10 h-10"
                                >
                                  <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"
                                  />
                                </svg>
                              </div>
                              <h6
                                class="text-xl font-semibold text-gray-700 dark:text-white"
                              >
                                Looking For a Car ?
                              </h6>
                              <p
                                class="mt-2 text-gray-700 dark:text-gray-700 mb-4"
                              >
                                Our cars are delivered fully-registered with all
                                requirements completed. We’ll deliver your car
                                wherever you are.
                              </p>
                            </div>
                          </div>
                        </div>

                        <div
                          class="sm:pt-6 w-full md:w-4/12 sm:px-4 text-center"
                        >
                          <div
                            class="relative flex flex-col min-w-0 break-words bg-white shadow dark:bg-gray-800 w-full mb-8 rounded-lg"
                          >
                            <div class="px-4 py-5 flex-auto">
                              <div
                                class="p- text-center inline-flex items-center justify-center w-14 h-14 mb-5 rounded-full bg-blue-900"
                              >
                                <img
                                  src="../assets/car.png"
                                  class="h-12 w-12"
                                  alt="Flowbite Logo"
                                />
                              </div>

                              <h6
                                class="text-xl font-semibold text-gray-700 dark:text-white"
                              >
                                Verified Company
                              </h6>
                              <p
                                class="mt-2 text-gray-700 dark:text-gray-700 mb-4"
                              >
                                With specialists on hand to help with any part
                                of the car shopping or vehicle ownership
                                experience, Motors provides financing, car
                                service and a great selection of vehicles for
                                luxury car shoppers.
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from "vue";
import Logos from "../components/icons/logos.vue";
import Search from "../components/cars/search.vue";
import CarComponent from "../components/cars/car-component.vue";

export default Vue.extend({
  name: "IndexPage",

  components: {
    Logos,
    Search,
    CarComponent,
  },
});
</script>
<style scoped>
.topcont {
  background-image: url("../assets/carbg.jpeg");
}
.topsect {
  background-image: url("../assets/cars.jpeg");
  height: 24rem;
}
.landing {
  height: 20rem;
}
.card {
  background-color: rgba(72, 72, 75, 0);
  color: rgb(255, 255, 255);
}
@media all and (max-width: 720px) {
  .topsect {
    height: auto;
  }
  .landing {
    height: 10rem;
  }
}
</style>
