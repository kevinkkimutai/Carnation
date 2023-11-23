import { createAxios } from "../lib/exiosFactory";

export const state = {
  cars: [],
};

export const mutations = {
  setCars(state, cars) {
    state.cars = cars;
  },
};

export const getters = {};

export const actions = {
  async getFeaturedCars(vuexContext: any) {
    try {
      const response = await createAxios().get("inventory/featured");
      vuexContext.commit("setCars", response.data.data);

      return { success: true, data: response };
    } catch (error) {
      vuexContext.commit("setContacts", []);
    }
  },

  async getCars({ vuexContext: any }, { category, page }) {
    try {
      const params = {
        category,
        page, // Add the page parameter
      };

      console.log("Params", params);

      // Add optional parameters if they are defined
      // Example: params.min_price = minPrice;
      //          params.max_price = maxPrice;
      //          params.min_year = minYear;
      //          params.max_year = maxYear;

      const response = await createAxios().get("inventory", {
        params,
      });

      return { success: true, data: response.data };
    } catch (error) {
      return { success: false, error: error.message }; // Adjust as needed
    }
  },
};
