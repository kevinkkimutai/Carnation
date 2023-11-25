import { createAxios } from "../lib/exiosFactory";

export const state = {};

export const mutations = {};

export const getters = {};

export const actions = {
  async sendContact({ vuexContext: any }, payload) {
    try {
      const fullUrl = `contact_us`;

      const response = await createAxios().post(fullUrl, payload);

      return { success: true, data: response.data };
    } catch (error) {
      return { success: false, error: error.response.data }; // Adjust as needed
    }
  },
};
