<template>
  <app-layout title="Dashboard">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <div>
            <div class="p-6 sm:px-20 bg-white border-b border-gray-200" style="heigth: 100%">
                <company-form />
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>

<script>
import { defineComponent } from "vue";
import AppLayout from "@/views/layouts/AppLayout.vue";
import CompanyForm from "@/components/register/company/CompanyForm.vue"

export default defineComponent({
  components: {
    AppLayout,
    CompanyForm,
  },
});
</script>
