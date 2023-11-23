import { createAxios } from "../lib/exiosFactory";

export const state = {
  models: [],
  makes: [],
};

export const getters = {};

export const mutations = {
  setMakes(state: any, makes: any) {
    state.makes = makes;
  },
  setModels(state: any, models: any) {
    state.models = models;
  },
};

export const actions = {
  async getMakes(vuexContext: any) {
    try {
      const response = await createAxios().get("inventory/list/makes");

      vuexContext.commit("setMakes", response.data.data);
    } catch (error) {
      vuexContext.commit("setContacts", []);
    }
  },
  async getModels(vuexContext: any) {
    try {
      const response = await createAxios().get("inventory/list/models");

      vuexContext.commit("setModels", response.data.data);
    } catch (error) {
      vuexContext.commit("setContacts", []);
    }
  },
};
