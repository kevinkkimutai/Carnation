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
  async searchCars({ vuexContext: any }, { queryString, page = undefined }) {
    try {
      const baseSearch = queryString;
      const pageParam = `page=${page || 1}`;

      let url = baseSearch;
      if (page) {
        url = `${baseSearch}&${pageParam}`;
      }

      const fullUrl = `inventory/search?${url}`;

      const response = await createAxios().get(fullUrl);

      return { success: true, data: response.data };
    } catch (error) {
      return { success: false, error: error.message }; // Adjust as needed
    }
  },
  async getDetails({ vuexContext: any }, carId) {
    try {
      const fullUrl = `inventory/details/${carId}`;

      const response = await createAxios().get(fullUrl);

      return { success: true, data: response.data.data };
    } catch (error) {
      return { success: false, error: error.message }; // Adjust as needed
    }
  },
  async sendEnquiry({ vuexContext: any }, payload) {
    try {
      const fullUrl = `inventory/enquire`;

      const response = await createAxios().post(fullUrl, payload);

      return { success: true, data: response.data };
    } catch (error) {
      return { success: false, error: error.response.data }; // Adjust as needed
    }
  },
};
