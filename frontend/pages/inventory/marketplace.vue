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
              <p class="font-bold mb-3 text-white">Our Marketplace</p>
              <!-- search section -->
              <Search />

              <div
                class="grid gap-2 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 w-full"
                id="cardContainer"
              >
                <!-- Card 1 -->
                <CarComponent v-for="car in cars" :key="car.id" :car="car" />
              </div>

              <!-- Pagination -->
              <nav
                class="isolate inline-flex -space-x-px rounded-md shadow-sm pt-5 flex justify-end"
                aria-label="Pagination"
              >
                <a
                  href="#"
                  @click="loadPage(getPageNumberFromUrl(page.url))"
                  v-for="page in pagination.links"
                  :key="page.label"
                  :class="{
                    'relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600':
                      page.active,
                    'relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white ring-1 ring-inset ring-gray-300 hover:bg-gray-50 hover:text-white focus:z-20 focus:outline-offset-0':
                      !page.active,
                  }"
                >
                  {{ processedLabel(page.label) }}
                </a>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
</template>

<script lang="ts">
import Vue from "vue";
import CarComponent from "../../components/cars/car-component.vue";
import Search from "../../components/cars/search.vue";
import { mapActions } from "vuex";

export default Vue.extend({
  name: "Cars",
  components: {
    CarComponent,
    Search,
  },
  data() {
    return {
      cars: [],
      pagination: {},
      currentPage: 1,
      category: "marketplace",
    };
  },

  methods: {
    ...mapActions("inventory", ["getCars"]),

    async loadPage(pageNumber) {
      const page = pageNumber ?? 1;
      this.$router.push({ path: `/marketplace?page=${page}` });
      this.fetchCars(page);
    },
    getPageNumberFromUrl(url: string): number | null {
      try {
        const urlObject = new URL(url);

        // Get the value of the 'page' parameter from the URL
        const pageNumberString: string | null =
          urlObject.searchParams.get("page");

        // Convert the string to a number
        const pageNumber: number | null = pageNumberString
          ? parseInt(pageNumberString, 10)
          : null;

        return pageNumber;
      } catch (error) {
        return null;
      }
    },
    processedLabel(label) {
      // Use a computed property to process the label and remove &raquo;
      return label.replace(/&raquo;|&laquo;/g, "").trim();
    },

    async fetchCars(page) {
      this.currentPage = page;

      const response = await this.getCars({
        category: this.category,
        page: this.currentPage,
      });
      if (response.success) {
        this.cars = [];
        this.pagination = {};
        this.cars = response.data.data;

        this.pagination = response.data.meta;
      }
    },
  },

  async fetch() {
    // Assuming you have variables like type, car_usage, and category defined in your data
    // Call the getCars method with the required parameters
    const pageNumber = this.$route.query.page;

    this.fetchCars(pageNumber);
  },
});
</script>

<style scoped></style>
