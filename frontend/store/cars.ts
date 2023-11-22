import { createAxios } from "../lib/exiosFactory";
import axios from "axios";

export const state = {};

export const getters = {};

export const actions = {
  async getCars(vuexContext: any) {
    try {
      return axios.get("cars").then((res) => {
        return res;
      });
    } catch (error) {
      console.log("Try get contacts Received failed" + error);
      vuexContext.commit("setContacts", []);
    }
  },
};
export const mutations = {};
