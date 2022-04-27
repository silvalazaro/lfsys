<template>
  <div>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">CEP</span>
      <el-input
        v-model="value"
        v-maska="'#####-###'"
        @input="changeCep"
        ref="input"
      />
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
  modelValue?: string;
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
if (props.required) {
  validator = new Schema({
    cep: [ruleRequired("CEP"), ruleCep()],
  });
} else {
  validator = new Schema({
    cep: [ruleCep()],
  });
}

const changeCep = _.debounce(function (value) {
  validator.validate({ cep: value }, (errors: any, fields: any) => {
    if (errors) {
      message.value = errors[0].message;
      return handleError(errors, fields, validator);
    }
    const cep = input.value.input.dataset.maskRawValue;
    emit("update:modelValue", cep);
    message.value = "";
    if (value) {
      axios.get(`https://viacep.com.br/ws/${cep}/json/`).then((res: any) => {
        if (res.data.cep) {
          setLocation(res.data);
        }
      });
    }
  });
}, 300);
</script>
