import axios from "axios";

export function createAxios() {
  return axios.create({
    baseURL: "http://127.0.0.1:8000/api/v1/",
    // baseURL: "https://admin.carnationautomart.com/api/v1/",
    timeout: 1000000,
    headers: { "Content-Type": "application/json" },
  });
}
