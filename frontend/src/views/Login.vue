<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100 dark:bg-gray-900 px-4">
    <form @submit.prevent="login"
          class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg w-full max-w-sm">
      <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6 text-center">Login</h2>

      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Email</label>
        <input v-model="email"
               type="email"
               id="email"
               autocomplete="email"
               placeholder="you@example.com"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                      text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500
                      bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
               required/>
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-800 dark:text-gray-200 mb-1">Password</label>
        <input v-model="password"
               type="password"
               id="password"
               autocomplete="current-password"
               placeholder="••••••••"
               class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg
                      text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500
                      bg-white dark:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition"
               required/>
      </div>

      <button type="submit"
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition font-medium">
        Login
      </button>

      <p v-if="error" class="text-red-600 text-sm mt-3 text-center">{{ error }}</p>
    </form>
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import api from "../api/axios.ts";

const email = ref("");
const password = ref("");
const error = ref("");

const login = async () => {
  error.value = "";
  try {
    await api.get("/sanctum/csrf-cookie");
    await api.post("/api/login", {email: email.value, password: password.value});
    window.location.href = "/";
  } catch (e: any) {
    error.value = "Invalid credentials";
  }
};
</script>
