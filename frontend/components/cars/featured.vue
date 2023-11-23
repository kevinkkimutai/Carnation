<template>
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
              <CarComponent v-for="car in cars" :key="car.id" :car="car" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Vue from "vue";
import CarComponent from "./car-component.vue";
import { mapActions, mapState } from "vuex";
export default Vue.extend({
  name: "FeaturedCars",

  components: {
    CarComponent,
  },

  async fetch() {
    this.getFeaturedCars();
  },
  computed: {
    ...mapState("inventory", ["cars"]),
  },
  methods: {
    ...mapActions("inventory", ["getFeaturedCars"]),
  },
});
</script>

<style></style>
