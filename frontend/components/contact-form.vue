<template>
  <form class="p-2 text-start" @submit.prevent="submitForm">
    <div
      v-if="hasError && responseMessage"
      class="p-4 mb-4 pb-5 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
      role="alert"
    >
      {{ responseMessage }}
    </div>

    <div
      v-if="!hasError && responseMessage"
      class="p-4 mb-4 pb-5 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
      role="alert"
    >
      {{ responseMessage }}
    </div>
    <div class="grid md:grid-cols-2 md:gap-6">
      <div class="relative z-0 w-full mb-6 group">
        <input
          type="text"
          name="floating_first_name"
          id="floating_first_name"
          v-model="first_name"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" "
          required
        />
        <label
          for="floating_first_name"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >First name *</label
        >
      </div>
      <div class="relative z-0 w-full mb-6 group">
        <input
          type="text"
          name="floating_last_name"
          id="floating_last_name"
          v-model="last_name"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" "
        />
        <label
          for="floating_last_name"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Last name</label
        >
      </div>
    </div>
    <div class="relative z-0 w-full mb-6 group">
      <input
        type="number"
        name="floating_email"
        id="floating_email"
        v-model="phone"
        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
        placeholder=" "
        required
      />
      <label
        for="floating_email"
        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
        >Phone number *</label
      >
    </div>

    <label
      for="message"
      class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
      >Your message *</label
    >
    <textarea
      id="message"
      rows="4"
      v-model="message"
      class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
      placeholder="Leave a message..."
      required
    ></textarea>

    <button
      type="submit"
      class="mt-3 float-right text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
    >
      Submit
    </button>
  </form>
</template>
<script>
import Vue from "vue";
import { mapActions } from "vuex";
export default Vue.extend({
  name: "ContactForm",
  data() {
    return {
      submittingForm: false,
      hasError: false,
      responseMessage: "",
      first_name: "",
      last_name: "",
      phone: "",
      message: "",
    };
  },
  methods: {
    ...mapActions(["sendContact"]),
    async submitForm() {
      try {
        this.submittingForm = true;

        const response = await this.sendContact({
          first_name: this.first_name,
          last_name: this.last_name,
          phone: this.phone,
          message: this.message,
        });

        if (!response.success) {
          this.submittingForm = false;
          this.hasError = true;
          this.responseMessage = response.error.message;
        } else {
          this.submittingForm = false;
          this.hasError = false;
          this.responseMessage = response.data.message;
        }
        // Reset form and show success message if needed
      } catch (error) {
        this.hasError = true;
      }
    },
  },
});
</script>
