<template>
  <div>
    <label class="block">
      <span class="block text-sm font-medium text-slate-700">
        <el-tooltip :content="tooltip" placement="top-start">
          <div>CNPJ <span class="text-red-500" v-if="required">*</span></div>
        </el-tooltip>
      </span>
      <el-input
        v-model="cnpj"
        @input="changeInput"
        @blur="changeInput"
        ref="input"
        :disabled="disabled"
        v-maska="'##.###.###/####-##'"
      />
      <p class="mt-2 text-rose-500 text-sm">
        {{ message }}
      </p>
    </label>
  </div>
</template>

<script lang="ts" setup>
import Schema from "async-validator";
import { handleError, reactive, ref } from "@vue/runtime-core";
import { ruleCnpj, ruleRequired } from "@/scripts/util/rules";
import { Company } from "@/models/register/company";
import { Address } from "@/models/register/address";
import { fetchCnpj } from "@/scripts/ws/cnpjWs";

interface Props {
  required?: boolean;
  modelValue: any;
  label?: string;
  rules?: Array<any>;
  disabled?: boolean;
  tooltip?: string;
}

const props = withDefaults(defineProps<Props>(), {
  tooltip: "Nenhuma observação",
});

const emit = defineEmits(["update:modelValue", "change"]);

const input = ref();

const message = ref("");

let cnpj = ref("");

if (props.modelValue instanceof Company && props.modelValue.cnpj) {
  cnpj.value = props.modelValue.cnpj;
}

let defaultRules = [];

if (props.rules) {
  defaultRules = props.rules;
} else {
  defaultRules.push(ruleCnpj());
}

if (props.required) {
  defaultRules.unshift(ruleRequired("CNPJ"));
}

const validator = new Schema({
  input: defaultRules,
});

// validate after change
const changeInput = _.debounce(function () {
  // cnpj withou mask
  const cnpjUnmasked = input.value.input.dataset.maskRawValue;
  validator.validate({ input: cnpjUnmasked }, (errors: any, fields: any) => {
    if (errors) {
      message.value = errors[0].message;
      return handleError(errors, fields, errors);
    }

    // validation ok
    message.value = "";
    changeModelValue(cnpjUnmasked);
  });
}, 300);

// change props.modelValue, call only after validation if exists
function changeModelValue(cnpj: string) {
  if (props.modelValue instanceof Company) {
    const company = fetchCnpj(cnpj);
    emit("update:modelValue", company);
  } else {
    emit("update:modelValue", cnpj);
  }
}
</script>
