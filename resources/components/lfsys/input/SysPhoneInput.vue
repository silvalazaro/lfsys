<template>
  <label class="block">
    <span class="block text-sm font-medium text-slate-700">{{ label }}</span>
    <vue-tel-input mode="international" v-bind="options"> </vue-tel-input>
  </label>
</template>

<script lang="ts" setup>
import "vue-tel-input/dist/vue-tel-input.css";
import { VueTelInput } from "vue-tel-input";

const props = defineProps<{
  required?: boolean;
  modelValue: string;
  label?: string;
  validators?: Array<any>;
  disabled?: boolean
}>();

const options = {
  inputOptions: {
    placeholder: "",
  },
};
</script>
