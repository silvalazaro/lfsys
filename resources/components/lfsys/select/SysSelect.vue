<template>
  <label class="block w-full">
    <span class="block text-sm font-medium text-slate-700">
      <sys-tooltip-help :message="error" :observation="observation">
        {{ label }}
      </sys-tooltip-help>
    </span>
    <el-select
      v-model="value"
      filterable
      placeholder="selecione"
      @change="emit('change')"
      value-key="label"
      :loading="loading"
      :remote-method="remoteMethod"
      :multiple="!!props.array"
      remote
      class="w-full"
    >
      <el-option
        v-for="item in data.options"
        :key="item.id"
        :value="item.name"
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

import { SysSelectInterface } from "./index";

interface Props {
  url: string;
  required?: boolean;
  modelValue?: SysSelectInterface;
  array?: Array<SysSelectInterface>;
  label?: string;
  validators?: Array<any>;
  disabled?: boolean;
  message?: string;
  observation?:string
}

const props = withDefaults(defineProps<Props>(), {
  message: "",
  observation: "",
});

const emit = defineEmits(["update:modelValue", "change", "update:array"]);

const loading = ref(false);
const message = ref("");

const value = computed({
  get(): any {
    if (props.modelValue) return props.modelValue.name;
    if (props.array) return props.array.map((e) => e.name);
    return "";
  },
  set: (value: any) => {
    if (props.modelValue) {
      emit(
        "update:modelValue",
        _.find(data.options, (e: any) => e.name === value)
      );
    }
    if (props.array) {
      emit(
        "update:array",
        _.filter(data.options, (e: any) => !!_.find(value, (t) => t === e.name))
      );
    }
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
  if (query) {
    params.label = query;
    search();
  } else {
    data.options = [];
  }
};
</script>
