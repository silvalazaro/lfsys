<template>
  <el-form-item :label="label">
    <el-select
      v-model="value"
      filterable
      placeholder="selecione"
      @change="emit('change')"
      value-key="label"
      :loading="loading"
      :remote-method="remoteMethod"
      remote
    >
      <el-option
        v-for="item in data.options"
        :key="item.id"
        :value="item.label"
      />
    </el-select>
  </el-form-item>
</template>

<script lang="ts" setup>
import { computed, onMounted, reactive, ref } from "@vue/runtime-core";
import axios from "axios";

const props = defineProps<{
  url: string;
  label: string;
  modelValue: any;
}>();

const emit = defineEmits(["update:modelValue", "change"]);
const loading = ref(false);

const value = computed({
  get() {
    const val: any = _.find(
      data.options,
      (e: any) => e.id === props.modelValue
    );
    return val ? val.label : props.modelValue;
  },
  set: (value: string | number) => {
    emit(
      "update:modelValue",
      _.find(data.options, (e: any) => e.label === value).id
    );
  },
});

const data = reactive({
  options: [],
});

const params: any = {};

const search = _.debounce((paramss?: any) => {
  axios.get(props.url, {
      params: paramss || params,
  })
  .then((res) => {
      data.options = res.data;
  });
}, 500);

defineExpose({
  search,
  params,
});

onMounted(() => {
  search();
});

const remoteMethod = (query: string) => {
    console.log(params)
  if (query) {
    params.label = query;
    search();
  } else {
    data.options = [];
  }
};
</script>
