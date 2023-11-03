import axios from "axios";

export function createAxios() {
  return axios.create({
    baseURL: process.env.baseURL,
    timeout: 1000000,
    headers: { "Content-Type": "application/json" },
  });
}
