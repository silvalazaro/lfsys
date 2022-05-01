<template>
  <label class="block w-full">
    <span class="block text-sm font-medium text-slate-700">
      <el-tooltip :content="tooltip" placement="top-start">
        {{ label }}
      </el-tooltip>
    </span>
    <el-select
      v-model="value"
      filterable
      placeholder="selecione"
      @change="emit('change')"
      value-key="label"
      :loading="loading"
      :remote-method="remoteMethod"
      remote
      class="w-full"
    >
      <el-option
        v-for="item in data.options"
        :key="item.id"
        :value="item.label"
      />
    </el-select>
    <p class="mt-2 text-rose-500 text-sm">
      {{ message }}
    </p>
  </label>
</template>

<script lang="ts" setup>
import { computed, onMounted, reactive, ref } from "@vue/runtime-core";
import axios from "axios";

interface Props {
  url: string;
  required?: boolean;
  modelValue: string;
  label?: string;
  validators?: Array<any>;
  disabled?: boolean;
  tooltip?: string;
}

const props = withDefaults(defineProps<Props>(), {
  tooltip: "Nenhuma observação",
});

const emit = defineEmits(["update:modelValue", "change"]);
const loading = ref(false);
const message = ref("");
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
  axios
    .get(props.url, {
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
  console.log(params);
  if (query) {
    params.label = query;
    search();
  } else {
    data.options = [];
  }
};
</script>
