<template>
  <el-form-item :label="label">
    <el-select
      v-model="value"
      filterable
      placeholder="selecione"
      @change="emit('change')"
    >
      <el-option
        v-for="item in data.options"
        :key="item.value"
        :label="item.label"
        :value="item.value"
      />
    </el-select>
  </el-form-item>
</template>

<script lang="ts" setup>
import { computed, onMounted, reactive } from "@vue/runtime-core";
import axios from "axios";

const props = defineProps<{
  url: string;
  label: string;
  modelValue: string | number;
}>();

const emit = defineEmits(["update:modelValue", "change"]);

const value = computed({
  get() {
    return props.modelValue;
  },
  set: (value) => emit("update:modelValue", value),
});

const data = reactive({
  options: [],
});

function search(params?: any){
  axios.get(props.url, {
      params: params
  }).then((res) => {
    data.options = res.data;
  })
}

defineExpose({
  search,
});

onMounted(() => {
 search()
});
</script>
