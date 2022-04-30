<template>
  <div>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">
        <el-tooltip
          :content="tooltip"
          placement="top-start"
        >
         {{ label }}
        </el-tooltip>
      </span>
      <el-input
        v-model="value"
        @input="changeInput"
        ref="input"
        :disabled="disabled"
      />
      <p class="mt-2 text-rose-500 text-sm">
        {{ message }}
      </p>
    </label>
  </div>
</template>

<script lang="ts" setup>
import Schema from "async-validator";
import { computed, handleError, ref } from "@vue/runtime-core";

interface Props {
  required?: boolean;
  modelValue: string;
  label?: string;
  validators?: Array<any>;
  disabled?: boolean;
  tooltip?:string
}

const props = withDefaults(defineProps<Props>(), {
    tooltip: 'Nenhuma observação'
})

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
