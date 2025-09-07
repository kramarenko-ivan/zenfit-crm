<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <form @submit.prevent="login" class="bg-white p-6 rounded-2xl shadow-md w-96">
      <h2 class="text-xl font-bold mb-4">Login</h2>
      <input v-model="email" type="email" placeholder="Email"
             class="w-full p-2 border rounded mb-3"/>
      <input v-model="password" type="password" placeholder="Password"
             class="w-full p-2 border rounded mb-3"/>
      <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
        Login
      </button>
      <p v-if="error" class="text-red-500 text-sm mt-2">{{ error }}</p>
    </form>
  </div>
</template>

<script setup lang="ts">
import {ref} from "vue";
import api from "../api/axios.ts"

const email = ref("");
const password = ref("");
const error = ref("");

const login = async () => {
  error.value = "";
  try {
    await api.get("/sanctum/csrf-cookie");
    await api.post("/login", {email: email.value, password: password.value});
    // здесь можно редиректить на Dashboard
    window.location.href = "/";
  } catch (e: any) {
    error.value = "Invalid credentials";
  }
};
</script>
