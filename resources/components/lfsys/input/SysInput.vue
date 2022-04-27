<template>
  <div>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">{{ label }}</span>
      <el-input v-model="value" @input="changeInput" ref="input" />
      <p class="mt-2 text-rose-500 text-sm">
        {{ message }}
      </p>
    </label>
  </div>
</template>

<script lang="ts" setup>
import { ruleCep, ruleRequired } from "@/scripts/util/rules";
import Schema from "async-validator";
import { computed, handleError, ref } from "@vue/runtime-core";
import { setLocation } from "@/store/register/address/location";
import axios from "axios";

const props = defineProps<{
  required?: boolean;
  modelValue: string;
  label?: string;
  validators?: Array<any>;
}>();

const emit = defineEmits(["update:modelValue", "change"]);

const input = ref();

const message = ref("");

const tempValue = ref("");

const value = computed({
  get() {
    return tempValue.value || props.modelValue;
  },
  set: (value: string) => {
    tempValue.value = value;
  },
});

let validator: any = null;
if (props.validators) {
  validator = new Schema({
    input: props.validators,
  });
}

const changeInput = _.debounce(function (value) {
  if (validator) {
    validator.validate({ input: value }, (errors: any, fields: any) => {
      if (errors) {
        message.value = errors[0].message;
        return handleError(errors, fields, validator);
      }
      emit("update:modelValue", value);
      message.value = "";
    });
  } else {
    emit("update:modelValue", value);
  }
}, 300);
</script>
