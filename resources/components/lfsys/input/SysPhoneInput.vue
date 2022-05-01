<template>
  <div class="block">
    <span class="block text-sm font-medium text-slate-700">
      <el-tooltip :content="tooltip" placement="top-start">
        {{ label }}
      </el-tooltip>
    </span>
    <vue-tel-input mode="international" v-bind="options" class="z-40 overflow-visible">  </vue-tel-input>
  </div>
</template>

<script lang="ts" setup>
import "vue-tel-input/dist/vue-tel-input.css";
import { VueTelInput } from "vue-tel-input";

interface Props {
  required?: boolean;
  modelValue: string;
  label?: string;
  validators?: Array<any>;
  disabled?: boolean;
  url: string;
  tooltip?: string;
}

const props = withDefaults(defineProps<Props>(), {
  tooltip: "Nenhuma observação",
});

const options = {
  inputOptions: {
    placeholder: "",
  },
};
</script>
